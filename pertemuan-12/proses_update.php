<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

// cek method form, hanya izinkan POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('read.php');
}

// validasi cid wajib angka dan > 0
$cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if ($cid === false) {
    $_SESSION['flash_error'] = 'CID tidak valid.';
    redirect_ke('edit.php?cid=' . (int)$cid);
}

// ambil dan bersihkan (sanitasi) nilai dari form
$nama = bersihkan($_POST['txtNama'] ?? '');
$email = bersihkan($_POST['txtEmail'] ?? '');
$pesan = bersihkan($_POST['txtPesan'] ?? '');
$captcha = bersihkan($_POST['txtCaptcha'] ?? '');

// validasi sederhana
$errors = []; // ini array untuk menampung semua error yang ada

if ($nama === '') {
    $errors[] = 'Nama wajib diisi.';
}

if ($email === '') {
    $errors[] = 'Email wajib diisi.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format e-mail tidak valid.';
}

if ($pesan === '') {
    $errors[] = 'Pesan wajib diisi.';
}

if ($captcha === '') {
    $errors[] = 'Jawaban captcha salah.';
} elseif ($captcha !== '6') {
    $errors[] = 'Jawaban captcha salah.';
}

// jika ada error, simpan dan tampilkan pesan error
if (!empty($errors)) {
    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('edit.php?cid=' . (int)$cid);
}

// Prepared statement untuk update dan hindari SQL Injection
$stmt = mysqli_prepare($conn, "UPDATE tbl_tamu SET cnama = ?, cemail = ?, cpesan = ? WHERE cid = ?");
if (!$stmt) {
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (persiapan gagal).';
    redirect_ke('edit.php?cid=' . (int)$cid);
}

// bind parameter dan eksekusi (s = string, i = integer)
mysqli_stmt_bind_param($stmt, "sssi", $nama, $email, $pesan, $cid);
if (mysqli_stmt_execute($stmt)) {
    // jika berhasil, kosongkan old value
    unset($_SESSION['old']);
    $_SESSION['flash_sukses'] = 'Terima kasih, data Anda sudah diperbarui.';
    redirect_ke('read.php');
} else {
    // jika gagal, simpan kembali old value dan tampilkan error umum
    $_SESSION['old'] = $_POST;
    $_SESSION['flash_error'] = 'Data gagal diperbarui. Silakan coba lagi.';
    redirect_ke('edit.php?cid=' . (int)$cid);
}
?>

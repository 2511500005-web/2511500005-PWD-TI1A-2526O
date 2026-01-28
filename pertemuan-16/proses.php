<?php
session_start();
require_once __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama    = sanitize($_POST['txtNama']);
    $email   = filter_var($_POST['txtEmail'], FILTER_SANITIZE_EMAIL);
    $pesan   = sanitize($_POST['txtPesan']);
    $captcha = (int) $_POST['txtCaptcha'];

    if ($captcha !== 5) {
        $_SESSION['flash_error'] = "Captcha salah!";
        $_SESSION['old'] = $_POST;
        header("Location: index.php#kontak");
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO kontak (nama, email, pesan) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $email, $pesan);

    if ($stmt->execute()) {
        $_SESSION['flash_sukses'] = "Pesan berhasil dikirim!";
    } else {
        $_SESSION['flash_error'] = "Gagal menyimpan pesan!";
        $_SESSION['old'] = $_POST;
    }

    header("Location: index.php#kontak");
    exit();
}
?>
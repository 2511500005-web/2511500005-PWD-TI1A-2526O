<?php
require_once 'koneksi.php';
require_once 'fungsi.php';

$_SESSION['old'] = $_POST;

if (isset($_POST['txtNim'])) {
  $biodata = [
    'nim'      => sanitize($_POST['txtNim']),
    'nama'     => sanitize($_POST['txtNmLengkap']),
    'tempat'   => sanitize($_POST['txtT4Lhr']),
    'tanggal'  => sanitize($_POST['txtTglLhr']),
    'hobi'     => sanitize($_POST['txtHobi']),
    'pasangan' => sanitize($_POST['txtPasangan']),
    'pekerjaan'=> sanitize($_POST['txtKerja']),
    'ortu'     => sanitize($_POST['txtNmOrtu']),
    'kakak'    => sanitize($_POST['txtNmKakak']),
    'adik'     => sanitize($_POST['txtNmAdik']),
  ];

  try {
    $stmt = $pdo->prepare("INSERT INTO mahasiswa (nim,nama,tempat,tanggal,hobi,pasangan,pekerjaan,ortu,kakak,adik) VALUES (?,?,?,?,?,?,?,?,?,?)");
    $stmt->execute(array_values($biodata));
    $_SESSION['biodata'] = $biodata;
    flash('flash_sukses', 'Biodata berhasil disimpan!');
  } catch (PDOException $e) {
    flash('flash_error', 'Gagal simpan biodata: ' . $e->getMessage());
  }

  header('Location: index.php#about');
  exit;
}

if (isset($_POST['txtNama'])) {
  if ((int)$_POST['txtCaptcha'] !== 5) {
    flash('flash_error', 'Captcha salah!');
    header('Location: index.php#contact');
    exit;
  }

  try {
    $stmt = $pdo->prepare("INSERT INTO kontak (nama,email,pesan) VALUES (?,?,?)");
    $stmt->execute([
      sanitize($_POST['txtNama']),
      sanitize($_POST['txtEmail']),
      sanitize($_POST['txtPesan']),
    ]);
    flash('flash_sukses', 'Pesan berhasil dikirim!');
  } catch (PDOException $e) {
    flash('flash_error', 'Gagal simpan pesan: ' . $e->getMessage());
  }

  header('Location: index.php#contact');
  exit;
}
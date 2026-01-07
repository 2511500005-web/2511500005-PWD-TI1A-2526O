<?php
require_once 'koneksi.php';
require_once 'fungsi.php';

$nim = $_POST['nim'] ?? '';
if ($nim === '') {
  flash('flash_error', 'NIM tidak valid.');
  header('Location: read.php');
  exit;
}

$data = [
  sanitize($_POST['nama'] ?? ''),
  sanitize($_POST['tempat'] ?? ''),
  sanitize($_POST['tanggal'] ?? ''),
  sanitize($_POST['hobi'] ?? ''),
  sanitize($_POST['pasangan'] ?? ''),
  sanitize($_POST['pekerjaan'] ?? ''),
  sanitize($_POST['ortu'] ?? ''),
  sanitize($_POST['kakak'] ?? ''),
  sanitize($_POST['adik'] ?? ''),
  $nim
];

try {
  $stmt = $pdo->prepare("UPDATE mahasiswa SET nama=?, tempat=?, tanggal=?, hobi=?, pasangan=?, pekerjaan=?, ortu=?, kakak=?, adik=?, diubah=NOW() WHERE nim=?");
  $stmt->execute($data);
  flash('flash_sukses', 'Data berhasil diupdate!');
} catch (PDOException $e) {
  flash('flash_error', 'Gagal update: ' . $e->getMessage());
}

header('Location: read.php');
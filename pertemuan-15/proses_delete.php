<?php
require_once 'koneksi.php';
require_once 'fungsi.php';

$nim = $_GET['nim'] ?? '';
if ($nim === '') {
  flash('flash_error', 'NIM tidak valid.');
  header('Location: read.php');
  exit;
}

try {
  $stmt = $pdo->prepare("DELETE FROM mahasiswa WHERE nim = ?");
  $stmt->execute([$nim]);
  flash('flash_sukses', 'Data berhasil dihapus!');
} catch (PDOException $e) {
  flash('flash_error', 'Gagal hapus: ' . $e->getMessage());
}

header('Location: read.php');
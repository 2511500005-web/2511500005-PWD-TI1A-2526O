<?php
require_once 'koneksi.php';
require_once 'fungsi.php';

$id = $_GET['id'] ?? '';
try {
  $stmt = $pdo->prepare("DELETE FROM kontak WHERE id=?");
  $stmt->execute([$id]);
  flash('flash_sukses', 'Pesan kontak berhasil dihapus!');
} catch (PDOException $e) {
  flash('flash_error', 'Gagal hapus kontak: '.$e->getMessage());
}
header('Location: read.php');
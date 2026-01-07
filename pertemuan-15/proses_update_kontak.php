<?php
require_once 'koneksi.php';
require_once 'fungsi.php';

$id    = $_POST['id'] ?? '';
$nama  = sanitize($_POST['nama'] ?? '');
$email = sanitize($_POST['email'] ?? '');
$pesan = sanitize($_POST['pesan'] ?? '');

try {
  $stmt = $pdo->prepare("UPDATE kontak SET nama=?, email=?, pesan=? WHERE id=?");
  $stmt->execute([$nama, $email, $pesan, $id]);
  flash('flash_sukses', 'Pesan kontak berhasil diupdate!');
} catch (PDOException $e) {
  flash('flash_error', 'Gagal update kontak: '.$e->getMessage());
}
header('Location: read.php');
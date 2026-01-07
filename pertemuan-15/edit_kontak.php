<?php
require_once 'koneksi.php';
require_once 'fungsi.php';

$id = $_GET['id'] ?? '';
$stmt = $pdo->prepare("SELECT * FROM kontak WHERE id=?");
$stmt->execute([$id]);
$data = $stmt->fetch();

if (!$data) {
  flash('flash_error', 'Data kontak tidak ditemukan.');
  header('Location: read.php');
  exit;
}
?>
<form action="proses_update_kontak.php" method="POST">
  <input type="hidden" name="id" value="<?= htmlspecialchars($data['id']) ?>">
  <label>Nama: <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>"></label>
  <label>Email: <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>"></label>
  <label>Pesan: <textarea name="pesan"><?= htmlspecialchars($data['pesan']) ?></textarea></label>
  <button type="submit">Update</button>
  <a href="read.php">Batal</a>
</form>
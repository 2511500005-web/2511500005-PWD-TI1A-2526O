<?php
require_once 'koneksi.php';
require_once 'fungsi.php';

$nim = $_GET['nim'] ?? '';
if ($nim === '') {
  flash('flash_error', 'NIM tidak valid.');
  header('Location: read.php');
  exit;
}

$stmt = $pdo->prepare("SELECT * FROM mahasiswa WHERE nim = ?");
$stmt->execute([$nim]);
$data = $stmt->fetch();

if (!$data) {
  flash('flash_error', 'Data tidak ditemukan.');
  header('Location: read.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Biodata</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Edit Biodata Mahasiswa</h2>
  <form action="proses_update.php" method="POST">
    <input type="hidden" name="nim" value="<?= htmlspecialchars($data['nim']) ?>">

    <label>Nama Lengkap:
      <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>
    </label>

    <label>Tempat Lahir:
      <input type="text" name="tempat" value="<?= htmlspecialchars($data['tempat']) ?>" required>
    </label>

    <label>Tanggal Lahir:
      <input type="text" name="tanggal" value="<?= htmlspecialchars($data['tanggal']) ?>" required>
    </label>

    <label>Hobi:
      <input type="text" name="hobi" value="<?= htmlspecialchars($data['hobi']) ?>" required>
    </label>

    <label>Pasangan:
      <input type="text" name="pasangan" value="<?= htmlspecialchars($data['pasangan']) ?>" required>
    </label>

    <label>Pekerjaan:
      <input type="text" name="pekerjaan" value="<?= htmlspecialchars($data['pekerjaan']) ?>" required>
    </label>

    <label>Nama Orang Tua:
      <input type="text" name="ortu" value="<?= htmlspecialchars($data['ortu']) ?>" required>
    </label>

    <label>Nama Kakak:
      <input type="text" name="kakak" value="<?= htmlspecialchars($data['kakak']) ?>" required>
    </label>

    <label>Nama Adik:
      <input type="text" name="adik" value="<?= htmlspecialchars($data['adik']) ?>" required>
    </label>

    <button type="submit">Kirim</button>
    <a href="read.php">Batal</a>
  </form>
</body>
</html>

  <main>
    <section id="contact">
      <h2>Kontak Kami</h2>
      <form action="proses.php" method="POST">
        <label for="txtNama"><span>Nama:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan Nama" required>
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan Email" required>
        </label>

        <label for="txtPesan"><span>Pesan:</span>
          <textarea id="txtPesan" name="txtPesan" placeholder="Masukkan Pesan" required></textarea>
        </label>

        <label for="txtCaptcha"><span>Berapa 2 + 3?:</span>
          <input type="text" id="txtCaptcha" name="txtCaptcha" placeholder="Jawaban Anda" required>
        </label>
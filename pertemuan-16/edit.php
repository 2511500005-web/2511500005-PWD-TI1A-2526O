<?php
require_once 'koneksi.php';
$kodedos = $_GET['kodedos'];
$data = $conn->query("SELECT * FROM dosen WHERE kodedos='$kodedos'")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Biodata Dosen</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Edit Biodata Dosen</h2>
  <form action="proses_update.php" method="POST" class="form-box">
    <input type="text" name="kodedos" value="<?= $data['kodedos'] ?>" readonly>
    <input type="text" name="nama" value="<?= $data['nama'] ?>">
    <input type="text" name="alamat" value="<?= $data['alamat'] ?>">
    <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>">
    <input type="text" name="jja" value="<?= $data['jja'] ?>">
    <input type="text" name="prodi" value="<?= $data['prodi'] ?>">
    <input type="text" name="nohp" value="<?= $data['nohp'] ?>">
    <input type="text" name="pasangan" value="<?= $data['pasangan'] ?>">
    <input type="text" name="anak" value="<?= $data['anak'] ?>">
    <input type="text" name="ilmu" value="<?= $data['ilmu'] ?>">
    <button type="submit">Kirim</button>
    <button type="button" onclick="window.location='index.php'">Batal</button>
  </form>
</body>
</html>
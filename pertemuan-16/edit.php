<?php
require_once __DIR__ . '/koneksi.php';
$kodedos = $_GET['kodedos'];
$data = $conn->query("SELECT * FROM dosen WHERE kodedos='$kodedos'")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head><title>Edit Dosen</title></head>
<body>
<form action="proses_update.php" method="POST">
  <input type="text" name="kodedos" value="<?= $data['kodedos'] ?>" readonly><br>
  <input type="text" name="nama" value="<?= $data['nama'] ?>"><br>
  <input type="text" name="alamat" value="<?= $data['alamat'] ?>"><br>
  <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>"><br>
  <input type="text" name="jja" value="<?= $data['jja'] ?>"><br>
  <input type="text" name="prodi" value="<?= $data['prodi'] ?>"><br>
  <input type="text" name="nohp" value="<?= $data['nohp'] ?>"><br>
  <input type="text" name="pasangan" value="<?= $data['pasangan'] ?>"><br>
  <input type="text" name="anak" value="<?= $data['anak'] ?>"><br>
  <input type="text" name="ilmu" value="<?= $data['ilmu'] ?>"><br>
  <button type="submit">Update</button>
</form>
</body>
</html>
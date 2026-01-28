<?php
require_once 'koneksi.php';
require_once 'fungsi.php';
$status = $_GET['status'] ?? '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Biodata Dosen</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header><h1>Form Biodata Dosen</h1></header>
  <main>
    <?php tampilkanStatus($status); ?>

    <section id="biodata">
      <form action="proses_bio.php" method="POST" class="form-box">
        <label>Kode Dosen:</label><input type="text" name="kodedos" required>
        <label>Nama Dosen:</label><input type="text" name="nama" required>
        <label>Alamat:</label><input type="text" name="alamat">
        <label>Tanggal Jadi Dosen:</label><input type="date" name="tanggal">
        <label>JJA:</label><input type="text" name="jja">
        <label>Prodi:</label><input type="text" name="prodi">
        <label>No HP:</label><input type="text" name="nohp">
        <label>Nama Pasangan:</label><input type="text" name="pasangan">
        <label>Nama Anak:</label><input type="text" name="anak">
        <label>Bidang Ilmu:</label><input type="text" name="ilmu">
        <div class="form-buttons">
          <button type="submit">Kirim</button>
          <button type="reset">Batal</button>
        </div>
      </form>
    </section>

    <section id="data">
      <h2>Data Dosen Tersimpan</h2>
      <div class="table-box">
        <?php
        $result = $conn->query("SELECT * FROM dosen ORDER BY nama ASC");
        if (!$result || $result->num_rows === 0) {
            echo "<p>Belum ada data dosen.</p>";
        } else {
            echo "<table><thead><tr>
              <th>Kode</th><th>Nama</th><th>Prodi</th><th>Ilmu</th><th>Aksi</th>
            </tr></thead><tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                  <td>{$row['kodedos']}</td>
                  <td>{$row['nama']}</td>
                  <td>{$row['prodi']}</td>
                  <td>{$row['ilmu']}</td>
                  <td>
                    <a href='edit.php?kodedos={$row['kodedos']}'>Edit</a> |
                    <a href='proses_delete.php?kodedos={$row['kodedos']}' onclick='return confirm(\"Yakin hapus?\")'>Hapus</a>
                  </td>
                </tr>";
            }
            echo "</tbody></table>";
        }
        ?>
      </div>
    </section>
  </main>
  <footer><p>&copy; 2026 Melvyn – UAS PWD TI1A</p></footer>
  <script src="script.js"></script>
</body>
</html>
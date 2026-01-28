<?php
session_start();
require_once __DIR__ . '/fungsi.php';
require_once __DIR__ . '/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Biodata Dosen</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>Aplikasi CRUD Biodata Dosen</h1>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">&#9776;</button>
    <nav>
      <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#biodata">Biodata Dosen</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <!-- HOME -->
    <section id="home">
      <h2>Selamat Datang</h2>
      <?php
      echo "halo dunia!<br>";
      echo "nama saya hadi";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>

    <!-- BIODATA DOSEN -->
    <section id="biodata">
      <h2>Form Input Biodata Dosen</h2>
      <form action="proses_bio.php" method="POST">
        <label>Kode Dosen:</label>
        <input type="text" name="kodedos" required><br>

        <label>Nama Dosen:</label>
        <input type="text" name="nama" required><br>

        <label>Alamat Rumah:</label>
        <input type="text" name="alamat" required><br>

        <label>Tanggal Jadi Dosen:</label>
        <input type="date" name="tanggal" required><br>

        <label>JJA Dosen:</label>
        <input type="text" name="jja" required><br>

        <label>Homebase Prodi:</label>
        <input type="text" name="prodi" required><br>

        <label>Nomor HP:</label>
        <input type="text" name="nohp" required><br>

        <label>Nama Pasangan:</label>
        <input type="text" name="pasangan"><br>

        <label>Nama Anak:</label>
        <input type="text" name="anak"><br>

        <label>Bidang Ilmu Dosen:</label>
        <input type="text" name="ilmu" required><br>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
    </section>

    <!-- TAMPILKAN DATA DOSEN -->
    <section id="data-dosen">
      <h2>Data Dosen Tersimpan</h2>
      <?php
      $status = $_GET['status'] ?? '';
      if ($status === 'success') echo "<p class='success'>Data berhasil disimpan!</p>";
      if ($status === 'failed') echo "<p class='error'>Gagal menyimpan data!</p>";
      if ($status === 'update_success') echo "<p class='success'>Data berhasil diupdate!</p>";
      if ($status === 'update_failed') echo "<p class='error'>Update gagal!</p>";
      if ($status === 'delete_success') echo "<p class='success'>Data berhasil dihapus!</p>";
      if ($status === 'delete_failed') echo "<p class='error'>Hapus gagal!</p>";

      $result = $conn->query("SELECT * FROM dosen");
      echo "<table border='1' cellpadding='5'>
              <tr>
                <th>Kode Dosen</th><th>Nama</th><th>Alamat</th><th>Tanggal</th>
                <th>JJA</th><th>Prodi</th><th>No HP</th><th>Pasangan</th>
                <th>Anak</th><th>Ilmu</th><th>Aksi</th>
              </tr>";
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['kodedos']}</td>
                <td>{$row['nama']}</td>
                <td>{$row['alamat']}</td>
                <td>{$row['tanggal']}</td>
                <td>{$row['jja']}</td>
                <td>{$row['prodi']}</td>
                <td>{$row['nohp']}</td>
                <td>{$row['pasangan']}</td>
                <td>{$row['anak']}</td>
                <td>{$row['ilmu']}</td>
                <td>
                  <a href='edit.php?kodedos={$row['kodedos']}'>Edit</a> |
                  <a href='proses_delete.php?kodedos={$row['kodedos']}' onclick='return confirm(\"Yakin hapus?\")'>Delete</a>
                </td>
              </tr>";
      }
      echo "</table>";
      ?>
    </section>

    <!-- ABOUT -->
    <section id="about">
      <h2>Tentang Saya</h2>
      <?php
      $biodata = $_SESSION["biodata"] ?? [];
      $fieldConfig = [
        "kodedos" => ["label" => "Kode Dosen:", "suffix" => ""],
        "nama" => ["label" => "Nama Dosen:", "suffix" => " &#128526;"],
        "alamat" => ["label" => "Alamat Rumah:", "suffix" => ""],
        "tanggal" => ["label" => "Tanggal Jadi Dosen:", "suffix" => ""],
        "jja" => ["label" => "JJA Dosen:", "suffix" => " &#127926;"],
        "prodi" => ["label" => "Homebase Prodi:", "suffix" => " &hearts;"],
        "nohp" => ["label" => "Nomor HP:", "suffix" => " &copy; 2025"],
        "pasangan" => ["label" => "Nama Pasangan:", "suffix" => ""],
        "anak" => ["label" => "Nama Anak:", "suffix" => ""],
        "ilmu" => ["label" => "Bidang Ilmu Dosen:", "suffix" => ""],
      ];
      echo tampilkanBiodata($fieldConfig, $biodata);
      ?>
    </section>

    <!-- CONTACT -->
    <section id="contact">
      <h2>Kontak Kami</h2>
      <?php
      $flash_sukses = $_SESSION['flash_sukses'] ?? '';
      $flash_error  = $_SESSION['flash_error'] ?? '';
      $old          = $_SESSION['old'] ?? [];
      unset($_SESSION['flash_sukses'], $_SESSION['flash_error'], $_SESSION['old']);
      ?>

      <?php if (!empty($flash_sukses)): ?>
        <div class="success"><?= $flash_sukses; ?></div>
      <?php endif; ?>

      <?php if (!empty($flash_error)): ?>
        <div class="error"><?= $flash_error; ?></div>
      <?php endif; ?>

      <form action="proses.php" method="POST">
        <label>Nama:</label>
        <input type="text" name="txtNama" required value="<?= isset($old['nama']) ? htmlspecialchars($old['nama']) : '' ?>"><br>

        <label>Email:</label>
        <input type="email" name="txtEmail" required value="<?= isset($old['email']) ? htmlspecialchars($old['email']) : '' ?>"><br>

        <label>Pesan:</label>
        <textarea name="txtPesan" rows="4" required><?= isset($old['pesan']) ? htmlspecialchars($old['pesan']) : '' ?></textarea><br>

        <label>Captcha 2 + 3 = ?</label>
        <input type="number" name="txtCaptcha" required value="<?= isset($old['captcha']) ? htmlspecialchars($old['captcha']) : '' ?>"><br>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

      <hr>
      <h2>Yang menghubungi kami</h2>
      <?php include 'read_inc.php'; ?>
    </section>
  </main>

  <footer>
    <p>&copy; 2026 MELVYN [05]</p>
  </footer>

  <script src="script.js"></script>
</body>
</html>
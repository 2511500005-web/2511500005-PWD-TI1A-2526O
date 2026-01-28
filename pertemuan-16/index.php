<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Biodata Dosen</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Form Biodata Dosen</h1>
  </header>

  <main>
    <section id="biodata">
      <form action="proses_bio.php" method="POST" class="form-box">
        <label for="txtKodeDos">Kode Dosen:</label>
        <input type="text" id="txtKodeDos" name="txtKodeDos" required>

        <label for="txtNmDosen">Nama Dosen:</label>
        <input type="text" id="txtNmDosen" name="txtNmDosen" required>

        <label for="txtAlRmh">Alamat:</label>
        <input type="text" id="txtAlRmh" name="txtAlRmh" required>

        <label for="txtTglDosen">Tanggal Jadi Dosen:</label>
        <input type="date" id="txtTglDosen" name="txtTglDosen" required>

        <label for="txtJJA">JJA:</label>
        <input type="text" id="txtJJA" name="txtJJA" required>

        <label for="txtProdi">Prodi:</label>
        <input type="text" id="txtProdi" name="txtProdi" required>

        <label for="txtNoHP">No HP:</label>
        <input type="text" id="txtNoHP" name="txtNoHP" required>

        <label for="txNamaPasangan">Nama Pasangan:</label>
        <input type="text" id="txNamaPasangan" name="txNamaPasangan" required>

        <label for="txtNmAnak">Nama Anak:</label>
        <input type="text" id="txtNmAnak" name="txtNmAnak" required>

        <label for="txtBidangIlmu">Bidang Ilmu:</label>
        <input type="text" id="txtBidangIlmu" name="txtBidangIlmu" required>

        <div class="form-buttons">
          <button type="submit">Kirim</button>
          <button type="reset">Batal</button>
        </div>
      </form>
    </section>

    <section id="data">
      <h2>Data Dosen Tersimpan</h2>
      <div class="table-box">
        <!-- Tabel data dosen akan ditampilkan di sini oleh PHP -->
        <p>Belum ada data dosen.</p>
      </div>
    </section>
  </main>

  <footer>
    <p>&copy; 2026 Melvyn – UAS PWD TI1A</p>
  </footer>
</body>
</html>
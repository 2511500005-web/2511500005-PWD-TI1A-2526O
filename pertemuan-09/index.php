<?php
session_start();

$sesnama = "";
if (isset($_SESSION["sesnama"])) {
  $sesnama = $_SESSION["sesnama"];
} else {
  $sesnama = "";
}

$sesemail = "";
if (isset($_SESSION["sesemail"])) {
  $sesemail = $_SESSION["sesemail"];
} else {
  $sesemail = "";
}

$sespesan = "";
if (isset($_SESSION["sespesan"])) {
  $sespesan = $_SESSION["sespesan"];
} else {
  $sespesan = "";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Judul Halaman</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>Ini Header</h1>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
      &#9776;
    </button>
    <nav>
      <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="home">
      <h2>Selamat Datang</h2>
      <?php
      echo "halo dunia!<br>";
      echo "nama saya hadi";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>

    <section id="biodata">
      <h2>Biodata Sederhana Mahasiswa</h2>
      <form action="proses.php" method="POST">

        <label for="txtNim"><span>NIM:</span>
          <input type="text" id="txtNim" name="txtNim" placeholder="Masukkan NIM" required>
        </label>

        <label for="txtNmLengkap"><span>Nama Lengkap:</span>
          <input type="text" id="txtNmLengkap" name="txtNmLengkap" placeholder="Masukkan Nama Lengkap" required>
        </label>

        <label for="txtT4Lhr"><span>Tempat Lahir:</span>
          <input type="text" id="txtT4Lhr" name="txtT4Lhr" placeholder="Masukkan Tempat Lahir" required>
        </label>

        <label for="txtTglLhr"><span>Tanggal Lahir:</span>
          <input type="text" id="txtTglLhr" name="txtTglLhr" placeholder="Masukkan Tanggal Lahir" required>
        </label>

        <label for="txtHobi"><span>Hobi:</span>
          <input type="text" id="txtHobi" name="txtHobi" placeholder="Masukkan Hobi" required>
        </label>

        <label for="txtPasangan"><span>Pasangan:</span>
          <input type="text" id="txtPasangan" name="txtPasangan" placeholder="Masukkan Pasangan" required>
        </label>

        <label for="txtKerja"><span>Pekerjaan:</span>
          <input type="text" id="txtKerja" name="txtKerja" placeholder="Masukkan Pekerjaan" required>
        </label>

        <label for="txtNmOrtu"><span>Nama Orang Tua:</span>
          <input type="text" id="txtNmOrtu" name="txtNmOrtu" placeholder="Masukkan Nama Orang Tua" required>
        </label>

        <label for="txtNmKakak"><span>Nama Kakak:</span>
          <input type="text" id="txtNmKakak" name="txtNmKakak" placeholder="Masukkan Nama Kakak" required>
        </label>

        <label for="txtNmAdik"><span>Nama Adik:</span>
          <input type="text" id="txtNmAdik" name="txtNmAdik" placeholder="Masukkan Nama Adik" required>
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

        <?php foreach ($fieldConfig as $key => $field): ?>
          <label for="txt<?php echo ucfirst($key); ?>"><span><?php echo $field["label"]; ?>:</span>
            <input type="text" id="txt<?php echo ucfirst($key); ?>" name="txt<?php echo ucfirst($key); ?>" placeholder="Masukkan <?php echo $field["label"]; ?>" required>
           </label>
       
           <?php endforeach; ?>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

      <?php
      $txtNim = $_SESSION["biodata"]["nim"] ?? "";

$fields = [
    "tanggal"    => ["label" => "Tanggal Lahir",    "suffix" => ""],
    "hobi"       => ["label" => "Hobi",             "suffix" => "&#127926;"],
    "pasangan"   => ["label" => "Nama Pasangan",    "suffix" => ""],
    "ortu"       => ["label" => "Nama Orang Tua",   "suffix" => ""],
    "pekerjaan"  => ["label" => "Pekerjaan",        "suffix" => "&#128296;"],
    "kakak"      => ["label" => "Nama Kakak",       "suffix" => "&#127926;"],
    "adik"       => ["label" => "Nama Adik",        "suffix" => "&#128526;"],
    "lain"       => ["label" => "Lainnya",          "suffix" => "&copy; 2025"],
];
?>


      <?php
      $txtNmLengkap = $_SESSION["biodata"]["nama"] ?? "";
      $txtT4Lhr = $_SESSION["biodata"]["tempat"] ?? "";
      $txtTglLhr = $_SESSION["biodata"]["tanggal"] ?? "";
      $txtHobi = $_SESSION["biodata"]["hobi"] ?? "";
      $txtPasangan = $_SESSION["biodata"]["pasangan"] ?? "";
      $txtKerja = $_SESSION["biodata"]["pekerjaan"] ?? "";
      $txtNmOrtu = $_SESSION["biodata"]["ortu"] ?? "";
      $txtNmKakak = $_SESSION["biodata"]["kakak"] ?? "";
      $txtNmAdik = $_SESSION["biodata"]["adik"] ?? "";
      ?>

    <section id="about">
      <h2>Tentang Saya</h2>
      <?php foreach ($fieldsConfig as $key => $metadata): ?>
        <p>
          <strong> <?= $metadata["label"] ?>: </strong>
          <?= htmlspecialchars(string: $biodata [$key] ?? "") ?>
       <?=$metadata["suffix"] ?>
        </p>
      <?php endforeach; ?>
      
      <p><strong>NIM:</strong> <?= $txtNim ?></p>
      <p><strong>Nama Lengkap:</strong> <?= $txtNmLengkap ?> &#128526;</p>
      <p><strong>Tempat Lahir:</strong> <?= $txtT4Lhr ?></p>
      <p><strong>Tanggal Lahir:</strong> <?= $txtTglLhr ?></p>
      <p><strong>Hobi:</strong> <?= $txtHobi ?> &#127926;</p>
      <p><strong>Pasangan:</strong> <?= $txtPasangan ?> &hearts;</p>
      <p><strong>Pekerjaan:</strong> <?= $txtKerja ?> &copy; 2025</p>
      <p><strong>Nama Orang Tua:</strong> <?= $txtNmOrtu ?></p>
      <p><strong>Nama Kakak:</strong> <?= $txtNmKakak ?></p>
      <p><strong>Nama Adik:</strong> <?= $txtNmAdik ?></p>
    </section>

    <section id="contact">
      <h2>Kontak Kami</h2>
      <form action="proses.php" method="POST">

        <label for="txtNama"><span>Nama:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required autocomplete="name">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required autocomplete="email">
        </label>

        <label for="txtPesan"><span>Pesan Anda:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
          <small id="charCount">0/200 karakter</small>
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

      <?php if (!empty($sesnama)): ?>
        <br><hr>
        <h2>Yang menghubungi kami</h2>
        <p><strong>Nama :</strong> <?php echo $sesnama ?></p>
        <p><strong>Email :</strong> <?php echo $sesemail ?></p>
        <p><strong>Pesan :</strong> <?php echo $sespesan ?></p>
      <?php endif; ?>



    </section>
  </main>

  <footer>
    <p>&copy; 2025 Yohanes Setiawan Japriadi [0344300002]</p>
  </footer>

  <script src="script.js"></script>
</body>

</html>
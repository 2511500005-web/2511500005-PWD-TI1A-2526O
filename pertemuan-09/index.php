<?php
session_start();

$sesnama = "";
if (isset($_SESSION["sesnama"])):
  $sesnama = $_SESSION["sesnama"];
endif;

$sesemail = "";
if (isset($_SESSION["sesemail"])):
  $sesemail = $_SESSION["sesemail"];
endif;

$sespesan = "";
if (isset($_SESSION["sespesan"])):
  $sespesan = $_SESSION["sespesan"];
endif;

<?php
$biodata = $_SESSION["biodata"] ?? [];

$fieldConfig = [
    "nim"        => ["label" => "NIM",              "suffix" => ""],
    "nama"       => ["label" => "Nama Lengkap",     "suffix" => "&#128526;"],
    "tempat"     => ["label" => "Tempat Lahir",     "suffix" => ""],
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

        <?php foreach ($fieldConfig as $key => $field): ?>
          <label for="txt<?php echo ucfirst($key); ?>"><span><?php echo $field["label"]; ?>:</span>
            <input type="text" id="txt<?php echo ucfirst($key); ?>" name="txt<?php echo ucfirst($key); ?>" placeholder="Masukkan <?php echo $field["label"]; ?>" required>
    <?php
    $biodata = $_SESSION["biodata"] ?? [];

$fieldConfig = [
    "nim"        => ["label" => "NIM",              "suffix" => ""],
    "nama"       => ["label" => "Nama Lengkap",     "suffix" => "&#128526;"],
    "tempat"     => ["label" => "Tempat Lahir",     "suffix" => ""],
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
          </label>
        <?php endforeach; ?>

        <button type="submit">Simpan Biodata</button>
        <button type="reset">Batal</button>
      </form>

      <h3>Data Biodata yang Disimpan:</h3>
      <?php
      $txtNim = $biodata["nim"] ?? "";
      $txtNmLengkap = $biodata["nama"] ?? "";
      $txtT4Lhr = $biodata["tempat"] ?? "";
      $txtTglLhr = $biodata["tanggal"] ?? "";
      $txtHobi = $biodata["hobi"] ?? "";
      $txtPasangan = $biodata["pasangan"] ?? "";
      $txtKerja = $biodata["pekerjaan"] ?? "";
      $txtNmOrtu = $biodata["ortu"] ?? "";
      $txtNmKakak = $biodata["kakak"] ?? "";
      $txtNmAdik = $biodata["adik"] ?? "";
      ?>

      <p><strong>NIM:</strong> <?= $txtNim ?></p>
      <p><str
?>ong>Nama Lengkap:</strong> <?= $txtNmLengkap ?> &#128526;</p>
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
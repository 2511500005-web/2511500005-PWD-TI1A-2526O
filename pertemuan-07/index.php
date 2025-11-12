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

     <section id="form-pendaftaran">
      <h2>PENDAFTARAN PROFIL PENGUNJUNG</h2>
      <form action="proses.php" method="POST">

        <label for="txtNama"><span>$NIM:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required autocomplete="name">
        </label>

        <label for="txtNamaLengkap"><span>NAMA LENGKAP:</span>
          <input type="text" id="txtNamaLengkap" name="txtNamaLengkap" placeholder="Masukkan Nama Lengkap" required autocomplete="name">
        </label>

        <label for="txtTempatLahir"><span>tempat lahir:</span>
          <textarea id="txtTempatLahir" name="txtTempatLahir" rows="4" placeholder="Tulis tempat lahir anda..." required></textarea>
          <small id="charCount">0/200 karakter</small>
        </label>

        <label for="txtTanggalLahir"><span>tanggal lahir:</span>
          <input type="date" id="txtTanggalLahir" name="txtTanggalLahir" required>
        </label>

        <label for="txtHobi"><span>hobi:</span>
          <textarea id="txtHobi" name="txtHobi" rows="4" placeholder="Tulis hobi anda..." required></textarea>
          <small id="charCount">0/200 karakter</small>
        </label>

<formlabel for="txtPasangan"><span>pasangan:</span>
          <input type="text" id="txtPasangan" name="txtPasangan" placeholder="Masukkan pasangan" required autocomplete="name">
        </label>

        <label for="txtPekerjaan"><span>pekerjaan:</span>
          <input type="text" id="txtPekerjaan" name="txtPekerjaan" placeholder="Masukkan pekerjaan" required autocomplete="name">
        </label>

        <label for="txtNamaOrtu"><span>nama orang tua:</span>
          <input type="text" id="txtNamaOrtu" name="txtNamaOrtu" placeholder="Masukkan nama orang tua" required autocomplete="name">
        </label>

        <label for="txtNamaKakak"><span>nama kakak:</span>
          <input type="text" id="txtNamaKakak" name="txtNamaKakak" placeholder="Masukkan nama kakak" required autocomplete="name">
        </label>

<formlabel for="txtNamaAdik"><span>nama adik:</span>
          <input type="text" id="txtNamaAdik" name="txtNamaAdik" placeholder="Masukkan nama adik" required autocomplete="name">
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

    <section id="about">
      <?php
      $nim = 2511500010;
      $NIM = '0344300002';
      $nama = "Say'yid Abdullah";
      $Nama = 'Al\'kautar Benyamin';
      $tempat = "Jebus";
      ?>
      <h2>Tentang Saya</h2>
      <p><strong>NIM:</strong>
        <?php
        echo $NIM;
        ?>
      </p>
      <p><strong>Nama Lengkap:</strong>
        <?php
        echo $Nama;
        ?> &#128526;
      </p>
      <p><strong>Tempat Lahir:</strong> <?php echo $tempat; ?></p>
      <p><strong>Tanggal Lahir:</strong> 1 Januari 2000</p>
      <p><strong>Hobi:</strong> Memasak, coding, dan bermain musik &#127926;</p>
      <p><strong>Pasangan:</strong> Belum ada &hearts;</p>
      <p><strong>Pekerjaan:</strong> Dosen di ISB Atma Luhur &copy; 2025</p>
      <p><strong>Nama Orang Tua:</strong> Bapak Setiawan dan Ibu Maria</p>
      <p><strong>Nama Kakak:</strong> Antonius Setiawan</p>
      <p><strong>Nama Adik:</strong> <?php echo $sespesan ?></p>
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
    <p>&copy; 2025 MELVYN 2511500005</p>
  </footer>

  <script src="script.js"></script>
</body>

</html>
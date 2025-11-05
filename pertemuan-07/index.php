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

    <section id="about">
      <?php
      $nim = 2511500010;
      $NIM = '0344300002';
      $nama = "Say'yid Abdullah";
      $Nama = 'Al\'kautar Benyamin';
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
      <p><strong>Tempat Lahir:</strong> Pangkalpinang</p>
      <p><strong>Tanggal Lahir:</strong> 1 Januari 2000</p>
      <p><strong>Hobi:</strong> Memasak, coding, dan bermain musik &#127926;</p>
      <p><strong>Pasangan:</strong> Belum ada &hearts;</p>
      <p><strong>Pekerjaan:</strong> Dosen di ISB Atma Luhur &copy; 2025</p>
      <p><strong>Nama Orang Tua:</strong> Bapak Setiawan dan Ibu Maria</p>
      <p><strong>Nama Kakak:</strong> Antonius Setiawan</p>
      <p><strong>Nama Adik:</strong> Christina Setiawan</p>
    </section>

    <section id="contact">
      <h2>Kontak Kami</h2>
      <form action="" method="GET">

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
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Yohanes Setiawan Japriadi [0344300002]</p>
  </footer>

  <script src="script.js"></script>
</body>

</html>
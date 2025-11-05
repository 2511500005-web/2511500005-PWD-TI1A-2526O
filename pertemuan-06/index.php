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
    %#9776;
</button>

    <nav>
        <ul>
            <li><a href="#home">BERANDA</a></li>
            <li><a href="#about">TENTANG</a></li>
            <li><a href="#contact">KONTAK</a></li>
        </ul>
    </nav></header>
    <main>
        <section id="home">
            <h2>WELCOME</h2>
            <?php
echo "halo,dunia!<br>", "nama saya melvyn mahinda jadi";
?>
            <p>Selamat datang di halaman beranda.</p>
        </section>
        <section id="about">
            <?php
            echo $nim = "2511500005<br>";
            echo $nama = "Melvyn Mahinda Jadi<br>";
            echo $tempatLahir = "PGK<br>";
            echo $tanggalLahir = "06-01-2006<br>";
            echo $hobi = "Menggambar komik sederhana<br>";
            echo $pasangan = "Belum menikah<br>";
            echo $pekerjaan = "Mahasiswa<br>";
            echo $namaOrangTua = "Sherlie (ibu) & Hendy (ayah)<br>";
            echo $namaKakak = "Tidak ada<br>";
            echo $namaAdik = "Derren Hadianto<br>";
            ?> 
            <h2>TENTANG KAMI</h2>
            <p>👨‍🎓 <strong><?php echo $nim = "2511500005<br>"; ?></strong></p>
    😊 <strong>Nama Lengkap:</strong> <?php echo $nama = "Melvyn Mahinda Jadi<br>"; ?></p>
    📍 <strong>Tempat Lahir:</strong> <?php echo $tempatLahir = "PGK<br>"; ?></p>
    🎂 <strong>Tanggal Lahir:</strong> <?php echo $tanggalLahir = "06-01-2006<br>"; ?></p>
    🎨 <strong>Hobi:</strong> <?php echo $hobi = "Menggambar komik sederhana<br>"; ?></p>
    💞 <strong>Pasangan:</strong> <?php echo $pasangan = "Belum menikah<br>"; ?></p>
    💼 <strong>Pekerjaan:</strong> <?php echo $pekerjaan = "Mahasiswa<br>"; ?></p>
    👪 <strong>Nama Orang Tua:</strong> <?php echo $namaOrangTua = "Sherlie (ibu) & Hendy (ayah)<br>"; ?></p>
    🚫 <strong>Nama Kakak:</strong> <?php echo $namaKakak = "Tidak ada<br>"; ?></p>
    👦 <strong>Nama Adik:</strong> <?php echo $namaAdik = "Derren Hadianto<br>"; ?></p>
        </section>
        <section id="contact">
            <h2>KONTAK KAMI</h2>
              <form action="" method="GET">
                <label for="txtNama"><span>Nama:</span>
                <input type="text" id="txtNama" name="txtNama" placeholder="MASUKKAN NAMA" required autocomplete="name">
            

                <label for="txtEmail"><span>Email:</span>
                <input type="email" id="txtEmail" name="txtEmail" required><br><br>

                <label for="txtPesan"><span>Pesan:</span></label><br>
                <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="TULIS PESAN ANDA" required></textarea><br><br>
<small id="charCount">0/200 karakter</small>
                </label>

                <button type="submit">Kirim</button>
                <button type="reset">Batal</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Hak Cipta Dilindungi.</p>
    </footer>

    <script src="script.js"></script>
     <script>
        alert("Halo Dunia!");
</script>
</body><section id="ipk">
    <h2>IPK SAYA</h2>
    <?php
    $nilai1 = 3.5;
    $nilai2 = 3.7;
    $nilai3 = 3.8;
    $nilai4 = 3.6;

    $ipk = ($nilai1 + $nilai2 + $nilai3 + $nilai4) / 4;

    echo "IPK Saya adalah: " . number_format($ipk, 2);
    ?>
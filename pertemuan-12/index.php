<?php
session_start();
include "koneksi.php";

function bersihkan($data) {
  return htmlspecialchars(trim($data));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama  = bersihkan($_POST["txtNama"] ?? "");
  $email = bersihkan($_POST["txtEmail"] ?? "");
  $pesan = bersihkan($_POST["txtPesan"] ?? "");

  $sql = "INSERT INTO tbl_tamu (cnama, cemail, cpesan) VALUES (?, ?, ?)";
  $stmt = mysqli_prepare($conn, $sql);

  if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $pesan);
    if (mysqli_stmt_execute($stmt)) {
      $_SESSION["flash_sukses"] = "Terima kasih, data Anda sudah tersimpan.";
    } else {
      $_SESSION["flash_error"] = "Data gagal disimpan. Silakan coba lagi.";
    }
    mysqli_stmt_close($stmt);
  } else {
    $_SESSION["flash_error"] = "Terjadi kesalahan sistem (prepare gagal).";
  }

  header("Location: index.php#contact");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Halaman Biodata & Kontak</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
    header { background-color: #003366; color: white; padding: 20px; text-align: center; }
    nav { background-color: #eee; padding: 10px; text-align: center; }
    nav a { margin: 0 15px; text-decoration: none; color: #003366; font-weight: bold; }
    section { padding: 20px; }
    h2 { color: #003366; }
    form { max-width: 400px; margin-top: 20px; }
    label { display: block; margin-top: 10px; }
    input, textarea { width: 100%; padding: 8px; margin-top: 5px; }
    button { margin-top: 15px; padding: 10px 20px; background-color: #003366; color: white; border: none; }
    .flash { margin-top: 15px; padding: 10px; border-radius: 5px; }
    .flash.sukses { background-color: #d4edda; color: #155724; }
    .flash.error { background-color: #f8d7da; color: #721c24; }
    table { border-collapse: collapse; width: 100%; margin-top: 20px; }
    th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    th { background-color: #003366; color: white; }
    .biodata, .kontak-box { margin-top: 30px; background-color: #f9f9f9; padding: 15px; border-radius: 5px; }
    footer { background-color: #003366; color: white; text-align: center; padding: 15px; margin-top: 30px; }
  </style>
</head>
<body>

<header>
  <h1>Ini Header</h1>
</header>

<nav>
  <a href="#home">Beranda</a>
  <a href="#about">Tentang</a>
  <a href="#contact">Kontak</a>
</nav>

<section id="home">
  <h2>Selamat Datang</h2>
  <p>Halo dunia!<br>Nama saya Hadi</p>
  <p>Ini contoh paragraf HTML.</p>
</section>

<section id="biodata">
  <h2>📋 Biodata Sederhana Mahasiswa</h2>
  <div class="biodata">
    <p>🆔 NIM: 2511500005</p>
    <p>👤 Nama Lengkap: MELVYN 😎</p>
    <p>📍 Tempat Lahir: B</p>
    <p>📅 Tanggal Lahir: C</p>
    <p>🦋 Hobi: D</p>
    <p>❤️ Pasangan: E</p>
    <p>💼 Pekerjaan: F © 2025</p>
    <p>👪 Nama Orang Tua: G</p>
    <p>👧 Nama Kakak: H</p>
    <p>👶 Nama Adik: I</p>
  </div>
</section>

<section id="contact">
  <h2>📬 Kontak Kami</h2>
  <div class="kontak-box">

    <?php if (isset($_SESSION['flash_sukses'])): ?>
      <div class="flash sukses"><?= $_SESSION['flash_sukses']; unset($_SESSION['flash_sukses']); ?></div>
    <?php endif; ?>
    <?php if (isset($_SESSION['flash_error'])): ?>
      <div class="flash error"><?= $_SESSION['flash_error']; unset($_SESSION['flash_error']); ?></div>
    <?php endif; ?>

    <form method="POST">
      <label>Nama:</label>
      <input type="text" name="txtNama" required>

      <label>Email:</label>
      <input type="email" name="txtEmail" required>

      <label>Pesan Anda:</label>
      <textarea name="txtPesan" rows="4" required></textarea>

      <label> Captcha: Berapa 3 + 1? </label>
      <input type="text" name="txtCaptcha" required>

      <button type="submit">Kirim</button>
      <button type="reset">Batal</button>
    </form>

    <h3>📋 Daftar Tamu</h3>
    <p>Berikut adalah daftar pesan yang masuk:</p>

    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Aksi</th>
          <th>ID</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Pesan</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = mysqli_query($conn, "SELECT cid, cnama, cemail, cpesan FROM tbl_tamu ORDER BY cid DESC");
        if ($result && mysqli_num_rows($result) > 0) {
          $no = 1;
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$no}</td>
                    <td>".htmlspecialchars($row['cid'])."</td>
                    <td>".htmlspecialchars($row['cid'])."</td>
                    <td>".htmlspecialchars($row['cnama'])."</td>
                    <td>".htmlspecialchars($row['cemail'])."</td>
                    <td>".htmlspecialchars($row['cpesan'])."</td>
                  </tr>";
            $no++;
          }
        }
        ?>
      </tbody>
    </table>

  </div>
</section>

<footer>
  <p>&copy; 2025 MELLYVN [2511500005]</p>
</footer>

</body>
</html>
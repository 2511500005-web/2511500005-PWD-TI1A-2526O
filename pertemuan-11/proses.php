<?php
include "koneksi.php";

function bersihkan($data) {
  return htmlspecialchars(trim($data));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama  = bersihkan($_POST["nama"]);
  $email = bersihkan($_POST["email"]);
  $pesan = bersihkan($_POST["pesan"]);

  $sql = "INSERT INTO kontak (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";

  if (mysqli_query($conn, $sql)) {
    echo "<p>✅ Data berhasil disimpan!</p>";
    echo "<a href='index.php'>Kembali ke Form</a>";
  } else {
    echo "<p>❌ Gagal menyimpan data: " . mysqli_error($conn) . "</p>";
  }
}
?>

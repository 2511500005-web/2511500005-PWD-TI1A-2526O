<?php
require_once 'koneksi.php';
require_once 'fungsi.php';

// Ambil pesan flash jika ada
$msg_sukses = take('flash_sukses');
$msg_error  = take('flash_error');
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pesan Kontak</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Yang Menghubungi Kami</h1>

  <!-- Tampilkan pesan sukses/gagal -->
  <?php if (!empty($msg_sukses)): ?>
    <div style="padding:10px; margin-bottom:10px; background:#d4edda; color:#155724; border-radius:6px;">
      <?= htmlspecialchars($msg_sukses) ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($msg_error)): ?>
    <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
      <?= htmlspecialchars($msg_error) ?>
    </div>
  <?php endif; ?>

  <?php
  // Ambil data kontak
  try {
    $stmtKontak = $pdo->query("SELECT * FROM kontak ORDER BY dibuat DESC");
    $kontakRows = $stmtKontak->fetchAll();
  } catch (PDOException $e) {
    echo "<p>Koneksi gagal: " . htmlspecialchars($e->getMessage()) . "</p>";
    exit;
  }

  if (!$kontakRows) {
    echo "<p>Belum ada pesan masuk.</p>";
  } else {
    echo "<table border='1' cellpadding='8' cellspacing='0'>";
    echo "<tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Pesan</th>
            <th>Dikirim</th>
            <th>Aksi</th>
          </tr>";
    foreach ($kontakRows as $c) {
      echo "<tr>
              <td>".htmlspecialchars($c['nama'])."</td>
              <td>".htmlspecialchars($c['email'])."</td>
              <td>".htmlspecialchars($c['pesan'])."</td>
              <td>".htmlspecialchars($c['dibuat'])."</td>
              <td>
                <a href='edit_kontak.php?id=".urlencode($c['id'])."'>Edit</a> |
                <a href='proses_delete_kontak.php?id=".urlencode($c['id'])."' class='btn-delete'>Delete</a>
              </td>
            </tr>";
    }
    echo "</table>";
  }
  ?>

  <script src="script.js"></script>
</body>
</html>
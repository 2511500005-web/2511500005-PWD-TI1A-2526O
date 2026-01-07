<?php
require_once 'koneksi.php';

try {
  $stmt = $pdo->query("SELECT nama, email, pesan, dibuat FROM kontak ORDER BY dibuat DESC");
  $rows = $stmt->fetchAll();
} catch (PDOException $e) {
  echo "<p>Koneksi gagal: " . htmlspecialchars($e->getMessage()) . "</p>";
  return;
}

if (!$rows) {
  echo "<p>Belum ada yang menghubungi.</p>";
} else {
  echo "<ul>";
  foreach ($rows as $r) {
    echo "<li><strong>" . htmlspecialchars($r['nama']) . "</strong> (" . htmlspecialchars($r['email']) . ")<br>";
    echo "<em>" . htmlspecialchars($r['pesan']) . "</em><br>";
    echo "<small>Dikirim: " . htmlspecialchars($r['dibuat']) . "</small></li><hr>";
  }
  echo "</ul>";
}
<?php
require_once 'koneksi.php';

$sql = "SELECT * FROM kontak ORDER BY id DESC";
$result = $conn->query($sql);

if (!$result || $result->num_rows === 0) {
    echo "<p>Belum ada pesan masuk.</p>";
} else {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li><strong>{$row['nama']}</strong> ({$row['email']})<br>
              {$row['pesan']}<br>
              <em>Dikirim: {$row['tanggal']}</em></li><hr>";
    }
    echo "</ul>";
}
?>
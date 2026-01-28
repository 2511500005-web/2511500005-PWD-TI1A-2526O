<?php
require_once __DIR__ . '/koneksi.php';

$sql = "SELECT * FROM kontak ORDER BY id DESC";
$result = $conn->query($sql);

if (!$result) {
    echo "<p class='error'>Query gagal: " . $conn->error . "</p>";
} elseif ($result->num_rows === 0) {
    echo "<p>Belum ada pesan masuk.</p>";
} else {
    echo "<table>
            <tr><th>Nama</th><th>Email</th><th>Pesan</th><th>Tanggal</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['nama']}</td>
                <td>{$row['email']}</td>
                <td>{$row['pesan']}</td>
                <td>{$row['tanggal']}</td>
              </tr>";
    }
    echo "</table>";
}
?>
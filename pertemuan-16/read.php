<?php
require_once __DIR__ . '/koneksi.php';

$sql = "SELECT * FROM dosen ORDER BY nama ASC";
$result = $conn->query($sql);

echo "<h2>Daftar Dosen</h2>";
if (!$result) {
    echo "<p class='error'>Query gagal: " . $conn->error . "</p>";
} elseif ($result->num_rows === 0) {
    echo "<p>Belum ada data dosen.</p>";
} else {
    echo "<table border='1' cellpadding='5'>
            <tr><th>Kode</th><th>Nama</th><th>Prodi</th><th>Ilmu</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['kodedos']}</td>
                <td>{$row['nama']}</td>
                <td>{$row['prodi']}</td>
                <td>{$row['ilmu']}</td>
              </tr>";
    }
    echo "</table>";
}
?>
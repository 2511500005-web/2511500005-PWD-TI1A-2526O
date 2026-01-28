<?php
require_once 'koneksi.php';

$sql = "SELECT * FROM dosen ORDER BY nama ASC";
$result = $conn->query($sql);

echo "<section id='data'>
        <h2>Daftar Dosen</h2>
        <div class='table-box'>";

if (!$result || $result->num_rows === 0) {
    echo "<p>Belum ada data dosen.</p>";
} else {
    echo "<table>
            <thead>
              <tr><th>Kode</th><th>Nama</th><th>Prodi</th><th>Bidang Ilmu</th></tr>
            </thead><tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['kodedos']}</td>
                <td>{$row['nama']}</td>
                <td>{$row['prodi']}</td>
                <td>{$row['ilmu']}</td>
              </tr>";
    }
    echo "</tbody></table>";
}
echo "</div></section>";
?>
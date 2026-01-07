<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Tamu</title>
  <style>
    body { font-family: Arial, sans-serif; }
    table { border-collapse: collapse; width: 100%; margin-top: 15px; }
    th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    th { background: #f0f0f0; }
    .flash { padding: 10px; margin-bottom: 10px; border-radius: 6px; }
    .sukses { background: #d4edda; color: #155724; }
    .error { background: #f8d7da; color: #721c24; }
  </style>
</head>
<body>

<h2>📋 Daftar Tamu</h2>

<?php
// tampilkan pesan flash
if (isset($_SESSION['flash_sukses'])) {
    echo "<div class='flash sukses'>".$_SESSION['flash_sukses']."</div>";
    unset($_SESSION['flash_sukses']);
}
if (isset($_SESSION['flash_error'])) {
    echo "<div class='flash error'>".$_SESSION['flash_error']."</div>";
    unset($_SESSION['flash_error']);
}
?>

<table>
  <thead>
    <tr>
      <th>No</th>
      <th>Aksi</th>
      <th>CID</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Pesan</th>
      <th>Created At</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT cid, cnama, cemail, cpesan, dcreated_at FROM tbl_tamu ORDER BY cid DESC";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$no++."</td>";
            echo "<td>
                    <a href='edit.php?cid=".$row['cid']."'>Edit</a> | 
                    <a href='proses_delete.php?cid=".$row['cid']."' onclick=\"return confirm('Yakin ingin menghapus data ini?')\">Hapus</a>
                  </td>";
            echo "<td>".$row['cid']."</td>";
            echo "<td>".htmlspecialchars($row['cnama'])."</td>";
            echo "<td>".htmlspecialchars($row['cemail'])."</td>";
            echo "<td>".nl2br(htmlspecialchars($row['cpesan']))."</td>";
            echo "<td>".htmlspecialchars($row['dcreated_at'])."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>⚠️ Belum ada data tamu.</td></tr>";
    }
    ?>
  </tbody>
</table>

</body>
</html>

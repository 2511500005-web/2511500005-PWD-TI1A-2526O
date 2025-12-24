<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';


$sql = "SELECT * FROM tbl_tamu ORDER BY cid DESC";
$q = mysqli_query($conn, $sql);

if (!$q) {
    die("Query error: " . mysqli_error($conn));
}
?>

<?php
$flash_sukses = $_SESSION['flash_sukses'] ?? null;
$flash_error = $_SESSION['flash_error'] ?? null;
unset($_SESSION['flash_sukses'], $_SESSION['flash_error']);
?>

<?php if (!empty($flash_sukses)): ?>
    <div style="color: green;"><?= htmlspecialchars($flash_sukses); ?>
<?= $flash_sukses; ?>
</div>
<?php endif; ?>

<?php if (!empty($flash_error)): ?>
    <div style="color: red;"><?= htmlspecialchars($flash_error); ?>
<?= $flash_error; ?>
</div>
<?php endif; ?>

<table border="1" cellpadding="8" cellspacing="0">
<tr>
    <th>No</th>
    <th>Aksi</th>
    <th>ID</th>
    <th>ID</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Pesan</th>
</tr>

<?php $i = 1; ?>
<?php while ($row = mysqli_fetch_assoc($q)): ?>
<tr>
    <td><?= $i++; ?></td>
    <td><a href="edit.php?cid=<? (int)$row['cid']; ?>Edit</a></td>
    <td><?= $row['cid']; ?></td>
    <td><?= $row['cid']; ?></td>
    <td><?= htmlspecialchars($row['cnama']); ?></td>
    <td><?= htmlspecialchars($row['cemail']); ?></td>
    <td><?= nl2br(htmlspecialchars($row['cpesan'])); ?></td>
</tr>
<?php endwhile; ?>
</table>
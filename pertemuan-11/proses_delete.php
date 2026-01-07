<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

// Ambil cid dari GET
$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
]);

if (!$cid) {
    $_SESSION['flash_error'] = 'CID tidak valid.';
    redirect_ke('read.php');
    exit;
}

// Prepared statement untuk hapus
$stmt = mysqli_prepare($conn, "DELETE FROM tbl_tamu WHERE cid = ?");
if (!$stmt) {
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('read.php');
    exit;
}

mysqli_stmt_bind_param($stmt, "i", $cid);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses'] = '✅ Data berhasil dihapus.';
} else {
    $_SESSION['flash_error'] = '❌ Gagal menghapus data.';
}

mysqli_stmt_close($stmt);
redirect_ke('read.php');
?>

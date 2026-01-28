<?php
require_once __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("INSERT INTO dosen 
        (kodedos, nama, alamat, tanggal, jja, prodi, nohp, pasangan, anak, ilmu) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss",
        sanitize($_POST['kodedos']),
        sanitize($_POST['nama']),
        sanitize($_POST['alamat']),
        sanitize($_POST['tanggal']),
        sanitize($_POST['jja']),
        sanitize($_POST['prodi']),
        sanitize($_POST['nohp']),
        sanitize($_POST['pasangan']),
        sanitize($_POST['anak']),
        sanitize($_POST['ilmu'])
    );

    if ($stmt->execute()) {
        header("Location: index.php?status=success");
    } else {
        header("Location: index.php?status=failed");
    }
    exit();
}
?>
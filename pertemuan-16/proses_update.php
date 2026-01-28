<?php
require_once 'koneksi.php';
require_once 'fungsi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("UPDATE dosen SET nama=?, alamat=?, tanggal=?, jja=?, prodi=?, nohp=?, pasangan=?, anak=?, ilmu=? WHERE kodedos=?");
    $stmt->bind_param("ssssssssss",
        sanitize($_POST['nama']),
        sanitize($_POST['alamat']),
        sanitize($_POST['tanggal']),
        sanitize($_POST['jja']),
        sanitize($_POST['prodi']),
        sanitize($_POST['nohp']),
        sanitize($_POST['pasangan']),
        sanitize($_POST['anak']),
        sanitize($_POST['ilmu']),
        $_POST['kodedos']
    );

    if ($stmt->execute()) {
        header("Location: index.php?status=update_success");
    } else {
        header("Location: index.php?status=update_failed");
    }
    exit();
}
?>
<?php
require_once __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kodedos  = $_POST['kodedos'];
    $nama     = sanitize($_POST['nama']);
    $alamat   = sanitize($_POST['alamat']);
    $tanggal  = sanitize($_POST['tanggal']);
    $jja      = sanitize($_POST['jja']);
    $prodi    = sanitize($_POST['prodi']);
    $nohp     = sanitize($_POST['nohp']);
    $pasangan = sanitize($_POST['pasangan']);
    $anak     = sanitize($_POST['anak']);
    $ilmu     = sanitize($_POST['ilmu']);

    $stmt = $conn->prepare("UPDATE dosen 
        SET nama=?, alamat=?, tanggal=?, jja=?, prodi=?, nohp=?, pasangan=?, anak=?, ilmu=? 
        WHERE kodedos=?");
    $stmt->bind_param("ssssssssss", $nama, $alamat, $tanggal, $jja, $prodi, $nohp, $pasangan, $anak, $ilmu, $kodedos);

    if ($stmt->execute()) {
        header("Location: index.php?status=update_success");
    } else {
        header("Location: index.php?status=update_failed");
    }
    exit();
}
?>
<?php
require_once 'koneksi.php';
require_once 'fungsi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama    = sanitize($_POST['txtNama']);
    $email   = filter_var($_POST['txtEmail'], FILTER_SANITIZE_EMAIL);
    $pesan   = sanitize($_POST['txtPesan']);
    $captcha = (int) $_POST['txtCaptcha'];

    if ($captcha !== 5) {
        header("Location: index.php?status=captcha_failed");
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO kontak (nama, email, pesan) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $email, $pesan);

    if ($stmt->execute()) {
        header("Location: index.php?status=contact_success");
    } else {
        header("Location: index.php?status=contact_failed");
    }
    exit();
}
?>
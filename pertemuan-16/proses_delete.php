<?php
require_once __DIR__ . '/koneksi.php';

$kodedos = $_GET['kodedos'] ?? '';

$stmt = $conn->prepare("DELETE FROM dosen WHERE kodedos=?");
$stmt->bind_param("s", $kodedos);

if ($stmt->execute()) {
    header("Location: index.php?status=delete_success");
} else {
    header("Location: index.php?status=delete_failed");
}
exit();
?>
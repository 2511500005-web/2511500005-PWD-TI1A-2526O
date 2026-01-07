<?php
// File koneksi.php
// Pastikan hanya ada kode PHP di sini, tanpa HTML

$dsn  = 'mysql:host=localhost;dbname=crud_biodata;charset=utf8mb4';
$user = 'root';   // sesuaikan dengan user MySQL kamu
$pass = '';       // sesuaikan dengan password MySQL kamu

$options = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
  $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
  exit('Koneksi gagal: ' . htmlspecialchars($e->getMessage()));
}
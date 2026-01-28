<?php
session_start();
require __DIR__ . './koneksi.php';
require_once __DIR__ . '/fungsi.php';

/*
	ikuti cara penulisan proses.php untuk validasi, sanitasi, RPG, data old
	dan insert ke tbl_tamu termasuk flash message ke index.php#biodata
	bedanya, kali ini diterapkan untuk biodata dosen bukan tamu
*/

$arrBiodata = [
  "kodedos" => $_POST["txtKodeDos"] ?? "",
  "nama" => $_POST["txtNmDosen"] ?? "",
  "alamat" => $_POST["txtAlRmh"] ?? "",
  "tanggal" => $_POST["txtTglDosen"] ?? "",
  "jja" => $_POST["txtJJA"] ?? "",
  "prodi" => $_POST["txtProdi"] ?? "",
  "nohp" => $_POST["txtNoHP"] ?? "",
  "pasangan" => $_POST["txNamaPasangan"] ?? "",
  "anak" => $_POST["txtNmAnak"] ?? "",
  "ilmu" => $_POST["txtBidangIlmu"] ?? ""
];
$_SESSION["biodata"] = $arrBiodata;

header("location: index.php#about");

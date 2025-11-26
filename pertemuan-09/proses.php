<?php
session_start();
$sesnama = $_POST["txtNama"];
$sesemail = $_POST["txtEmail"];
$sespesan = $_POST["txtPesan"];
$_SESSION["sesnama"] = $sesnama;
$_SESSION["sesemail"] = $sesemail;
$_SESSION["sespesan"] = $sespesan;

$arrBiodata = [
"nim" => $_POST["txtNim"] ?? "",
"nama" => $_POST["txtNmLengkap"] ?? "",
"tempat" => $_POST["txtT4Lhr"] ?? "",
"tanggal" => $_POST["txtTglLhr"] ?? "",
"hobi" => $_POST["txtHobi"] ?? "",
"pasangan" => $_POST["txtPasangan"] ?? "",
"pekerjaan" => $_POST["txtKerja"] ?? "",
"ortu" => $_POST["txtNmOrtu"] ?? "",
"kakak" => $_POST["txtNmKakak"] ?? "",
"adik" => $_POST["txtNmAdik"] ?? ""
];

$_SESSION["txtNim"] = $txtNim;
$_SESSION["txtNmLengkap"] = $txtNmLengkap;
$_SESSION["txtT4Lhr"] = $txtT4Lhr;
$_SESSION["txtTglLhr"] = $txtTglLhr;
$_SESSION["txtHobi"] = $txtHobi;
$_SESSION["txtPasangan"] = $txtPasangan;
$_SESSION["txtKerja"] = $txtKerja;
$_SESSION["txtNmOrtu"] = $txtNmOrtu;
$_SESSION["txtNmKakak"] = $txtNmKakak;
$_SESSION["txtNmAdik"] = $txtNmAdik;
header("location: index.php");
?>
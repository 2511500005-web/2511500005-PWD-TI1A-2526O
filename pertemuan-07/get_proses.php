<?php
sessiom_start();
$_SESSION["Nama"] = $_GET['txtNama'];
$_SESSION["Email"] = $_GET['txtEmail'];
$_SESSION["Pesan"] = $_GET['txtPesan'];
Header ("Location: get.php");
?>
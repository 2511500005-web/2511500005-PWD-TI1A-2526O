<?php
session_start();
$_SESSION["Nama"] = $_POST['txtNama'];
$_SESSION["Email"] = $_POST['txtEmail'];
$_SESSION["Pesan"] = $_POST['txtPesan'];
Header ("Location: post.php");
?>
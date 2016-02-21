<?php
defined('gis') or die('Tidak Boleh akses Langsung');

$id = $_SESSION['id_user'];

$sql = "update pengguna set status=0 where id_user = '$id'";
$qry = mysql_query($sql);

unset($_SESSION['id_user']);
unset($_SESSION['email_user']);
unset($_SESSION['pass_user']);
unset($_SESSION['nama_user']);


echo "<script>document.location.href='landing.php';</script>";
 
?>
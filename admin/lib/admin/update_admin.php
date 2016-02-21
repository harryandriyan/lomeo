<?php

	defined('gis') or die('Tidak Boleh akses Langsung');


$id = $_POST['id']; 
$unm = $_POST['uname'];
$pass = $_POST['pass'];
$password = md5($pass);

		$sql = "UPDATE admin set id_admin = '$id', uname = '$unm', pass = '$password' where id_admin = '$id'";

$qry = mysql_query($sql);

if ($qry) {
	echo "<script>alert('Data Anda berhasil diupdate Min ');</script>";
	echo "<script>document.location.href='index.php?view=default';</script>";
}
else {
	echo "<script>alert('Gagal update Data Admin');</script>";
	echo "<script>document.location.href='index.php?view=admin';</script>";
}

?>
<?php


	defined('gis') or die('Tidak Boleh akses Langsung');


$id = $_GET['id'];

$sql = "delete from provinsi where id_prov = '$id'";
$qry = mysql_query($sql);

if ($qry) {
	echo "<script>alert('data provinsi telah terhapus :)');</script>";
	echo "<script>document.location.href='index.php?view=provinsi';</script>";
}

else {
	echo "<script>alert('gagal menghapus data Provinsi :(');</script>";
	echo "<script>document.location.href='index.php?view=provinsi';</script>";
}

?>
<?php

	defined('gis') or die('Tidak Boleh akses Langsung');

$id = $_GET['id'];

$sql = "delete from jen_wis where id_jen_wis = '$id'";
$qry = mysql_query($sql);

if ($qry) {
	echo "<script>alert('data telah terhapus :)');</script>";
	echo "<script>document.location.href='index.php?view=kategori&hal=1';</script>";
}

else {
	echo "<script>alert('gagal menghapus data :(');</script>";
	echo "<script>document.location.href='index.php?view=kategori&hal=1';</script>";
}

?>
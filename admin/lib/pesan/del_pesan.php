<?php

	defined('gis') or die('Tidak Boleh akses Langsung');

$id = $_GET['id'];

$sql = "delete from kontak where id_kontak = '$id'";
$qry = mysql_query($sql);

if ($qry) {
	echo "<script>alert('data telah terhapus :)');</script>";
	echo "<script>document.location.href='index.php?view=kontak&hal=1';</script>";
}

else {
	echo "<script>alert('gagal menghapus data :(');</script>";
	echo "<script>document.location.href='index.php?view=kontak&hal=1';</script>";
}

?>
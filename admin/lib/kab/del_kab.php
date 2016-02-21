<?php

	defined('gis') or die('Tidak Boleh akses Langsung');

$id = $_GET['id'];

$sql = "delete from kabupaten where id_kab = '$id'";
$qry = mysql_query($sql);

if ($qry) {
	echo "<script>alert('data Kabuppaten telah terhapus');</script>";
	echo "<script>document.location.href='index.php?view=kabupaten&hal=1';</script>";
}

else {
	echo "<script>alert('gagal menghapus data kabupaten');</script>";
	echo "<script>document.location.href='index.php?view=kabupaten&hal=1';</script>";
}

?>
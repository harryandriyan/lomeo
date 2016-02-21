<?php

	defined('gis') or die('Tidak Boleh akses Langsung');

$id = $_GET['id'];

$sql = "delete from wisata where id_pw = '$id'";
$qry = mysql_query($sql);

if ($qry) {
	echo "<script>alert('data Pariwisata telah terhapus :)');</script>";
	echo "<script>document.location.href='index.php?view=pariwisata';</script>";
}

else {
	echo "<script>alert('gagal menghapus data :(');</script>";
	echo "<script>document.location.href='index.php?view=pariwisata';</script>";
}

?>
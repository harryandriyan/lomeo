<?php


	defined('gis') or die('Tidak Boleh akses Langsung');


$id = $_GET['id'];

$sql = "delete from komentar where id_komen = '$id'";
$qry = mysql_query($sql);

if ($qry) {
	echo "<script>alert('data komentar telah terhapus :)');</script>";
	echo "<script>document.location.href='index.php?view=komentar&hal=1';</script>";
}

else {
	echo "<script>alert('gagal menghapus data komentar :(');</script>";
	echo "<script>document.location.href='index.php?view=kometar&hal=1';</script>";
}

?>
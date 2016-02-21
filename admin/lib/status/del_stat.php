<?php


	defined('gis') or die('Tidak Boleh akses Langsung');


$id = $_GET['id'];

$sql = "delete from status where id_status = '$id'";
$qry = mysql_query($sql);

if ($qry) {
	echo "<script>alert('data status telah terhapus :)');</script>";
	echo "<script>document.location.href='index.php?view=status&hal=1';</script>";
}

else {
	echo "<script>alert('gagal menghapus data status :(');</script>";
	echo "<script>document.location.href='index.php?view=status&hal=1';</script>";
}

?>
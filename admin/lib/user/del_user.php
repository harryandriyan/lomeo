<?php
	defined('gis') or die('Tidak Boleh akses Langsung');

$id = $_GET['id'];

$sql = "delete from pengguna where id_user = '$id'";
$qry = mysql_query($sql);

if ($qry) {
	echo "<script>alert('data telah terhapus :)');</script>";
	echo "<script>document.location.href='index.php?view=user&hal=1';</script>";
}

else {
	echo "<script>alert('gagal menghapus data :(');</script>";
	echo "<script>document.location.href='index.php?view=user&hal=1';</script>";
}

?>
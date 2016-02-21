<?php


	defined('gis') or die('Tidak Boleh akses Langsung');


$id = $_POST['id']; 
$id_prov = $_POST['prov'];
$kab = $_POST['kab'];
$lat = $_POST['lat'];
$lang = $_POST['lang'];

$sql = "UPDATE kabupaten set id_kab = '$id', id_prov = '$id_prov', kabupaten = '$kab', lat = '$lat', lang = '$lang' where id_kab = '$id'";
$qry = mysql_query($sql);

if ($qry) {
	echo "<script>alert('Data kabupaten telah diupdate ');</script>";
	echo "<script>document.location.href='index.php?view=kabupaten&hal=1';</script>";
}
else {
	echo "<script>alert('Gagal update data kabupaten');</script>";
	echo "<script>document.location.href='index.php?view=kabupaten&hal=1';</script>";
}

?>
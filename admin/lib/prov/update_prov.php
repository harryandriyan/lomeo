<?php


	defined('gis') or die('Tidak Boleh akses Langsung');

$id = $_POST['id']; 
$prov = $_POST['prov'];
$kota = $_POST['kota'];
$lat = $_POST['lat'];
$lang = $_POST['lang'];

$sql = "UPDATE provinsi set id_prov = '$id', provinsi = '$prov', kota = '$kota', lat = '$lat', lang = '$lang' where id_prov = '$id'";
$qry = mysql_query($sql);

if ($qry) {
	echo "<script>alert('Data provinsi telah diupdate ');</script>";
	echo "<script>document.location.href='index.php?view=provinsi&hal=1';</script>";
}
else {
	echo "<script>alert('Gagal update Data');</script>";
	echo "<script>document.location.href='index.php?view=provinsi&hal=1';</script>";
}

?>
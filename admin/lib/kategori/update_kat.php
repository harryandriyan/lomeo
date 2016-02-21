<?php

	defined('gis') or die('Tidak Boleh akses Langsung');

$id = $_POST['id'];
$kat = $_POST['kat'];
$ket = $_POST['ket'];	
$icon = $_POST['icon'];

	$sql = "update jen_wis set id_jen_wis = '$id', jenis = '$kat', icon = '$icon', 
	keterangan = '$ket' where id_jen_wis = '$id'";
	$qry = mysql_query($sql);

	
		if ($qry) {
			echo "<script>alert('Data Kategori berhasil Di Update');</script>";
			echo "<script>document.location.href='index.php?view=kategori&hal=1';</script>";
		}
		else {
			echo "<script>alert('Gagal Update Data ');</script>";
			echo "<script>document.location.href='index.php?view=kategori&hal=1';</script>";
		}
	
?>
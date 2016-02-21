<?php

	defined('gis') or die('Tidak Boleh akses Langsung');

$kat = $_POST['kat'];
$ket = $_POST['ket'];
$icon = $_POST['icon'];

	$sql = "insert into jen_wis values ('','$kat', '$icon','$ket')";
	$qry = mysql_query($sql);

	
		if ($qry) {
			echo "<script>alert('Data  berhasil Di Masukkan');</script>";
			echo "<script>document.location.href='index.php?view=kategori';</script>";
		}
		else {
			echo "<script>alert('Gagal input Data ');</script>";
			echo "<script>document.location.href='index.php?view=add_kat';</script>";
		}


		


?>
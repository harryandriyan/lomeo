<?php


	defined('gis') or die('Tidak Boleh akses Langsung');


$prov = $_POST['prov'];
$kota = $_POST['kota'];
$lat = $_POST['lat'];
$lang = $_POST['lang'];

		$sql = "insert into provinsi values ('', '$prov', '$kota', '$lat', '$lang')";

		$qry = mysql_query($sql);

		if ($qry) {
			echo "<script>alert('Data Provinsi berhasil Di Masukkan');</script>";
			echo "<script>document.location.href='index.php?view=provinsi&hal=1';</script>";
		}
		else {
			echo "<script>alert('Gagal input Data Provinsi');</script>";
			echo "<script>document.location.href='index.php?view=add_prov&hal=1';</script>";
		}


?>
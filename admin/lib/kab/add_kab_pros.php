<?php
	defined('gis') or die('Tidak Boleh akses Langsung');


$prov = $_POST['prov'];
$kab = $_POST['kab'];
$lat = $_POST['lat'];
$lang = $_POST['lang'];

		$sql = "insert into kabupaten values ('', '$prov', '$kab', '$lat', '$lang')";

		$qry = mysql_query($sql);

		if ($qry) {
			echo "<script>document.location.href='index.php?view=add_kab';</script>";
		}
		else {
			echo "<script>alert('Gagal input Data kabupaten');</script>";
			echo "<script>document.location.href='index.php?view=add_kab';</script>";
		}


?>
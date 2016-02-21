<?php

	defined('gis') or die('Tidak Boleh akses Langsung');

$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$lat = $_POST['lat'];
$lang = $_POST['lang'];
$alamat = $_POST['alamat'];
$des = $_POST['deskripsi'];
$kab = $_POST['kab'];
$prov = $_POST['prov'];

$foto_nama = ($_FILES['foto']['name']);
$foto = ($_FILES['foto']['tmp_name']);
$folder = "file/gambar/wisata/";
$folder = $folder . basename( $_FILES['foto']['name']);

$stat = $_POST['stat'];

	$sql = "insert into wisata values ('','$nama', '$jenis', '$alamat', '$des', '$lat', '$lang','$prov', 
		'$kab', '$foto_nama','$stat')";
	$qry = mysql_query($sql);

	if(move_uploaded_file($foto, $folder)) {
		if ($qry) {
			echo "<script>alert('Data Objek Wisata berhasil Di Masukkan');</script>";
			echo "<script>document.location.href='index.php?view=pariwisata&hal=1';</script>";
		}
		else {
			echo "<script>alert('Gagal input Data Objek Wisata');</script>";
			echo "<script>document.location.href='index.php?view=add_wisata&hal=1';</script>";
		}
	}	

		


?>
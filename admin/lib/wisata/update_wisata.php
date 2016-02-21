<?php

	defined('gis') or die('Tidak Boleh akses Langsung');

$id = $_POST['id'];
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$lat = $_POST['lat'];
$lang = $_POST['lang'];
$alamat = $_POST['alamat'];
$des = $_POST['deskripsi'];
$kab = $_POST['kab'];
$prov = $_POST['prov'];
$photo = $_POST['photo'];

$foto_nama = ($_FILES['foto']['name']);
$foto = ($_FILES['foto']['tmp_name']);
$folder = "file/gambar/wisata/";
$folder = $folder . basename( $_FILES['foto']['name']);


$stat = $_POST['stat'];
	
	

	if (empty($nama) || empty($jenis) || empty($prov) || empty($alamat)){
		echo "<script>alert('Semua harus diisi');</script>";
		echo "<script>document.location.href='index.php?view=pariwisata&hal=1';</script>";

	}
	elseif (empty($foto) || empty($foto_nama)) {
		$sql = "update wisata set id_pw = '$id', nama = '$nama', id_jenis = '$jenis', alamat = '$alamat',
					deskripsi = '$des', lat = '$lat', lang = '$lang', prov = '$prov', id_kab = '$kab', foto = '$photo', 
					stat = '$stat' where id_pw = '$id' ";
		$qry = mysql_query($sql);
		
			if ($qry) {
				echo "<script>alert('Data Objek Pariwisata berhasil Di Update');</script>";
				echo "<script>document.location.href='index.php?view=pariwisata&hal=1';</script>";
			}
			else {
				echo "<script>alert('Gagal Update Data Objek Pariwisata');</script>";
				echo "<script>document.location.href='index.php?view=pariwisata&hal=1';</script>";
			}
		
	}
	 else {
		$sql = "update wisata set id_pw = '$id', nama = '$nama', id_jenis = '$jenis', alamat = '$alamat',
					deskripsi = '$des', lat = '$lat', lang = '$lang', prov = '$prov', id_kab = '$kab', foto = '$foto_nama', 
					stat = '$stat' where id_pw = '$id' ";
		$qry = mysql_query($sql);
		if(move_uploaded_file($foto, $folder)) {
			if ($qry) {
				echo "<script>alert('Data Objek Pariwisata berhasil Di Update');</script>";
				echo "<script>document.location.href='index.php?view=pariwisata&hal=1';</script>";
			}
			else {
				echo "<script>alert('Gagal Update Data Objek Pariwisata');</script>";
				echo "<script>document.location.href='index.php?view=pariwisata&hal=1';</script>";
			}
		}	
	}
?>
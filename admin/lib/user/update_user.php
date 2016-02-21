<?php

	defined('gis') or die('Tidak Boleh akses Langsung');

$id = $_POST['id']; 
$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['pass'];
$prov = $_POST['prov'];
$alamat = $_POST['alamat'];
$tentang = $_POST['tentang'];
$kel = $_POST['kel'];
$status = 1;

$foto_nama = ($_FILES['foto']['name']);
$foto = ($_FILES['foto']['tmp_name']);
$folder = "file/gambar/user/$email";
$folder = $folder."/".basename($_FILES['foto']['name']);

		$sql = "UPDATE pengguna set id_user = '$id', email = '$email', nama = '$nama', prov = '$prov', alamat = '$alamat',
		tentang = '$tentang', pass = '$password', kelamin = '$kel', foto = '$foto_nama', status = '$status', tanggal = '$tanggal' 
		where id_user = '$id'";

		if(move_uploaded_file($foto, $folder)) {
			$qry = mysql_query($sql);

			if ($qry) {
				echo "<script>alert('Data user berhasil diupdate');</script>";
				echo "<script>document.location.href='index.php?view=user&hal=1';</script>";
			}
			else {
				echo "<script>alert('Gagal update Data User');</script>";
				echo "<script>document.location.href='index.php?view=user&hal=1';</script>";
			}
		}
?>
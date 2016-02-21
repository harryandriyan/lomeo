<?php

	defined('gis') or die('Tidak Boleh akses Langsung');


$id = (int) $_POST['id']; 
$nama = addslashes(strip_tags ($_POST['nama']));
$kel = addslashes(strip_tags ($_POST['kel']));
$email = addslashes(strip_tags ($_POST['email']));
$prov = addslashes(strip_tags ($_POST['prov']));
$alm = addslashes(strip_tags ($_POST['alamat']));
$tnt = addslashes(strip_tags ($_POST['tentang']));
$uname = $_SESSION['email_user'];

$foto_nama = ($_FILES['foto']['name']);
$foto = ($_FILES['foto']['tmp_name']);
$folder = "admin/file/gambar/user/$uname";
$folder = $folder."/".basename($_FILES['foto']['name']);

$status = 1;
	if (empty($nama) || empty($kel) || empty($email) || empty($prov) || empty($alm) || empty($tnt)) {
		echo "<script>alert('Semua harus diisi');</script>";
		echo "<script>document.location.href='index.php?view=user';</script>";

	}
	elseif(trim($nama)== "&nbsp;") {
		echo "<script>alert('Semua harus diisi');</script>";
		echo "<script>document.location.href='index.php?view=user';</script>";
	}
	elseif(empty($foto) || empty($foto_nama)) {
		$sql = "update pengguna set id_user = '$id', nama = '$nama', email = '$email', prov = '$prov', 
		alamat = '$alm', tentang = '$tnt', kelamin = '$kel', foto = '$_POST[poto]', tanggal = '$tanggal', 
		status='$status' where id_user = '$id'";
		$qry = mysql_query($sql);

		if ($qry) {
			echo "<script>alert('Data Anda berhasil diupdate');</script>";
			echo "<script>document.location.href='index.php?view=user';</script>";
			}
			else {
				echo "<script>alert('Gagal update Data');</script>";
				echo "<script>document.location.href='index.php?view=edit_user';</script>";
			}
	}
	else {
		$sql = "update pengguna set id_user = '$id', nama = '$nama', email = '$email', prov = '$prov', 
		alamat = '$alm', tentang = '$tnt', kelamin = '$kel',foto = '$foto_nama', tanggal = '$tanggal', 
		status='$status' where id_user = '$id'";
		$qry = mysql_query($sql);

		
		if(move_uploaded_file($foto, $folder)) {

			if ($qry) {
			echo "<script>alert('Data Anda berhasil diupdate dan foto profil berhasil diganti');</script>";
			echo "<script>document.location.href='index.php?view=user';</script>";
			}
			else {
				echo "<script>alert('Gagal update Data');</script>";
				echo "<script>document.location.href='index.php?view=edit_user';</script>";
			}
		}
	}
?>
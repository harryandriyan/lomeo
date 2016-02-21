<?php

defined('gis') or die('Tidak Boleh akses Langsung'); 

$nama = addslashes(strip_tags ($_POST['nama']));
$email = addslashes(strip_tags ($_POST['email']));
$pesan = htmlentities ($_POST['pesan']);
$code = (int) $_POST['code'];
$rcode = (int) $_POST['rcode'];


$status = 1;

if($code != $rcode) {
	echo "<script>alert('Kode keamanan salah ');</script>";
	echo "<script>document.location.href='index.php?view=kontak';</script>";
	
}
elseif ($nama == "" || $email == "" || $pesan == ""){
	echo "<script>alert('Semua harus diisi ');</script>";
	echo "<script>document.location.href='index.php?view=kontak';</script>";
}
else {

$qry = "insert into kontak values ('','$nama','$email', '$pesan', '$tanggal', '$status')";
$ok = mysql_query($qry, $konek);
	
	if ($ok) {
		echo "<script>alert('Terimakasih, Pesan telah terkirim');</script>";
		echo "<script>document.location.href='index.php?view=default';</script>";

	}
	else {
		echo "<script>alert('Gagal mengirim pesan');</script>";
		echo "<script>document.location.href='index.php?view=kontak';</script>";
		echo $tanggal;
	}
	
}

?>
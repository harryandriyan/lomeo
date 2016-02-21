<?php


	defined('gis') or die('Tidak Boleh akses Langsung');


$id = $_POST['id']; 
$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];
$status = $_POST['status'];

$sql = "UPDATE kontak set nama = '$nama', email = '$email', pesan = '$pesan', status = '$status' where id_kontak = '$id'";
$qry = mysql_query($sql);

if ($qry) {
	echo "<script>alert('Pesan telah diupdate ');</script>";
	echo "<script>document.location.href='index.php?view=kontak&hal=1';</script>";
}
else {
	echo "<script>alert('Gagal update pesan');</script>";
	echo "<script>document.location.href='index.php?view=kontak&hal=1';</script>";
}

?>
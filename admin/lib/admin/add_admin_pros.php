<?php


	defined('gis') or die('Tidak Boleh akses Langsung');


$uname = $_POST['uname'];
$pass = $_POST['pass'];
$repass = $_POST['repass'];

if ($pass !== $repass) {
	echo "<script>alert('Password tidak cocok Min');</script>";
	echo "<script>document.location.href='index.php?view=add_admin';</script>";
}
else {
		$password = md5($pass);

		$sql = "insert into admin values ('', '$uname', '$password')";

		$qry = mysql_query($sql);

		if ($qry) {
			echo "<script>alert('Data Admin berhasil Di Masukkan');</script>";
			echo "<script>document.location.href='index.php?view=default';</script>";
		}
		else {
			echo "<script>alert('Gagal input Data Admin');</script>";
			echo "<script>document.location.href='index.php?view=add_admin';</script>";
		}

}
?>
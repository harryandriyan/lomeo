<?php
session_start();
$file1 = "config/connect.php";
$file2 = "../../config/connect.php";

if(file_exists($file1)) {
	require_once $file1;
} else {
	require_once $file2;
}

$status = addslashes(strip_tags ($_POST['status']));
$user = (int) $_SESSION['id_user'];
$kab = addslashes(strip_tags ($_POST['kab']));
		if(empty($status) || empty($kab)) {
			echo "<script>alert('Gagal update Status');</script>";
			echo "<script>document.location.href='index.php?view=home';</script>";

		}
		elseif(trim($status)=="&nbsp;") {
			
			exit;
			
		}
		else {
			$sql = "insert into status values ('','$status','$user','$kab','$tanggal')";
			$qry = mysql_query($sql);

			if ($qry) {
			echo "<script>document.location.href='index.php?view=home';</script>";
			}
			else {
				echo "<script>alert('Gagal update Data');</script>";
				echo "<script>document.location.href='index.php?view=user';</script>";
			}
		}
		
?>
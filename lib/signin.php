<?php
session_start();


include "../config/connect.php";

$email = addslashes(strip_tags($_POST['email']));
$pass = md5($_POST['pass']);

$sql = "select * from pengguna where email = '$email'";
$qry = mysql_query($sql);
$data = mysql_fetch_array($qry);

		if ($pass == $data['pass'])
		{
		    $sql = "update pengguna set status=1 where email='$email' and pass='$pass'";
			$qry=mysql_query($sql);

			$_SESSION['id_user'] = $data['id_user'];
			$_SESSION['email_user'] = $data['email'];
    		$_SESSION['pass_user'] = $data['pass'];
    		$_SESSION['nama_user'] = $data['nama'];

    		echo "<script>document.location.href='../index.php';</script>"; 


		}

		else {
			echo "<script>alert('Ooopss, maaf, Login tidak berhasil');</script>";
			echo "<script>document.location.href='../landing.php';</script>";
		}


?>
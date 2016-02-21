<?php
session_start();

include "../../config/connect.php";

$uname = addslashes(strip_tags($_POST['uname']));
$pass = md5($_POST['pass']);

$sql = "select * from admin where uname = '$uname'";
$qry = mysql_query($sql);
$data = mysql_fetch_array($qry);

		if ($pass == $data['pass'])
		{
		    echo "<script>alert('Selamat Datang Admin');</script>";
			echo "<script>document.location.href='../index.php';</script>"; 

			$_SESSION['id_admin'] = $data['id_admin'];
			$_SESSION['uname_admin'] = $data['uname'];
    		$_SESSION['pass_admin'] = $data['pass'];
    		
		}

		else {
			echo "<script>alert('gagal login');</script>";
			echo "<script>document.location.href='../landing.php';</script>";
		}


?>
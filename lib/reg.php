<?php
include "../config/connect.php";

		$email = addslashes(strip_tags ($_POST['email']));
		$nama = addslashes(strip_tags ($_POST['nama']));
		$pass = addslashes(strip_tags ($_POST['pass']));
		$rpass = addslashes(strip_tags ($_POST['repass']));
		$kel = addslashes(strip_tags ($_POST['kel']));

		$stat=1;
		$code = (int) $_POST['code'];
		$rcode = (int) $_POST['rcode'];
			
		if ($pass != $rpass) {
			echo "<script>alert('Password tidak cocok, ulangi lagi');</script>";
			echo "<script>document.location.href='../landing.php';</script>";
		}

		elseif ($code != $rcode) {
			echo "<script>alert('Kode tidak cocok, ulangi lagi');</script>";
			echo "<script>document.location.href='../landing.php';</script>";
		}
		elseif ($nama == "" || $email == "" || $pass == "") {
			echo "<script>alert('Semua Field harus diisi');</script>";
			echo "<script>document.location.href='../landing.php';</script>";
		}

			
		else {
			$pass = md5($pass);
			
					
			$qry = mysql_query("insert into pengguna values 
				('','$email', '$nama', '1', 'alamat', 'tentang', '$pass', '$kel','def.png', '$tanggal', '$stat')");

			if ($qry) {
				$folder = mkdir("../admin/file/gambar/user/$email");
				
				$awal = "require_img/def.png";
				$letak = "../admin/file/gambar/user/$email/def.png";
				$gmb = copy($awal, $letak);
				
				echo "<script>alert('Selamat anda telah terdaftar, silakan Login Untuk melanjutkan akses');</script>";
				echo "<script>document.location.href='../landing.php';</script>";
			}
			else {
				echo "<script>alert('Regitrasi Gagal, coba ulangi lagi');</script>";
				echo "<script>document.location.href='../landing.php';</script>";
			}
		}

?>
<?php

$server = 'localhost';
$user = 'root';
$pass = '123';
$dbname = 'dblomeo';
$tanggal = date("d-m-Y H:i:s");
$konek = mysql_connect($server, $user, $pass);

if(!$konek) {
	echo "Gagal konek".mysql_error();
}

mysql_select_db($dbname);


?>
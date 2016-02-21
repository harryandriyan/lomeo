<?php
session_start();
$file1 = "config/connect.php";
$file2 = "../../config/connect.php";

if(file_exists($file1)) {
	require_once $file1;
} else {
	require_once $file2;
}

$tgl = date("d-m-Y");
$pesan = addslashes(strip_tags ($_POST['text']));

if(trim($pesan)=="" || trim($pesan)=="&nbsp;") {
	exit();
}
else {
$sql = mysql_query("insert into chat (id_user, pesan, tanggal) values ('$_SESSION[id_user]','$pesan','$tgl')");
echo $sql;
}
?>
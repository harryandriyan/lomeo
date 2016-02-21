<?php
session_start();
$file1 = "config/connect.php";
$file2 = "../../config/connect.php";

if(file_exists($file1)) {
	require_once $file1;
} else {
	require_once $file2;
}

$ulasan = addslashes(strip_tags($_POST['ul']));
$pw = (int) $_POST['wisata'];

if(trim($ulasan)=="" || trim($ulasan)=="&nbsp;") {
	exit();
}
else {
$sql = mysql_query("insert into komentar (id_pw, id_user, komentar, tanggal) values ('$pw', '$_SESSION[id_user]','$ulasan','$tanggal')");

}
?>
<?php

$file1 = "config/connect.php";
$file2 = "../../config/connect.php";

if(file_exists($file1)) {
	require_once $file1;
} else {
	require_once $file2;
}

$tgl = date ("d-m-Y");

$c_sql = "select chat.id_chat, chat.id_user, chat.pesan, chat.tanggal, pengguna.id_user, pengguna.nama, pengguna.email, pengguna.foto from chat, pengguna 
where chat.id_user = pengguna.id_user and chat.tanggal = '$tgl' order by chat.id_chat desc";
$c_qry = mysql_query($c_sql);
while ($chat=mysql_fetch_array($c_qry)) :
?>

<div class="pesan">
<a href="index.php?view=view_user&id=<?php echo $chat['id_user']; ?>" title="<?php echo $chat['nama']; ?>">
<img class="img-circle" src="admin/file/gambar/user/<?php echo $chat['email']; ?>/<?php echo $chat['foto']; ?>"
 width="40" height="40" />
</a>

   : 
<?php echo $chat['pesan']; ?>

</div>

<?php endwhile; ?>
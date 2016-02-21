<?php

$id = (int) abs($_GET['id']);

	$sql = "delete from status where id_status = '$id' and id_user = '$_SESSION[id_user]'";
	$qry = mysql_query($sql);

	if ($qry) {
		echo "<script>document.location.href='index.php?view=status';</script>";
	}

	else {
		echo "<script>alert('Status gagal dihapus :( ');</script>";
		echo "<script>document.location.href='index.php?view=status';</script>";
	}

?>
 <?php

 	$file1 = "config/connect.php";
	$file2 = "../../config/connect.php";

	if(file_exists($file1)) {
		require_once $file1;
	} else {
		require_once $file2;
	}

	$komen_sql = "select komentar.id_komen, komentar.id_pw, komentar.id_user,
	komentar.komentar, komentar.tanggal, pengguna.id_user, pengguna.nama as namauser, pengguna.foto, pengguna.email,
	wisata.id_pw, wisata.nama from komentar, pengguna, wisata where komentar.id_pw = wisata.id_pw 
	and komentar.id_user = pengguna.id_user and komentar.id_pw = '$_GET[id_obj]' order by id_komen desc limit 15";
	$komen_qry = mysql_query($komen_sql);

	while ($komen_data = mysql_fetch_array($komen_qry)) :

	?>
	<?php $foto = $komen_data['foto']; ?>
	<?php $i_email = $komen_data['email']; ?>	
	<div class="media">
	  <a class="pull-left" href="#">
	    <img class="img-rounded" src="admin/file/gambar/user/<?php echo $i_email; ?>/<?php echo $foto; ?>"
	     alt="<?php echo $komen_data['namauser']; ?>" width="60" height="60" />
	  </a>
	  <div class="media-body">
	    <a href="index.php?view=view_user&id=<?php echo $komen_data['id_user']; ?>">
	    <h5 class="media-heading"><?php echo $komen_data['namauser']; ?></h5>
	    </a>
	    <?php echo $komen_data['komentar']; ?><br>
	    <font style="font-size: 12px;">Pada : <?php echo $komen_data['tanggal']; ?></font>
	  </div>
	</div>

			
	<?php endwhile; ?>					 

							
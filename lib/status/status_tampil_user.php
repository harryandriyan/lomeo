<?php

session_start();
$file1 = "config/connect.php";
$file2 = "../../config/connect.php";

if(file_exists($file1)) {
	require_once $file1;
} else {
	require_once $file2;
} 

$id_user = $_SESSION['id_user'];

$stu_sql = "select status.id_status, status.status, status.id_user, status.id_kab, status.tanggal,
		kabupaten.id_kab, kabupaten.kabupaten, kabupaten.id_prov, pengguna.id_user, pengguna.nama, pengguna.email, 
		pengguna.foto, provinsi.id_prov, provinsi.provinsi as prov from status, kabupaten, provinsi,
		pengguna where status.id_user = pengguna.id_user and status.id_kab = kabupaten.id_kab
		and kabupaten.id_prov = provinsi.id_prov and status.id_user = '$id_user' 
		order by status.id_status desc limit 7";
$stu_qry = mysql_query($stu_sql);
while($status=mysql_fetch_array($stu_qry)) :
?>


	<div class="media">
	  <a class="pull-left" href="#">
	    <img class="media-object" src="admin/file/gambar/user/<?php echo $status['email']; ?>/<?php echo $status['foto']; ?>" 
	    alt="<?php echo $status['nama']; ?>" width="64" height="64" />
	  </a>

	  <?php 
	  if($status['id_user'] == $_SESSION['id_user']) :
	  ?>

	  <a href="index.php?view=del_status&id=<?php echo $status['id_status']; ?>" class="pull-right" title="Hapus Status"
	   onclick="return confirm('Hai <?php echo $status["nama"]; ?>, apakah anda yakin akan menghapus status ini ?');">
	  <i class="glyphicon glyphicon-remove" style="font-size: 16px;"></i></a>

	<?php endif; ?>
	  
	  <div class="media-body">
	    <h4 class="media-heading">
	    <a href="#" role="button" data-toggle="modal" data-target="#myModal">
	    <?php echo $status['nama']; ?></a>
	    </h4>
	    <?php echo $status['status']; ?><br>
	    <font style="font-size: 12px;">di <a href="index.php?view=wisata_pilih&id=<?php echo $status['id_kab']; ?>">
	    &nbsp;<i class="glyphicon glyphicon-map-marker"></i> <?php echo $status['kabupaten']; ?>, <?php echo $status['prov']; ?></a> 
	    &nbsp;<i class="fa fa-clock-o fa-fw"></i> 
	    	<?php

			$lalu =  strtotime($status['tanggal']);

			$now = strtotime(date('d-m-Y H:i:s'));

			$stat_wkt = $now - $lalu;

			$waktuku =  round($stat_wkt / 60, 1); //dadi menit
			if ($waktuku<60) {
			echo $waktuku;
			echo "&nbsp;";
			echo "menit yang lalu";
			}

			elseif ($waktuku>=60) {
			echo round($waktuku / 60, 1); //dadi jam
			echo "&nbsp;";
			echo "jam yang lalu";	
			}

			elseif ($waktuku / 60 >=24) {
			echo round($waktuku / 24, 1);
			echo "&nbsp;";
			echo "hari yang lalu";	
			}

			else {
			echo "beberapa hari yang lalu";		
			}
			

			?>


	    </font>
	  </div>
	</div>
	<hr>
<?php endwhile; ?>






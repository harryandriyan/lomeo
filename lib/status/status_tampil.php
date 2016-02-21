<?php 
session_start();
$file1 = "config/connect.php";
$file2 = "../../config/connect.php";

if(file_exists($file1)) {
	require_once $file1;
} else {
	require_once $file2;
}

$st_sql = "select status.id_status, status.status, status.id_user, status.id_kab, status.tanggal,
		kabupaten.id_kab, kabupaten.id_prov, kabupaten.kabupaten, pengguna.id_user as iduser, pengguna.nama, pengguna.email, 
		pengguna.foto, provinsi.id_prov, provinsi.provinsi as prov from status, kabupaten, provinsi,
		pengguna where status.id_user = pengguna.id_user and status.id_kab = kabupaten.id_kab 
		and kabupaten.id_prov = provinsi.id_prov
		order by status.id_status desc limit 20";
$st_qry = mysql_query($st_sql);
while($status=mysql_fetch_array($st_qry)) :
?>


	<div class="media">
	  <a class="pull-left" href="index.php?view=view_user&id=<?php echo $status['id_user'] ;?>"
	   id="user" title="<?php echo $status['nama']; ?>, <?php echo $status['kabupaten']; ?>, <?php echo $status['prov']; ?>"
	    data-toggle="modal">
	    <img class="media-object" src="admin/file/gambar/user/<?php echo $status['email']; ?>/<?php echo $status['foto']; ?>" 
	    alt="<?php echo $status['nama']; ?>" width="72" height="72" />
	  </a>
	  		<!-- Untuk hapus -->
			  <?php 
			  if($status['id_user'] == $_SESSION['id_user']) :
			  ?>
				
			  <a href="index.php?view=del_status&id=<?php echo $status['id_status']; ?>" id="delstat" class="pull-right" title="Hapus Status"
			   onclick="return confirm('Hai <?php echo $status["nama"]; ?>, apakah anda yakin akan menghapus status ini ?');">
			  <i class="glyphicon glyphicon-remove" style="font-size: 16px;"></i></a>
			  		  	

			<?php endif; ?>
			<!-- Untuk hapus -->

	  <div class="media-body">
	    <h4 class="media-heading">
	    <a href="index.php?view=view_user&id=<?php echo $status['id_user'] ;?>"
	     id="user" title="<?php echo $status['nama']; ?>, <?php echo $status['kabupaten']; ?>, <?php echo $status['prov']; ?>"
	     data-toggle="modal">
	    <?php echo $status['nama']; ?>
	    </a>
	    </h4>
	    <?php echo $status['status']; ?><br>
	    <font style="font-size: 12px;">di 
	    <a href="index.php?view=wisata_pilih&id=<?php echo $status['id_kab']; ?>" id="user" title="<?php echo $status['kabupaten']; ?>, <?php echo $status['prov']; ?>">
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

			elseif ($waktuku >= 60) {
			echo round($waktuku / 60, 1); //dadi jam
			echo "&nbsp;";
			echo "jam yang lalu";	
			}

			elseif ($waktuku >= 1440) {
			echo round($waktuku / 1440, 1);
			echo "&nbsp;";
			echo "hari yang lalu";	
			}

			else {
				
			echo floor($waktuku/10080) . " minggu yang lalu";		
			}
			

			?>


	    </font>

	  </div>
	</div>
	
	<hr>

<?php endwhile; ?>




<?php defined('gis') or die('Tidak Boleh akses Langsung'); 

$id =$_GET['id'];
$idusr = $_SESSION['id_user'];
if($id == $idusr) {
	echo "<script>document.location.href='index.php?view=user';</script>";
}

else {

?>

<div id="wrap">
		    			
		<div id="side">
		<?php include_once 'inc/side/side_user.php';?>
		</div>
			
		<div id="data">
		<?php include_once "lib/search/search_form.php"; ?>
		<hr>
    			<?php

					$idusr = $_GET['id'];

					$lhtuser_sql = "select pengguna.id_user, pengguna.nama, pengguna.email, pengguna.prov, pengguna.alamat, pengguna.tentang, pengguna.kelamin,
							pengguna.foto, provinsi.id_prov, provinsi.provinsi as prop, provinsi.kota as kota from pengguna, provinsi 
							where pengguna.prov = provinsi.id_prov and pengguna.id_user = '$idusr'";
					$lhtuser_qry = mysql_query($lhtuser_sql);
					$lhtuser = mysql_fetch_array($lhtuser_qry);
					?>

					<div class="media" style="border: 1px solid #ddd; border-radius: 5px; padding: 15px;">
						  <a class="pull-left" href="#foto" data-toggle="modal">
						    <img class="media-object" style="border-radius: 10%; box-shadow: 1px 1px 2px #ccc;" 
						    src="admin/file/gambar/user/<?php echo $lhtuser['email']; ?>/<?php echo $lhtuser['foto']; ?>" 
						    alt="<?php echo $lhtuser['nama']; ?>" width="200" height="200" />
						  </a>
						  <div class="media-body">
						    <h4 class="media-heading">
						    <a href="#"><h3><?php echo $lhtuser['nama']; ?></h3></a>
						    </h4>
						    <?php echo $lhtuser['tentang']; ?><br>
						    <font style="font-size: 12px;"> Alamat saya <a href="#"><?php echo $lhtuser['alamat']; ?></a></font>
							<p></p>
							<p><?php echo $lhtuser['kota']; ?>, <?php echo $lhtuser['prop']; ?></p>	    
						  </div>
						</div>


				<div class="modal fade" id="foto" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<center><p><h4>Foto Profil <?php echo $lhtuser ['nama']; ?></h4></p></center>
							</div>
							<div class="modal-body">
								<img src="admin/file/gambar/user/<?php echo $lhtuser['email']; ?>/<?php echo $lhtuser['foto']; ?>"
								style="width: 100%; height: 100%;" />
								<div class="modal-footer">
								<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
							</div>
							</div>
						</div>
					</div> 
				</div>

				<script src="style/js/bootstrap.js"></script>

    			<hr>
    			
    			
    			<h4>Semua Status <?php echo $lhtuser['nama']; ?></h4>
					<hr>
					<div id="status">
						

					<?php 

					$id_user = $_GET['id'];

					$sql = "select status.id_status, status.status, status.id_user, status.id_kab, status.tanggal,
							kabupaten.id_kab, kabupaten.kabupaten, kabupaten.id_prov, pengguna.id_user, pengguna.nama, pengguna.email, 
							pengguna.foto, provinsi.id_prov, provinsi.provinsi as prov from status, kabupaten, provinsi,
							pengguna where status.id_user = pengguna.id_user and status.id_kab = kabupaten.id_kab
							and kabupaten.id_prov = provinsi.id_prov and status.id_user = '$id_user' 
							order by status.id_status desc limit 7";
					$qry = mysql_query($sql);
					while($status=mysql_fetch_array($qry)) :
					?>


						<div class="media">
						  <a class="pull-left" href="#">
						    <img class="media-object" src="admin/file/gambar/user/<?php echo $status['email']; ?>/<?php echo $status['foto']; ?>" 
						    alt="<?php echo $status['nama']; ?>" width="64" height="64" />
						  </a>
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

					</div>

		</div>
	<div class="clear">
	</div>
    		
</div>

<?php
$id_user = $_GET['id'];
$t_sql = "select * from pengguna where id_user = '$id_user'";
$t_qry = mysql_query($t_sql);
$t_data = mysql_fetch_array($t_qry);

?>

<script type="text/JavaScript">
jQuery('title').replaceWith('<title>Lomeo :: <?php echo $t_data["nama"]; ?></title>');
</script>

<?php } ?>
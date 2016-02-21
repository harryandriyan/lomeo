<?php

defined('gis') or die('Tidak Boleh akses Langsung');

$idusr = $_SESSION['id_user'];

$user_sql = "select pengguna.id_user, pengguna.nama, pengguna.email, pengguna.prov, pengguna.alamat, pengguna.tentang, pengguna.kelamin,
		pengguna.foto, provinsi.id_prov, provinsi.provinsi as prop, provinsi.kota as kota from pengguna, provinsi 
		where pengguna.prov = provinsi.id_prov and pengguna.id_user = '$idusr'";
$user_qry = mysql_query($user_sql);
$user = mysql_fetch_array($user_qry);
?>

<div class="media" style="border: 1px solid #ddd; border-radius: 5px; padding: 15px;">
	  <a class="pull-left" href="#foto" data-toggle="modal">
	    <img class="media-object" style="border-radius: 10%; box-shadow: 1px 1px 2px #ccc;" 
	    src="admin/file/gambar/user/<?php echo $user['email']; ?>/<?php echo $user['foto']; ?>" 
	    alt="<?php echo $user['nama']; ?>" width="200" height="200" />
	  </a>
	  <div class="media-body">
	    <h4 class="media-heading">
	    <a href="#"><h3><?php echo $user['nama']; ?></h3></a>
	    </h4>
	    <?php echo $user['tentang']; ?><br>
	    <font style="font-size: 12px;"> Alamat saya <a href="#"><?php echo $user['alamat']; ?></a></font>
		<p></p>
		<p><?php echo $user['kota']; ?>, <?php echo $user['prop']; ?></p>	    
	  </div>
</div>

<!--javascript bootsstrap-->
<div class="modal fade" id="foto" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<center><p><h4>Asep Tech Site</h4></p></center>
			</div>
			<div class="modal-body">
				<?php include "modul/contact.php";?>
				<div class="modal-footer">
				<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
			</div>
			</div>
		</div>
	</div> 
</div>



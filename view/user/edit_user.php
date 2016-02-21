<?php
	defined('gis') or die('Tidak Boleh akses Langsung');

$id = $_SESSION['id_user'];

$editus_sql = "select * from pengguna where id_user= '$id'";
$editus_query = mysql_query($editus_sql);
$editus = mysql_fetch_array($editus_query);		

?>
<div class="content">
<div id="wrap">
	<div id="side">
		    	<?php include_once "inc/side/side_user.php"; ?>	
	</div>
	<div id="data">
	<h3 align="center">Edit Data Anda </h3>
		<form class="form-horizontal" role="form" action="index.php?view=update_user" method="post" enctype="multipart/form-data">
				  
				  <div class="form-group">
				    <label for="id_dis" class="col-sm-2 control-label">ID User</label>
				    <div class="col-sm-10">
				      
				      <input type="text" name="id_dis" class="form-control" id="id_dis" value="ID Usermu <?php echo $editus ['id_user']; ?>, ini tidak bisa diganti" disabled>
				      <input type="hidden" name="id" value="<?php echo $editus['id_user']; ?>"  />
				    </div>
				  </div>
				  
				  
				  <div class="form-group">
				    <label for="nama" class="col-sm-2 control-label">Nama User</label>
				    <div class="col-sm-10">
				      <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $editus ['nama']; ?>" required>
				    </div>
				  </div>

				  <div class="form-group">
				    <label for="foto" class="col-sm-2 control-label">Foto Profil</label>
				    <div class="col-sm-10">
				     <input type="file" id="foto" name="foto" value="<?php echo $editus['foto']; ?>" />
				    </div>
				  </div>

				  <div class="form-group">
				  	<label for="kel" class="col-sm-2 control-label">Kelamin</label>
				  	<div class="col-sm-10">
						<select id="kel" class="form-control" name="kel">
						<?php
						if($editus['kelamin'] == "laki-laki") :

						?>
	    				<option value="laki-laki" selected>Laki-Laki</option>
	    				<option value="perempuan">Perempuan</option>
	    				<?php
						else :

						?>
						<option value="laki-laki">Laki-Laki</option>
	    				<option value="perempuan" selected>Perempuan</option>

	    			<?php endif; ?>
	    				
	    				</select>
	    			</div>
	    		  </div>
	    		  
				  <div class="form-group">
				    <label for="nama" class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-10">
				      <input type="text" name="email" disabled="disabled" class="form-control" id="nama" value="<?php echo $editus ['email']; ?>" required>
				    </div>
				  </div>

				  <div class="form-group">
				    <label for="prov" class="col-sm-2 control-label">Provinsi</label>
				    <div class="col-sm-10">
				      <select name="prov" class="form-control" id="prov">
				      	<?php
				      	$qry = "select * from provinsi";
				      	$hasil = mysql_query($qry);
				      	while ($prov = mysql_fetch_array($hasil)) :
				      	?>

				     	 <option value="<?php echo $prov['id_prov']; ?>"><?php echo $prov['provinsi']; ?></option>

				  		<?php endwhile; ?>
				      </select>
				    </div>
				  </div>

				  <div class="form-group">
				    <label for="alm" class="col-sm-2 control-label">Alamat </label>
				    <div class="col-sm-10">
				      <textarea id="alm" name="alamat" class="form-control" placeholder="Tulis Alamat Anda" required="required"><?php echo $editus['alamat']; ?></textarea>
				    </div>
				  </div>

				  <div class="form-group">
				    <label for="tnt" class="col-sm-2 control-label">Tulis Tentang Anda</label>
				    <div class="col-sm-10">
				      <textarea id="tnt" name="tentang" class="form-control" placeholder="Tulis mengenai diri Anda" required="required"><?php echo $editus['tentang']; ?></textarea>
				    </div>
				  </div>		
				   <input type="hidden" name="email" value="<?php echo $editus['email']; ?>" />
				   <input type="hidden" name="poto" value="<?php echo $editus['foto']; ?>" />
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success">Simpan Data Anda</button>
				    	<a href="index.php?view=user" style="color: #fff;" class="btn btn-info">Batal</a>
				    </div>

				  </div>
		</form>

	</div>
	<div class="clear"></div>
</div>
</div>
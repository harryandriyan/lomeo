<?php

	defined('gis') or die('Tidak Boleh akses Langsung');

$id = $_GET['id'];

$sql = "select * from pengguna where id_user= '$id'";
$query = mysql_query($sql);
$data = mysql_fetch_array($query);		

?>
<div class="content">
<div id="wrap">
	<div id="side">
		    		<?php include_once 'inc/side/side_admin.php';?>
	</div>
	<div id="data">
	<h3>Form Edit User</h3>
		<form class="form-horizontal" role="form" action="index.php?view=update_user" method="post" enctype="multipart/form-data">
				  
				  <div class="form-group">
				    <label for="id" class="col-sm-2 control-label">ID User</label>
				    <div class="col-sm-10">
				      
				      <input type="text" name="id_dis" class="form-control" id="id_dis" value="<?php echo $data ['id_user']; ?>" disabled>
				    </div>
				  </div>
				  
				  
				  <div class="form-group">
				    <label for="nama" class="col-sm-2 control-label">Nama</label>
				    <div class="col-sm-10">
				      <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $data ['nama']; ?>">
				    </div>
				  </div>

				  <div class="form-group">
				    <label for="email" class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-10">
				      <input type="text" name="email" class="form-control" id="email" value="<?php echo $data ['email']; ?>">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="prov" class="col-sm-2 control-label">Provinsi</label>
				    <div class="col-sm-10">
				      <select id="prov" class="form-control" name="prov">
				      	
				      <?php
				      $prov = "select * from provinsi";
				      $qryprov = mysql_query($prov);

				      while ($hasil=mysql_fetch_array($qryprov)) :
				      	
				      
				      ?>


				  		<option value="<?php echo $hasil['id_prov']; ?>"><?php echo $hasil['provinsi']; ?></option>

				  	<?php endwhile; ?>

				      </select>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="alamat" class="col-sm-2 control-label">Alamat</label>
				    <div class="col-sm-10">
				      <textarea id="alamat" name="alamat" class="form-control"><?php echo $data['alamat']; ?></textarea>
				    </div>
				  </div>

				  <div class="form-group">
				    <label for="tentang" class="col-sm-2 control-label">Tentang</label>
				    <div class="col-sm-10">
				      <textarea id="tentang" name="tentang" class="form-control"><?php echo $data['tentang']; ?></textarea>
				    </div>
				  </div>

				  <div class="form-group">
				    <label for="pass" class="col-sm-2 control-label">Password</label>
				    <div class="col-sm-10">
				      <input type="text" id="pass" class="form-control" rows="2" name="pass" value="<?php echo $data['pass']; ?>" />
				    </div>
				  </div>
				  
				<div class="form-group">
				  	<label for="kel" class="col-sm-2 control-label">Kelamin</label>
				  	<div class="col-sm-10">
						<select id="kel" class="form-control" name="kel">
						<?php
						if($data['kelamin'] == "laki-laki") :

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
				    <label for="foto" class="col-sm-2 control-label">Foto</label>
				    <div class="col-sm-10">
				     <input type="file" id="foto" name="foto" />
				    </div>
				  </div>
					
					<input type="hidden" name="poto" value="<?php echo $data ['foto']; ?>"  />	 
				  <input type="hidden" name="id" value="<?php echo $data ['id_user']; ?>"  />
					

				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success">Update Data User</button>
				      <a href="index.php?view=user&hal=1" class="btn btn-warning">Batal</a>
				    </div>
				  </div>
		</form>

	</div>
	<div class="clear"></div>
</div>
</div>
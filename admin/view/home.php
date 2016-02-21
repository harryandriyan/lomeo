
<?php
	defined('gis') or die('Tidak Boleh akses Langsung');
?>

<div id="wrap">
		    			
		    		<div id="side">
		    		<?php include_once 'inc/side/side_admin.php';?>
		    		</div>
		    			
		    		<div id="data">
		    		<?php

		    		$id = $_SESSION['id_admin'];
		    		$qry = "select * from admin where id_admin = '$id'";
		    		$hasil = mysql_query($qry);

		    		$data = mysql_fetch_array($hasil);

		    		?>
			    			<h3>Selamat Datang Admin, <?php echo $data['uname']; ?></h3>
			    			
			    			<div class="row">

										  <div class="col-sm-6 col-md-4" id="tmb">
										    <a href="index.php?view=provinsi" class="thumbnail">
										    <div align="center" style="color: rgb(60, 118, 61);">
										    <h1 class="glyphicon glyphicon-book"></h1>
										    <p>Manajemen Data Provinsi</p>
										  </div>
										    </a>
										  </div>

										  <div class="col-sm-6 col-md-4" id="tmb">
										    <a href="index.php?view=kabupaten" class="thumbnail">
										    <div align="center" style="color: rgb(60, 118, 61);">
										    <h1 class="glyphicon glyphicon-file"></h1>
										    <p>Manajemen Data Kabupaten</p>
										  </div>
										    </a>
										  </div>

										  <div class="col-sm-6 col-md-4" id="tmb">
										    <a href="index.php?view=kontak" class="thumbnail">
										    <div align="center" style="color: rgb(60, 118, 61);">
										    <h1 class="glyphicon glyphicon-envelope"></h1>
										    <p>Manajemen Data Pesan Kontak</p>
										  </div>
										    </a>
										  </div>

										  <div class="col-sm-6 col-md-4" id="tmb">
										    <a href="index.php?view=user" class="thumbnail">
										    <div align="center" style="color: rgb(60, 118, 61);">
										    <h1 class="glyphicon glyphicon-user"></h1>
										    <p>Manajemen Data User</p>
										  </div>
										    </a>
										  </div>
					

										  <div class="col-sm-6 col-md-4" id="tmb">
										    <a href="index.php?view=pariwisata" class="thumbnail">
										    <div align="center" style="color: rgb(60, 118, 61);">
										    <h1 class="glyphicon glyphicon-map-marker"></h1>
										    <p>Manajemen Data Lokasi</p>
										  </div>
										    </a>
										  </div>	

										  <div class="col-sm-6 col-md-4" id="tmb">
										    <a href="index.php?view=kategori" class="thumbnail">
										    <div align="center" style="color: rgb(60, 118, 61);">
										    <h1 class="glyphicon glyphicon-list"></h1>
										    <p>Manajemen Data Kategori</p>
										  </div>
										    </a>
										  </div>

										  <div class="col-sm-6 col-md-4" id="tmb">
										    <a href="index.php?view=status" class="thumbnail">
										    <div align="center" style="color: rgb(60, 118, 61);">
										    <h1 class="glyphicon glyphicon-comment"></h1>
										    <p>Manajemen Data Status</p>
										  </div>
										    </a>
										  </div>	

										 <div class="col-sm-6 col-md-4" id="tmb">
										    <a href="index.php?view=komentar" class="thumbnail">
										    <div align="center" style="color: rgb(60, 118, 61);">
										    <h1 class="glyphicon glyphicon-tags"></h1>
										    <p>Manajemen Data Ulasan</p>
										  </div>
										    </a>
										  </div>						 

							</div>


			    			</div>
		    		<div class="clear">
		    		</div>
    		
</div>
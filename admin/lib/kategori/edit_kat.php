<?php

	defined('gis') or die('Tidak Boleh akses Langsung');
$id = $_GET['id'];

$sql = "select * from jen_wis where id_jen_wis = '$id'";
$query = mysql_query($sql);
$data = mysql_fetch_array($query);		

?>
<div class="content">
<div id="wrap">
	<div id="side">
		    		<?php include_once 'inc/side/side_admin.php';?>
	</div>
	<div id="data">
	<h3>Form Edit Data Lokasi Wisata</h3>
		<form class="form-horizontal" role="form" action="index.php?view=update_kat" method="post" enctype="multipart/form-data">
				  
				  <div class="form-group">
				    <label for="id_dis" class="col-sm-2 control-label">ID Wisata</label>
				    <div class="col-sm-10">
				      
				      <input type="text" name="id_dis" class="form-control" id="id_dis" value="<?php echo $data ['id_jen_wis']; ?>" disabled>
				    </div>
				  </div>
				  
				  
				  <div class="form-group">
				    <label for="kat" class="col-sm-2 control-label">Kategori</label>
				    <div class="col-sm-10">
				      <input type="text" name="kat" class="form-control" id="kat" value="<?php echo $data ['jenis']; ?>">
				    </div>
				  </div>

				  <div class="form-group">
				    <label for="icon" class="col-sm-2 control-label">Icon</label>
				    <div class="col-sm-10">
				      <input type="text" name="icon" class="form-control" id="icon" value="<?php echo $data ['icon']; ?>">
				    </div>
				  </div>

				  

				  <div class="form-group">
				    <label for="ket" class="col-sm-2 control-label">Keterangan</label>
				    <div class="col-sm-10">
				      <textarea id="ket" name="ket" class="form-control"><?php echo $data['keterangan']; ?></textarea>
				    </div>
				  </div>

				  <input type="hidden" name="id" value="<?php echo $data ['id_jen_wis']; ?>"  />
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success">Update Data Kategori</button>
				      <a href="index.php?view=kategori&hal=1" class="btn btn-warning">Batal Edit</a>
				    </div>
				  </div>
		</form>

	</div>
	<div class="clear"></div>
</div>
</div>
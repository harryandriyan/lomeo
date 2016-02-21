<?php

	defined('gis') or die('Tidak Boleh akses Langsung');

$id = $_GET['id'];

$sql = "select * from kontak where id_kontak = '$id'";
$query = mysql_query($sql);
$data = mysql_fetch_array($query);		

?>
<div class="content">
<div id="wrap">
	<div id="side">
		    		<?php include_once 'inc/side/side_admin.php';?>
	</div>
	<div id="data">

		<form class="form-horizontal" role="form" action="index.php?view=update_pesan" method="post">
				  
				  <div class="form-group">
				    <label for="id" class="col-sm-2 control-label">ID Pesan</label>
				    <div class="col-sm-10">
				      
				      <input type="text" name="id_dis" class="form-control" id="id_dis" value="<?php echo $data ['id_kontak']; ?>" disabled>
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
				    <label for="pesan" class="col-sm-2 control-label">Pesan</label>
				    <div class="col-sm-10">
				      <textarea id="pesan" class="form-control" rows="2" name="pesan"><?php echo $data ['pesan']; ?></textarea>
				    </div>
				  </div>
				  
				  <div class="form-group">
				    <label for="pesan" class="col-sm-2 control-label">Status</label>
				    <div class="col-sm-10">
				     <input name="status" type="text" class="form-control" value="<?php echo $data ['status']; ?>" />
				    </div>
				  </div>
					<input type="hidden" name="id" value="<?php echo $data ['id_kontak']; ?>"  />
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success">Update Pesan</button>
				      <a href="index.php?view=kontak&hal=1" class="btn btn-warning">Batal</a>
				    </div>
				  </div>
		</form>

	</div>
	<div class="clear"></div>
</div>
</div>
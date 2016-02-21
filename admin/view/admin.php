<?php
	defined('gis') or die('Tidak Boleh akses Langsung');

$id = $_SESSION['id_admin'];

$sql = "select * from admin where id_admin= '$id'";
$query = mysql_query($sql);
$data = mysql_fetch_array($query);		

?>
<div class="content">
<div id="wrap">
	<div id="side">
		    		<?php include_once 'inc/side/side_admin.php';?>
	</div>
	<div id="data">
	<h3>Form Edit Admin <a href="index.php?view=add_admin" class="btn btn-info">
	<div class="glyphicon glyphicon-floppy-save" style="font-family: sans-serif;"> Tambahkan Admin</div></a></h3>
		<form class="form-horizontal" role="form" action="index.php?view=update_admin" method="post">
				  
				  <div class="form-group">
				    <label for="id_dis" class="col-sm-2 control-label">ID Admin</label>
				    <div class="col-sm-10">
				      
				      <input type="text" name="id_dis" class="form-control" id="id_dis" value="<?php echo $data ['id_admin']; ?>" disabled>
				    </div>
				  </div>
				  
				  
				  <div class="form-group">
				    <label for="nama" class="col-sm-2 control-label">Nama Admin</label>
				    <div class="col-sm-10">
				      <input type="text" name="uname" class="form-control" id="nama" value="<?php echo $data ['uname']; ?>">
				    </div>
				  </div>

				  <div class="form-group">
				    <label for="pass" class="col-sm-2 control-label">Password</label>
				    <div class="col-sm-10">
				      <input type="text" id="pass" class="form-control" rows="2" name="pass" required />
				    </div>
				  </div>
				  
				<input type="hidden" name="id" value="<?php echo $data ['id_admin']; ?>"  />
					

				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success">Update Data Admin</button>
				    </div>
				  </div>
		</form>

	</div>
	<div class="clear"></div>
</div>
</div>
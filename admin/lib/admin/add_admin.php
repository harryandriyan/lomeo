<?php
	defined('gis') or die('Tidak Boleh akses Langsung');
?>

<div class="content">
<div id="wrap">
	<div id="side">
		    		<?php include_once 'inc/side/side_admin.php';?>
	</div>
	<div id="data">
	<h3>Form Tambahkan Admin</h3>
		<form class="form-horizontal" role="form" action="index.php?view=add_admin_pros" method="post">

				  <div class="form-group">
				    <label for="prov" class="col-sm-2 control-label">Nama Admin</label>
				    <div class="col-sm-10">
				      <input type="text" name="uname" class="form-control" id="prov">
				    </div>
				  </div>

				  <div class="form-group">
				    <label for="lat" class="col-sm-2 control-label">Password</label>
				    <div class="col-sm-10">
				      <input type="password" name="pass" class="form-control" id="lat">
				    </div>
				  </div>
				  
				  <div class="form-group">
				    <label for="lang" class="col-sm-2 control-label">Konfirmasi Password</label>
				    <div class="col-sm-10">
				     <input name="repass" id="lang" type="password" class="form-control" />
				    </div>
				  </div>
					
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success">Tambahkan Min</button>
				      <a href="index.php?view=admin" class="btn btn-warning">Batal Min</a>
				    </div>
				  </div>

				  
		</form>

	</div>
	<div class="clear"></div>
</div>
</div>
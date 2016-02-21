<?php
	defined('gis') or die('Tidak Boleh akses Langsung');
?>

<div class="content">
<div id="wrap">
	<div id="side">
		    		<?php include_once 'inc/side/side_admin.php';?>
	</div>
	<div id="data">
	<h3>Form Tambahkan Data Kategori Pariwisata</h3>
		<form class="form-horizontal" role="form" action="index.php?view=add_kat_pros" method="post" enctype="multipart/form-data">  
				  
				  <div class="form-group">
				    <label for="kat" class="col-sm-2 control-label">Kategori</label>
				    <div class="col-sm-10">
				      <input type="text" name="kat" class="form-control" id="kat" required="required">
				    </div>
				  </div>

				  <div class="form-group">
				    <label for="icon" class="col-sm-2 control-label">icon</label>
				    <div class="col-sm-10">
				      <input type="text" name="icon" class="form-control" id="icon" required="required">
				    </div>
				  </div>


				  <div class="form-group">
				    <label for="ket" class="col-sm-2 control-label">Keterangan</label>
				    <div class="col-sm-10">
				      <textarea name="ket" id="ket" required="required" class="form-control"></textarea>
				    </div>
				  </div>

				  
				  
					 <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success">Submit Data Kategori</button>
				      <a href="index.php?view=kategori&hal=1" class="btn btn-warning">Batal</a>
				    </div>
				  </div>
		</form>

	</div>
	<div class="clear"></div>
</div>
</div>
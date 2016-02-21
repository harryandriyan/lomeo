<?php

	defined('gis') or die('Tidak Boleh akses Langsung');
$id = $_GET['id'];

$sql = "select wisata.id_pw, wisata.nama, wisata.id_jenis, wisata.alamat, wisata.deskripsi, wisata.lat, wisata.lang,
		wisata.id_kab, wisata.foto, wisata.stat, kabupaten.id_kab, kabupaten.kabupaten, jen_wis.id_jen_wis,
		jen_wis.jenis from wisata, kabupaten, jen_wis
		where wisata.id_kab = kabupaten.id_kab and wisata.id_jenis = jen_wis.id_jen_wis and id_pw = $id";
		
$query = mysql_query($sql);
$data = mysql_fetch_array($query);		

?>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script type="text/javascript" src="../style/ckeditor/ckeditor.js"></script>

<div class="content">
<div id="wrap">
	<div id="side">
		    		<?php include_once 'inc/side/side_admin.php';?>
	</div>
	<div id="data">
	<h3>Form Edit Data Lokasi Wisata</h3>
	<div class="row">
	<div class="col-md-8">
		
		<div id="map_piker" style="width: 100%; height: 500px;"></div>

	</div>
	<div class="col-md-4">
		<form class="form-horizontal" role="form" action="index.php?view=update_wisata" method="post" enctype="multipart/form-data">
				  
				  <div class="form-group">
				    
				    <div class="col-sm-12">
				      
				      <input type="text" name="id_dis" class="form-control" id="id_dis" value="ID Wisata <?php echo $data ['id_pw']; ?>" disabled>
				    </div>
				  </div>
				  
				  
				  <div class="form-group">
				   
				    <div class="col-sm-12">
				      <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $data ['nama']; ?>">
				    </div>
				  </div>

				  <div class="form-group">
				    
				    <div class="col-sm-12">
				      <select id="jenis" name="jenis" class="form-control">
				    	<?php
				    	$qry = "select id_jen_wis, jenis from jen_wis order by jenis";
				    	$hasil = mysql_query($qry);
				    	while ($aray=mysql_fetch_array($hasil)) :
				    					    	?>	
				    	<option value="<?php echo $aray['id_jen_wis']; ?>"><?php echo $aray['jenis']; ?></option>
				    	<?php endwhile; ?>
				    </select>
				    </div>
				  </div>

				  <div class="form-group">
				    
				    <div class="col-sm-12">
				      <input type="text" name="lat" class="form-control" id="lat" value="<?php echo $data ['lat']; ?>">
				    </div>
				  </div>
				  
				  <div class="form-group">
				    
				    <div class="col-sm-12">
				     <input name="lang" id="lang" type="text" class="form-control" value="<?php echo $data ['lang']; ?>" />
				    </div>
				  </div>

				  <div class="form-group">
				   
				    <div class="col-sm-12">
				    <select id="prov" name="prov" class="form-control">
				    	<?php
				    	$pqry = "select id_prov, provinsi from provinsi order by provinsi";
				    	$phasil = mysql_query($pqry);
				    	while ($pdata=mysql_fetch_array($phasil)) :
				    					    	?>	
				    	<option value="<?php echo $pdata['id_prov']; ?>"><?php echo $pdata['provinsi']; ?></option>
				    	<?php endwhile; ?>
				    </select>
				    
				    </div>
				  </div>
				  	
				  <div class="form-group">
				    
				    <div class="col-sm-12">
				    <select id="kab" name="kab" class="form-control">
				    	<?php
				    	$kqry = "select id_kab, kabupaten from kabupaten order by kabupaten";
				    	$khasil = mysql_query($kqry);
				    	while ($karay=mysql_fetch_array($khasil)) :
				    					    	?>	
				    	<option value="<?php echo $karay['id_kab']; ?>"><?php echo $karay['kabupaten']; ?></option>
				    	<?php endwhile; ?>
				    </select>
				    
				    </div>
				  </div>

				  <div class="form-group">
				    
				    <div class="col-sm-12">
				      <textarea id="alm" name="alamat" class="form-control"><?php echo $data['alamat']; ?></textarea>
				    </div>
				  </div>

				  <div class="form-group">
				   
				    <div class="col-md-12">
				      <textarea id="des" name="deskripsi" class="ckeditor" id="editor"><?php echo $data['deskripsi']; ?></textarea>
				    </div>
				  </div>

				  <div class="form-group">
				    
				    <div class="col-sm-12">
				     <input type="file" id="foto" name="foto" />
				    </div>
				  </div>

				  <div class="form-group">
				    
				    <div class="col-sm-12">
				    <select id="stat" name="stat" class="form-control">
				    	<option value="1">Aktif</option>
				    	<option value="0">Tidak Aktif</option>
				    </select>
				    
				    </div>
				  </div>
					<input type="hidden" name="id" value="<?php echo $data ['id_pw']; ?>"  />
					<input type="hidden" name="photo" value="<?php echo $data ['foto']; ?>"  />
				  <div class="form-group">
				    <div class="col-sm-12">
				      <button type="submit" class="btn btn-success">Simpan</button>
				      <a href="index.php?view=pariwisata&hal=1" class="btn btn-warning">Batal Edit</a>
				    </div>
				  </div>
		</form>
		<script type="text/javascript">
		//* Fungsi untuk mendapatkan nilai latitude longitude
			function updateMarkerPosition(latLng) {
				document.getElementById('lat').value = [latLng.lat()]
			    document.getElementById('lang').value = [latLng.lng()]
			}
						
			var map = new google.maps.Map(document.getElementById('map_piker'), {
			zoom: 12,
			center: new google.maps.LatLng(-7.781921,110.364678),
			 mapTypeId: google.maps.MapTypeId.ROADMAP
				});
			//posisi awal marker 	
			var latLng = new google.maps.LatLng(<?php echo $data ['lat']; ?>,<?php echo $data ['lang']; ?>);

			/* buat marker yang bisa di drag lalu 
			  panggil fungsi updateMarkerPosition(latLng)
			 dan letakan posisi terakhir di id=latitude dan id=longitude
			 */
			var marker = new google.maps.Marker({
					position : latLng,
					title : 'lokasi wisata',
					map : map,
					draggable : true
				});
				
			updateMarkerPosition(latLng);
			google.maps.event.addListener(marker, 'drag', function() {
			 // ketika marker di drag, otomatis nilai latitude dan longitude
			 //menyesuaikan dengan posisi marker 
			    updateMarkerPosition(marker.getPosition());
			  });
		</script>
		</div>
		</div>

	</div>
	<div class="clear"></div>
</div>
</div>
<?php
	defined('gis') or die('Tidak Boleh akses Langsung');
?>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<div class="content">
<div id="wrap">
	<div id="side">
		    		<?php include_once 'inc/side/side_admin.php';?>
	</div>
	<div id="data">
	<h3>Form Tambahkan Kabupaten </h3>
	<div class="row">
	<div class="col-md-8">
		
		<div id="map_piker" style="width: 100%; height: 500px;"></div>

	</div>
	<div class="col-md-4">
		<form class="form-horizontal" role="form" action="index.php?view=add_kab_pros" method="post">

				  <div class="form-group">
				    
				    <div class="col-sm-12">
				      <input type="text" name="kab" class="form-control" id="kab" placeholder="Nama Kabupaten" required>
				    </div>
				  </div>

				  <div class="form-group">
				    
				    <div class="col-sm-12">
				      <select name="prov" class="form-control" id="prov">
				      <option value="">--Pilih Provinsi--</option>
				      	<?php
				      	$qry = "select * from provinsi";
				      	$hasil = mysql_query($qry);
				      	while ($data = mysql_fetch_array($hasil)) :
				      	?>
				     	 <option value="<?php echo $data['id_prov']; ?>"><?php echo $data['provinsi']; ?></option>

				  		<?php endwhile; ?>
				      </select>
				    </div>
				  </div>

				  <div class="form-group">
				    <div class="col-sm-12">
				      <input type="text" name="lat" class="form-control" id="lat" placeholder="Latitude" required>
				    </div>
				  </div>

				  <div class="form-group">
				   
				    <div class="col-sm-12">
				      <input type="text" name="lang" class="form-control" id="lang" placeholder="Langitude" required>
				    </div>
				  </div>
				  
				  
					
				  <div class="form-group">
				    <div class="col-sm-12">
				      <button type="submit" class="btn btn-success">Simpan</button>
				      <a href="index.php?view=kabupaten&hal=1" class="btn btn-warning">Batal</a>
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
			var latLng = new google.maps.LatLng(-7.781921,110.364678);

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
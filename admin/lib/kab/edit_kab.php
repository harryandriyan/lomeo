<?php


	defined('gis') or die('Tidak Boleh akses Langsung');


$id = $_GET['id'];

$sql = "select kabupaten.id_kab, kabupaten.id_prov, kabupaten.kabupaten, kabupaten.lat,
						        kabupaten.lang, provinsi.id_prov, provinsi.provinsi from kabupaten, provinsi
						        where kabupaten.id_prov = provinsi.id_prov and kabupaten.id_kab = '$id' order by kabupaten.kabupaten";
$query = mysql_query($sql);
$data = mysql_fetch_array($query);		

?>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<div class="content">
<div id="wrap">
	<div id="side">
		    		<?php include_once 'inc/side/side_admin.php';?>
	</div>
	<div id="data">
	<h3>Form Edit Data Kabupaten</h3>
	<div class="row">
	<div class="col-md-8">
		
		<div id="map_piker" style="width: 100%; height: 500px;"></div>
		
	</div>
	<div class="col-md-4">
		<form class="form-horizontal" role="form" action="index.php?view=update_kabupaten" method="post">
				  
				  <div class="form-group">
				   
				    <div class="col-sm-12">
				      
				      <input type="text" name="id_dis" class="form-control" id="id_dis" value="Id kabupaten <?php echo $data ['id_kab']; ?>" disabled>
				    </div>
				  </div>
				  
				  
				  <div class="form-group">
				   
				    <div class="col-sm-12">
				      <input type="text" name="kab" class="form-control" id="kab" value="<?php echo $data ['kabupaten']; ?>">
				    </div>
				  </div>

				  <div class="form-group">
				    
				    <div class="col-sm-12">
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
				   
				    <div class="col-sm-12">
				     <input name="lat" id="lat" type="text" class="form-control" value="<?php echo $data ['lat']; ?>" />
				    </div>
				  </div>

				   <div class="form-group">
				   
				    <div class="col-sm-12">
				     <input name="lang" id="lang" type="text" class="form-control" value="<?php echo $data ['lang']; ?>" />
				    </div>
				  </div>

					<input type="hidden" name="id" value="<?php echo $data ['id_kab']; ?>"  />
				  
				  <div class="form-group">

				    <div class="col-sm-12">
				      <button type="submit" class="btn btn-success">Simpan</button>
				      <a href="index.php?view=kabupaten&hal=1" class="btn btn-warning">Batal Edit</a>
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
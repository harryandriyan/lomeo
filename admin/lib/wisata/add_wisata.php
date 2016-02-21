<?php
	defined('gis') or die('Tidak Boleh akses Langsung');
?>

<script type="text/javascript">

$(document).ready(function() {
			document.getElementById("form-wisata").prov.focus();
});



function getKab(kab) {


	var rand_ku= Math.random();
	$.ajax( {
        type: 'post',
        url: 'inc/get_kab.php?id='+kab+'&'+rand_ku,
        data: '',
        cache: false,
        success: function(msg) {
            
            $('#kab').html(msg);
        }
    });
}

</script>

<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script type="text/javascript" src="../style/ckeditor/ckeditor.js"></script>
<div class="content">
<div id="wrap">
	<div id="side">
		    		<?php include_once 'inc/side/side_admin.php';?>
	</div>
	<div id="data">
	<h3>Form Tambahkan Data Pariwisata</h3>
	<div class="row">
		<div class="col-md-7">
			<div id="map_piker" style="width: 100%; height: 500px;"></div>
		</div>
		<div class="col-md-5">
		<form class="form-horizontal" role="form" id="form-wisata" action="index.php?view=add_wisata_pros" method="post" enctype="multipart/form-data">  
				  
				  <div class="form-group">
				    
				    <div class="col-md-12">
				      <input type="text" name="nama" class="form-control" id="nama" required="required" placeholder="Nama Wisata">
				    </div>
				  </div>

				  <div class="form-group">
				    
				    <div class="col-md-12">
				      <select id="jenis" name="jenis" class="form-control">
				      <option value="">--Pilih Kategori --</option>
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
				    
				    <div class="col-md-12">
				      <input type="text" name="lat" class="form-control" id="lat" required="required" placeholder="Latitude" />
				    </div>
				  </div>
				  
				  <div class="form-group">
				    
				    <div class="col-md-12">
				     <input name="lang" id="lang" type="text" class="form-control" required="required" placeholder="Langitude"/>
				    </div>
				  </div>

				  <div class="form-group">
				   
				    <div class="col-md-12">
				    <select id="prov" name="prov" class="form-control" class="required" onchange="getKab(this.value)">
				    <option value="">--Pilih Provinsi --</option>
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
				   
				    <div class="col-md-12" id="kab">
				    <select id="kab" class="form-control" name="kab" class="required">
				    <option value="">--Pilih Kabupaten --</option>	
				    
				    </select>
				    
				    </div>
				  </div>
				  
				  <div class="form-group">
				   
				    <div class="col-md-12">
				      <textarea id="alm" name="alamat" class="form-control" required="required" placeholder="Alamat"></textarea>
				    </div>
				  </div>

				  <div class="form-group">
				   
				    <div class="col-md-12">
				      <textarea id="des" name="deskripsi" class="ckeditor" id="editor"></textarea>
				    </div>
				  </div>

				  <div class="form-group">
				  
				    <div class="col-md-12">
				     <input type="file" name="foto" id="foto" />
				    </div>
				  </div>

				  <div class="form-group">
				    
				    <div class="col-md-12">
				    <select id="stat" name="stat" class="form-control">
				    	<option value="1">Aktif</option>
				    	<option value="0">Tidak Aktif</option>
				    </select>
				    
				    </div>
				  </div>
				  
					 <div class="form-group">
				    <div class="col-md-12">
				      <button type="submit" class="btn btn-success">Simpan</button>
				      <a href="index.php?view=pariwisata&hal=1" class="btn btn-warning">Batal</a>
				    </div>
				  </div>
		</form>
		</div>

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
	<div class="clear"></div>
</div>
</div>
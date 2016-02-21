<?php defined('gis') or die('Tidak Boleh akses Langsung'); ?>
<div id="wrap">
		    			
		    			<div id="side">
		    				<?php include_once 'inc/side/side_user.php';?>
		    			</div>
		    			
		    			<div id="data">
			    		<?php include_once "lib/search/search_form.php"; ?>
			    			<script
							src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
							</script>
							
							<script>
							var myCenter=new google.maps.LatLng(-7.775955,110.375156);
							
							function initialize()
							{
							var mapProp = {
							  center:myCenter,
							  zoom:13,
							  mapTypeId:google.maps.MapTypeId.ROADMAP
							  };
							
							var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
							
							var marker=new google.maps.Marker({
							  position:myCenter,
							  });
							
							marker.setMap(map);
							
							var infowindow = new google.maps.InfoWindow({
							  content:"Lomeo Social Tourism"
							  });
							
							infowindow.open(map,marker);
							}
							
							google.maps.event.addDomListener(window, 'load', initialize);
							</script>
							
									<div align="center" id="googleMap" 
									style="width:690px;height:250px;margin-top:20px; border-radius: 8px; box-shadow: 2px 2px 3px #bbb;">
									</div>
							
									<?php $rand = rand(100000,999999); ?>


									<form action="index.php?view=kirim_pesan" method="post">
																
											<fieldset>
											
												<legend>Form Kontak</legend>
												<input type="text" name="nama" class="form-control" value="<?php echo $_SESSION['nama_user']; ?>" disabled="disabled" />
												<input type="text" name="email" class="form-control" value="<?php echo $_SESSION['email_user']; ?>" disabled="disabled" />
												<textarea name="pesan" class="form-control" rows="3" required="required" placeholder="Tulis Pesan Anda di sini"></textarea>
												
												<code style="font-size: 18px;"><?php echo $rand; ?></code> 
												<input type="text" name="code" class="form-control" style="width: 120px;" placeholder="masukan kode" required="required" />
												<input type="hidden" name="rcode" value="<?php echo $rand; ?>" />
												<input type="hidden" name="nama" value="<?php echo $_SESSION['nama_user']; ?>">
												<input type="hidden" name="email" value="<?php echo $_SESSION['email_user']; ?>">
												<br>
												<button type="submit" class="btn btn-success" name="submit" id="submit">Kirim Pesan</button>
												<button type="reset" class="btn btn-warning">Reset Form</button>
											
											</fieldset>							
																
									</form>


			    			</div>
		    			<div class="clear">
		    		</div>
    		
</div>

<script type="text/JavaScript">
jQuery('title').replaceWith('<title>Lomeo :: Hubungi Kami</title>');
</script>
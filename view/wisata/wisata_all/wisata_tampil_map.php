<script type="text/javascript">
    
	(function() {
  window.onload = function() {
var map;
    var locations = [
   <?php
         //konfgurasi koneksi database 
          $file1 = "config/connect.php";
          $file2 = "../../config/connect.php";

          if(file_exists($file1)) {
            require_once $file1;
          } else {
            require_once $file2;
          }
          
		  
            	$sql_lokasi="select * from wisata";
            	$r_lokasi=mysql_query($sql_lokasi);
				// ambil nama,lat dan lon dari table lokasi
            	while($lokdata=mysql_fetch_array($r_lokasi)){
            		 ?>
             ['<?php echo $lokdata["nama"]; 
                      echo "<br>";
                      echo $lokdata["alamat"];
                      
             ?>', <?php echo $lokdata['lat']; ?>, <?php echo $lokdata['lang']; ?>],
       <?
				}
		?>		
    
    ];

    //Parameter Google maps
    var options = {
      zoom: 4, //level zoom
	  //posisi tengah peta
      center: new google.maps.LatLng(-2.986927, 120.484314),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
	
	 // Buat peta di 
    var map = new google.maps.Map(document.getElementById('peta'), options);
	 // Tambahkan Marker 
  
	  var infowindow = new google.maps.InfoWindow();

    var marker, i;
     /* kode untuk menampilkan banyak marker */
    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
		 icon: 'icon.png'
      });
     /* menambahkan event clik untuk menampikan
     	 infowindows dengan isi sesuai denga
	    marker yang di klik */
		
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  

  };
})();

	</script>
  <div class="page-header">
  
  <h4>Temukan lokasi Wisata favoritmu
  <a class="btn btn-success pull-right" style="color: #fff;" href="index.php?view=wisata&mod=list" role="button">
  <i class="glyphicon glyphicon-list"></i> Lihat dalam Mode List</a>
  </h4>
</div>
  <div id="peta" style="width: 100%; height: 500px; border-radius: 10px; box-shadow: 2px 2px 2px 2px #ccc; margin-top: 20px;">
  </div>
<hr>



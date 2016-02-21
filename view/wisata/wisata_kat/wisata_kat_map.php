<?php
          $file1 = "config/connect.php";
          $file2 = "../../config/connect.php";

          if(file_exists($file1)) {
            require_once $file1;
          } else {
            require_once $file2;
          } 
?>

<?php
  $jenis = $_GET['kategori'];
  $s_judul = "select * from jen_wis where id_jen_wis = '$jenis'";
  $q_judul = mysql_query($s_judul);

  $d_judul = mysql_fetch_array($q_judul);

?>
<div class="page-header">
<h4>Kategori Tempat Wisata, <?php echo $d_judul['jenis']; ?>
<a class="btn btn-success pull-right" style="color: #fff;" 
href="index.php?view=wisata_kategori&kategori=<?php echo $_GET['kategori']; ?>&mod=list
  "  role="button">
  <i class="glyphicon glyphicon-list"></i> Lihat dalam Mode List</a>
</h4>
</div>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
     
	(function() {
  window.onload = function() {
var map;
    var locations = [
   <?php
         //konfgurasi koneksi database 
          

          $kat = $_GET['kategori'];
          
		  
            	$sql_lokasi="select wisata.id_pw, wisata.nama, wisata.id_jenis, wisata.alamat, wisata.lat,
              wisata.lang, wisata.prov, wisata.id_kab, wisata.foto, jen_wis.id_jen_wis, jen_wis.jenis as jenis,
              provinsi.id_prov, provinsi.provinsi, kabupaten.id_kab, kabupaten.kabupaten
               from wisata, jen_wis, provinsi, kabupaten where wisata.id_jenis=jen_wis.id_jen_wis and 
               wisata.prov = provinsi.id_prov and wisata.id_kab = kabupaten.id_kab and id_jenis='$kat'";
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
      zoom: 10, //level zoom
	  //posisi tengah peta
      center: new google.maps.LatLng(-7.965567371788615, 110.60088405468753),
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
  
  <div id="peta" style="width: 100%; height: 500px; border-radius: 10px; box-shadow: 2px 2px 2px 2px #ccc; margin-top: 20px;">
  </div>

<script type="text/JavaScript">
jQuery('title').replaceWith('<title>Lomeo :: Map View Wisata <?php echo $d_judul["jenis"]; ?></title>');
</script>
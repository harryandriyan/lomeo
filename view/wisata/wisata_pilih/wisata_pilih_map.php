<?php defined('gis') or die('Tidak Boleh akses Langsung'); ?>
<?php
  
  $s_judul = "select kabupaten.id_kab, kabupaten.kabupaten, kabupaten.id_prov, provinsi.id_prov,
  provinsi.provinsi from kabupaten, provinsi where kabupaten.id_prov = provinsi.id_prov and id_kab = '$_GET[id]'";
  $q_judul = mysql_query($s_judul);
  $d_judul = mysql_fetch_array($q_judul);

?>
<div class="page-header">
<h4>
Tempat Wisata di <?php echo $d_judul['kabupaten']; ?>, <?php echo $d_judul['provinsi']; ?>
<a class="btn btn-success pull-right" style="color: #fff;" 
  href="index.php?view=wisata_pilih&id=<?php echo $_GET['id']; ?>&mod=list
  "  role="button">
  <i class="glyphicon glyphicon-list"></i> Lihat dalam Mode List</a>

</h4>
</div>

<script type="text/javascript">
    
	(function() {
  window.onload = function() {
var map;
    var locations = [
   <?php       
		         	$sql_lokasi="select * from wisata where id_kab =  $_GET[id]";
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
    <?php
    $center_sql = "select lat, lang from kabupaten where id_kab = '$_GET[id]'";
    $center_qry = mysql_query($center_sql);
    $center_data = mysql_fetch_array($center_qry);

    ?>
      center: new google.maps.LatLng(<?php echo $center_data['lat']; ?>, <?php echo $center_data['lang']; ?>),
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
  
  <div id="peta" style="width: 100%; height: 400px; border-radius: 10px; box-shadow: 2px 2px 2px 2px #ccc; margin-top: 20px;">
  </div>

<?php
$id_kb = $_GET['id'];
$t_sql = "select * from kabupaten where id_kab = '$id_kb'";
$t_qry = mysql_query($t_sql);
$t_data = mysql_fetch_array($t_qry);

?>

<script type="text/JavaScript">
jQuery('title').replaceWith('<title>Lomeo :: Map View Wisata di <?php echo $t_data["kabupaten"]; ?>, <?php echo $d_judul["provinsi"]; ?></title>');
</script>

  



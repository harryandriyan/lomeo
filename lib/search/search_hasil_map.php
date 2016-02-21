<?php defined('gis') or die('Tidak Boleh akses Langsung'); ?>
<?php $q = addslashes(strip_tags ($_POST['q'])); ?>
<?php

    $q = addslashes(strip_tags ($_POST['q'])); 
    
    $jml_sql = "select * from wisata where nama like '%$q%' or alamat like '%$q%' and stat=1 order by nama";
    $jml_qry = mysql_query($jml_sql); 
    $jml_data = mysql_num_rows($jml_qry);
    
    ?>

<div id="wrap">
              
            <div id="side">
            
            <?php include_once 'inc/side/side_user.php';?>

            </div>

            <div id="data">
            <?php include_once 'lib/search/search_form.php';?>
              
            <?php if($jml_data !=0): ?>

              <h4>Hasil Pencarian dengan kata kunci 
              <font style="color: green; font-weight: bold;"><?php echo $q; ?></font> 
              terdapat <?php echo $jml_data; ?> hasil</h4>
            <?php else: ?>
              <h4>Tidak ada hasil, untuk pencarian dengan kata kunci 
              <font style="color: green; font-weight: bold;"><?php echo $q; ?></font> 
              </h4>
            <?php endif; ?>
            
              <script type="text/javascript">
    
                  (function() {
                  window.onload = function() {
                var map;
                    var locations = [
                   <?php       
                              $sql_lokasi="select * from wisata where nama like '%$q%' or alamat like '%$q%' and stat=1 order by nama";
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
                      zoom: 8, //level zoom
                    //posisi tengah peta
                    
                      center: new google.maps.LatLng(-7.781921, 110.36467800000003),
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
            jQuery('title').replaceWith('<title>Lomeo :: <?php echo addslashes(strip_tags ($_POST["q"])); ?></title>');
            </script>

            </div>
            <div class="clear"></div>
</div>
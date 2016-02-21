<?php defined('gis') or die('Tidak Boleh akses Langsung'); ?>


<?php
  
  $s_judul = "select * from wisata where id_pw = $_GET[id]";
  $q_judul = mysql_query($s_judul);

  $d_judul = mysql_fetch_array($q_judul);

?>

<div class="page-header">
<h3><?php echo $d_judul['nama']; ?>
<a class="btn btn-success pull-right" style="color: #fff;" 
  href="index.php?view=wisata_tampil&id=<?php echo $_GET['id']; ?>&mod=list
  "  role="button">
  <i class="glyphicon glyphicon-list"></i> Lihat dalam Mode List</a>
</h3>
</div>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    
	(function() {
  window.onload = function() {
var map;
    var locations = [
   <?php       
		         	$sql_lokasi="select * from wisata where id_pw =  $_GET[id]";
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
    <?php
    $c_sql = "select * from wisata where id_pw =  $_GET[id]";
    $c_qry = mysql_query($c_sql);
    $c_data = mysql_fetch_array($c_qry);

    ?>

    <?php $idkb = $c_data['id_kab']; ?>
    //Parameter Google maps
    var options = {
      zoom: 9, //level zoom
	  //posisi tengah peta
    <?php
    $center_sql = "select lat, lang from kabupaten where id_kab = '$idkb'";
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
  
  <div id="peta" style="width: 100%; height: 300px; border-radius: 10px; box-shadow: 2px 2px 2px 2px #ccc; margin-top: 20px;">
  </div>

  <div class="page-header">
  <h4>Katakan sesuatu mengenai <?php echo $d_judul['nama']; ?></h4>
  </div>

    <div class="row">
    
        <div class="col-md-12">
          <div id="ulist">
          <?php include_once 'view/wisata/wisata_ulasan.php'; ?>
          </div>
          <hr>
          <div id="form">
            
            <form action="" method="post">
                                  
                <p><textarea rows="2" class="form-control" id="in-ulasan"
                   placeholder="Tinggalkan ulasan anda"></textarea></p>
                <input type="hidden" id="pw" value="<?php echo $_GET['id']; ?>" />
               <p><button type="submit" class="btn btn-success btn-md btn-block" id="ok-ulasan">Kirim Ulasan</button></p>
              </form>

              <form action="" method="post">
                                  
                
                <input type="hidden" id="id_ul" value="<?php echo $_GET['id']; ?>" />
               
              </form>
              

          </div>
        </div>

    </div>

            <script language='javascript'>
              //membuat document jquery
              $(document).ready(function(){
                //variable yg dibaca dengan ajax untuk di kirim
                $("#ok-ulasan").click(function(){
                  var ulasan = $("#in-ulasan").val();
                  var idpw = $("#pw").val();
                  $.post("view/wisata/wisata_ulasan_post.php", {ul: ulasan, wisata: idpw});
                  $("#in-ulasan").attr("value", "");
                  $("#pw").attr("value", "");
                  return false;

                });

              });
              </script>

              <script language='javascript'>

              $(document).ready(function(){
                
                //load ajax message
                  function loadLog(){
                    var oldscrolHeight = $("#ulist").attr("scrollHeight") - 20;
                    var idpewe = $("#id_ul").val();
                    $.ajax({
                      url : "view/wisata/wisata_ulasan.php",
                      data : "id_obj=" + idpewe,
                      cache : false,
                      success : function(html){
                        $("#ulist").html(html); //load ke <div chatbox>
                        var newscrollHeight = $("#ulist").attr("scrollHeight") - 20;
                        if(newscrollHeight > oldscrollHeight){
                          $("#ulist").animate({scrollTop: newscrollHeight}, 'normal'); //scrol otomatisnya
                        }
                      },
                    });
                  }
                  setInterval (loadLog, 1000);
              });

              </script>


<?php
$id_wis = $_GET['id'];
$t_sql = "select * from wisata where id_pw = '$id_wis'";
$t_qry = mysql_query($t_sql);
$t_data = mysql_fetch_array($t_qry);

?>

<script type="text/JavaScript">
jQuery('title').replaceWith('<title>Lomeo :: Map View <?php echo $t_data["nama"]; ?></title>');
</script>
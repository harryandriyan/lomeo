<?php defined('gis') or die('Tidak Boleh akses Langsung'); ?>


<?php
  
  $s_judul = "select * from wisata where id_pw = $_GET[id]";
  $q_judul = mysql_query($s_judul);

  $d_judul = mysql_fetch_array($q_judul);

?>
<div class="page-header">
<h3><?php echo $d_judul['nama']; ?>
<a class="btn btn-success pull-right" style="color: #fff;" 
  href="index.php?view=wisata_tampil&id=<?php echo $_GET['id']; ?>
  "  role="button">
  <i class="glyphicon glyphicon-map-marker"></i> Lihat dalam Mode Map</a>
</h3>
</div>

<div id="foto" style="width: 690px; height: 400px;">
    <img src="admin/file/gambar/wisata/<?php echo $d_judul['foto']; ?>" width="100%" height="100%"
     style="border-radius: 10px; box-shadow: 2px 2px 2px #ccc;" />
</div>

<div id="deskripsi">
  <?php echo $d_judul['deskripsi']; ?>
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
jQuery('title').replaceWith('<title>Lomeo :: <?php echo $t_data["nama"]; ?></title>');
</script>
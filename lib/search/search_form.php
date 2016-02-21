<?php defined('gis') or die('Tidak Boleh akses Langsung'); ?>
<form method="post" action="index.php?view=cari_wisata" class="form-inline" role="form">
<div class="row">
<div class="col-md-12">
          <div class="input-group">
            <input type="text" id="q" name="q" class="form-control" style="height: 34px; margin: auto;"
             placeholder="Halo, <?php echo $_SESSION['nama_user']; ?>, cari tempat wisata dengan cepat disini"
              required="required"><span id="list"></span>
            <span class="input-group-btn">
              <button class="btn btn-success" type="submit"><b class="glyphicon glyphicon-search"></b></button>
            </span>
          </div>
        </div>
      </div>

</form>

<script type="text/javascript">
  $(document).ready(function(){

    $('#q').change({
      var qi = $('#q').val();
      $.ajax({
                      url : "lib/search/search_list.php",
                      data : "q=" + qi,
                      cache : false,
                      success : function(html){
                        $("#list").html(html); //load ke <span>
                          
                      },
            });
    });

  });
</script>
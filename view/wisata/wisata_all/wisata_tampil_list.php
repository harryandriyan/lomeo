
<div class="page-header">
  
  <h4>Lihat Semua daftar Wisata
  <a class="btn btn-success pull-right" style="color: #fff;" href="index.php?view=wisata" role="button">
  <i class="glyphicon glyphicon-map-marker"></i> Lihat dalam Mode Map</a>

  </h4>

</div>
  <div class="row">
  <?php

  $list_sql = "select * from wisata where stat=1 order by nama asc limit 16";
  $list_qry = mysql_query($list_sql);
  while ($list_data = mysql_fetch_array($list_qry)) :
  

  ?>
    <div class="col-xs-6 col-md-3">
      <div class="thumbnail">
        <img class="img-rounded" src="admin/file/gambar/wisata/<?php echo $list_data['foto']; ?>" alt="<?php echo $list_data['nama']; ?>" />
        <div class="caption">
          <p style="font-size: 16px; color: green;"><?php echo $list_data['nama']; ?></p>
          <p><?php echo $list_data['alamat']; ?>
          </p>
          <p>
            <a href="index.php?view=wisata_tampil&id=<?php echo $list_data['id_pw']; ?>" style="color: #fff;" 
            class="btn btn-success btn-md btn-block">
            Selengkapnya</a>
          </p>

        </div>
      </div>
    </div>
  <?php endwhile; ?>
</div>
<div class="page-header">
  <?php
  $jenis = $_GET['kategori'];
  $s_judul = "select * from jen_wis where id_jen_wis = '$jenis'";
  $q_judul = mysql_query($s_judul);

  $d_judul = mysql_fetch_array($q_judul);

?>
  <h4>Lihat Wisata <?php echo $d_judul['jenis']; ?>
  <a class="btn btn-success pull-right" style="color: #fff;" 
  href="index.php?view=wisata_kategori&kategori=<?php echo $_GET['kategori']; ?>
  "  role="button">
  <i class="glyphicon glyphicon-map-marker"></i> Lihat dalam Mode Map</a>
  </h4>

</div>
  <div class="row">

  
  <?php

  $list_sql = "select * from wisata where stat=1 and id_jenis='$_GET[kategori]' order by nama asc";
  $list_qry = mysql_query($list_sql);
  while ($list_data = mysql_fetch_array($list_qry)) :
  

  ?>
    <div class="col-xs-6 col-md-4">
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


<script type="text/JavaScript">
jQuery('title').replaceWith('<title>Lomeo :: Wisata <?php echo $d_judul["jenis"]; ?></title>');
</script>
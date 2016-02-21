<?php defined('gis') or die('Tidak Boleh akses Langsung'); ?>

<?php
  
  $s_judul = "select kabupaten.id_kab, kabupaten.kabupaten, kabupaten.id_prov, provinsi.id_prov,
  provinsi.provinsi from kabupaten, provinsi where kabupaten.id_prov = provinsi.id_prov and id_kab = '$_GET[id]'";
  $q_judul = mysql_query($s_judul);
  $d_judul = mysql_fetch_array($q_judul);

?>

<div class="page-header">

  <h4>Tempat Wisata di <?php echo $d_judul['kabupaten']; ?>, <?php echo $d_judul['provinsi']; ?>
  <a class="btn btn-success pull-right" style="color: #fff;" 
  href="index.php?view=wisata_pilih&id=<?php echo $_GET['id']; ?>
  "  role="button">
  <i class="glyphicon glyphicon-map-marker"></i> Lihat dalam Mode Map</a>
  </h4>

</div>
  <div class="row">

  
  <?php
  
  $swisata = "select * from wisata where id_kab = '$_GET[id]'";
  $qwisata = mysql_query($swisata);
  while ($dwisata=mysql_fetch_array($qwisata)) :

?>
    <div class="col-xs-6 col-md-4">
      <div class="thumbnail">
        <img class="img-rounded" src="admin/file/gambar/wisata/<?php echo $dwisata['foto']; ?>" alt="<?php echo $dwisata['nama']; ?>" />
        <div class="caption">
          <p style="font-size: 16px; color: green;"><?php echo $dwisata['nama']; ?></p>
          <p><?php echo $dwisata['alamat']; ?>
          </p>
          <p>
            <a href="index.php?view=wisata_tampil&id=<?php echo $dwisata['id_pw']; ?>" style="color: #fff;" 
            class="btn btn-success btn-md btn-block">
            Selengkapnya</a>
          </p>

        </div>
      </div>
    </div>

  <?php endwhile; ?>
</div>


<script type="text/JavaScript">
jQuery('title').replaceWith('<title>Lomeo :: Wisata di <?php echo $d_judul["kabupaten"]; ?>, <?php echo $d_judul["provinsi"]; ?></title>');
</script>
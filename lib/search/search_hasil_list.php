<?php defined('gis') or die('Tidak Boleh akses Langsung'); ?>

<div id="wrap">
		    			
		    		<div id="side">
		    		
		    		<?php include_once 'inc/side/side_user.php';?>

		    		</div>
		    			
		    		<div id="data">
		    		<?php include_once 'lib/search/search_form.php';?>
		    		<div class="page-header">
  					<?php
						  $q = addslashes(strip_tags ($_POST['q'])); ?>
					<?php

						  $q = addslashes(strip_tags ($_POST['q'])); 
						  
						  $jml_sql = "select * from wisata where nama like '%$q%' or alamat like '%$q%' and stat=1 order by nama";
						  $jml_qry = mysql_query($jml_sql); 
						  $jml_data = mysql_num_rows($jml_qry);
						  
						  ?>
						  
						  <?php if($jml_data !=0): ?>

						  <h4>Hasil Pencarian dengan kata kunci 
						  <font style="color: green; font-weight: bold;"><?php echo $q; ?></font> 
						  terdapat <?php echo $jml_data; ?> hasil</h4>
						<?php else: ?>
							<h4>Tidak ada hasil, untuk pencarian dengan kata kunci 
						  <font style="color: green; font-weight: bold;"><?php echo $q; ?></font> 
						  </h4>
						<?php endif; ?>

						</div>
						  <div class="row">
						  <?php

						  $q = addslashes(strip_tags ($_POST['q']));; 
						  
						  $list_sql = "select * from wisata where nama like '%$q%' or alamat like '%$q%' and stat=1 order by nama";
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

						

					</div>	
		    		<div class="clear">
		    		</div>
    		
</div>



<script type="text/JavaScript">
jQuery('title').replaceWith('<title>Lomeo :: <?php echo addslashes(strip_tags ($_POST["q"])); ?></title>');
</script>


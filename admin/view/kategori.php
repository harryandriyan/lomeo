
<?php
	defined('gis') or die('Tidak Boleh akses Langsung');
?>
<div id="wrap">
		    			
		    			<div id="side">
		    				<?php include_once 'inc/side/side_admin.php';?>
		    			</div>
		    			
		    			<div id="data">

		    			<h3>Manajemen Data Kategori Wisata <a href="index.php?view=add_kat" class="btn btn-success">
		    			<div class="glyphicon glyphicon-floppy-save" style="font-family: sans-serif;"> Tambahkan Data</div>
		    			</a></h3>
			    			<!-- TABEL GAN -->
				    		<table class="table table-striped table-bordered table-hover">
						      <thead>
						        <tr>
						          <th>No</th>
						          <th>ID</th>
						          <th>Kategori </th>
						          <th>Keterangan</th>
						          <th>Aksi</th>
						        </tr>
						      </thead>
						      <tbody>
						      	<?php 

						      	$batas = 5;
						      	$hal = $_GET['hal'];
						      	$posisi = null;
						      	if(empty($hal)) {
						      		$hal =1;
						      		$posisi=0;
						      	} else {
						      		$posisi = ($hal-1)*$batas;
						      	}

						        $no =1;
						        $dsql = "select * from jen_wis order by id_jen_wis asc limit $posisi, $batas";
						        $hsql = "select * from jen_wis";
						        $dqry = mysql_query($dsql);
						        
						        while($ddata = mysql_fetch_array($dqry)):

						        ?>
						        <tr>
						        
						          <td><?php echo $posisi+$no++; ?></td>
						          <td><?php echo $ddata['id_jen_wis']; ?></td>				          
						          <td><?php echo $ddata['jenis']; ?></td>
						          <td><?php echo $ddata['keterangan']; ?></td>
						          <td>
						          	
						          <a class="btn btn-danger" onclick="return confirm ('Apakah anda yakin akan meghapus data ini');" 
						          title="Hapus Data" href="index.php?view=delete_kat&id=<?php echo $ddata['id_jen_wis']; ?>">
						          <div class="glyphicon glyphicon-floppy-remove"></div>
						          </a>
						          <a class="btn btn-info" title="Edit Data" href="index.php?view=edit_kat&id=<?php echo $ddata['id_jen_wis']; ?>">
						          <div class="glyphicon glyphicon-edit"></div>
						          </a>

						          </td>
						        </tr>
						        <?php endwhile; ?>
						       </tbody>
						    </table>
						    <?php
						    $hqry=mysql_query($hsql);

							$jml=mysql_num_rows($hqry);
							$jml_hal=ceil($jml/$batas);
							?>
							<div align="center">
								
							<ul class="pagination">

							<?php
							for($i=1;$i<=$jml_hal;$i++):

							?>

							<li>
								
								<a href="index.php?view=kategori&hal=<?php echo $i; ?>"><?php echo $i; ?></a>

							</li>

							<?php endfor; ?>

							</ul>

							</div>

						    <div class="alert alert-success">Jumlah Data Kategori : <?php echo $jml; ?>  </div>
			    			</div>
		    			<div class="clear">
		    		</div>
    		
</div>

<?php
	defined('gis') or die('Tidak Boleh akses Langsung');
?>
<div id="wrap">
		    			
		    			<div id="side">
		    				<?php include_once 'inc/side/side_admin.php';?>
		    			</div>
		    			
		    			<div id="data">
			    		<h3>Manajemen Pesan Kontak </h3>
			    			<!-- TABEL GAN -->
				    		<table class="table table-striped table-bordered table-hover">
						      <thead>
						        <tr>
						          <th>No</th>
						          <th>Nama</th>
						          <th>Email</th>
						          <th>Tanggal</th>
						          <th>Aksi</th>

						        </tr>
						      </thead>
						      <tbody>
						      	<?php 

						      	$batas = 8;
						      	$hal = $_GET['hal'];
						      	$posisi = null;
						      	if(empty($hal)) {
						      		$hal =1;
						      		$posisi=0;
						      	} else {
						      		$posisi = ($hal-1)*$batas;
						      	}

						        $no =1;
						        $dsql = "select * from kontak order by id_kontak desc limit $posisi, $batas";
						        $hsql = "select * from kontak";
						        $dqry = mysql_query($dsql);
						        while($ddata = mysql_fetch_array($dqry)):

						        ?>
						        <tr>
						        
						          <td><?php echo $posisi+$no++; ?></td>
						          <td><?php echo $ddata['nama']; ?></td>
						          <td><?php echo $ddata['email']; ?></td>
						          <td><?php echo $ddata['tanggal']; ?></td>
						          <td>
						          	
						          <a class="btn btn-danger" onclick="return confirm ('Apakah anda yakin akan meghapus data ini');" 
						          title="Hapus Data" href="index.php?view=delete_pesan&id=<?php echo $ddata['id_kontak']; ?>">
						          <div class="glyphicon glyphicon-floppy-remove"></div>
						          </a>
						          <a class="btn btn-info" title="Edit Data Data" href="index.php?view=edit_pesan&id=<?php echo $ddata['id_kontak']; ?>">
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
								
								<a href="index.php?view=kontak&hal=<?php echo $i; ?>"><?php echo $i; ?></a>

							</li>

							<?php endfor; ?>

							</ul>

							</div>

						    <div class="alert alert-success">Jumlah Data Kontak : <?php echo $jml; ?> 
			    			</div>
			    			</div>
		    			<div class="clear">
		    		</div>
    		
</div>
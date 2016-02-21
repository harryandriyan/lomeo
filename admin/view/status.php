<?php
	defined('gis') or die('Tidak Boleh akses Langsung');
?>

<div id="wrap">
		    			
		    			<div id="side">
		    				<?php include_once 'inc/side/side_admin.php';?>
		    			</div>
		    			
		    			<div id="data">

		    			<h3>Manajemen Data Status </h3>
			    			<!-- TABEL GAN -->
				    		<table class="table table-striped table-bordered table-hover">
						      <thead>
						        <tr>
						          <th>No</th>
						          <th>User</th>
						          <th>Status</th>
						          
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
						        $dsql = "select status.id_status, status.status, status.id_user, pengguna.id_user, pengguna.nama 
						        from status, pengguna where status.id_user=pengguna.id_user order by id_status desc limit 
						        $posisi, $batas";
						        $dqry = mysql_query($dsql);

						        $hsql = "select status.id_status, status.status, status.id_user, pengguna.id_user, pengguna.nama 
						        from status, pengguna where status.id_user=pengguna.id_user order by id_status";

						        while($ddata = mysql_fetch_array($dqry)):

						        ?>
						        <tr>
						        
						          <td><?php echo $posisi+$no++; ?></td>
						          <td><?php echo $ddata['nama']; ?></td>
						          <td><?php echo substr($ddata['status'], 0, 45); ?> .... </td>
						          
						          <td>
						          	
						          <a class="btn btn-danger" onclick="return confirm ('Apakah anda yakin akan meghapus data ini');" 
						          title="Hapus Data" href="index.php?view=delete_status&id=<?php echo $ddata['id_status']; ?>">
						          <div class="glyphicon glyphicon-floppy-remove"></div>
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
								
								<a href="index.php?view=status&hal=<?php echo $i; ?>"><?php echo $i; ?></a>

							</li>

							<?php endfor; ?>

							</ul>

							</div>

						    <div class="alert alert-success">Jumlah Data : <?php echo $jml; ?></div>

			    			</div>
		    			<div class="clear">
		    		</div>
    		
</div>
<?php
	defined('gis') or die('Tidak Boleh akses Langsung');
?>

<div id="wrap">
		    			
		    			<div id="side">
		    				<?php include_once 'inc/side/side_admin.php';?>
		    			</div>
		    			
		    			<div id="data">
			    		<h3>Manajemen User App</h3>
			    			<!-- TABEL GAN -->
				    		<table class="table table-striped table-bordered table-hover">
						      <thead>
						        <tr>
						          <th>No</th>
						          <th>Nama</th>
						          <th>Email</th>
						          <th>Kelamin</th>
						          
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
						        $dsql = "select * from pengguna order by nama asc limit $posisi, $batas";
						        $dqry = mysql_query($dsql);
						        $hsql = "select * from pengguna";

						        while($ddata = mysql_fetch_array($dqry)):

						        ?>
						        <tr>
						        
						          <td><?php echo $posisi+$no++; ?></td>
						          <td><?php echo $ddata['nama']; ?></td>
						          <td><?php echo $ddata['email']; ?></td>
						          <td><?php echo $ddata['kelamin']; ?></td>
						          
						          <td>
						          	
						          <a class="btn btn-danger" onclick="return confirm ('Apakah anda yakin akan meghapus data ini');" 
						          title="Hapus Data" href="index.php?view=delete_user&id=<?php echo $ddata['id_user']; ?>">
						          <div class="glyphicon glyphicon-floppy-remove"></div>
						          </a>
						          <a class="btn btn-info" title="Edit Data Data" href="index.php?view=edit_user&id=<?php echo $ddata['id_user']; ?>">
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
								
								<a href="index.php?view=user&hal=<?php echo $i; ?>"><?php echo $i; ?></a>

							</li>

							<?php endfor; ?>

							</ul>

							</div>

						    <div class="alert alert-success">Jumlah User : <?php echo $jml; ?> Orang </div>
			    			</div>
		    			<div class="clear">
		    		</div>
    		
</div>
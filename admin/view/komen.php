<?php
	defined('gis') or die('Tidak Boleh akses Langsung');
?>

<div id="wrap">
		    			
		    			<div id="side">
		    				<?php include_once 'inc/side/side_admin.php';?>
		    			</div>
		    			
		    			<div id="data">

		    			<h3>Manajemen Data Ulasan </h3>
			    			<!-- TABEL GAN -->
				    		<table class="table table-striped table-bordered table-hover">
						      <thead>
						        <tr>
						          <th>No</th>
						          <th>User</th>
						          <th>Komentar</th>
						          <th>Wisata</th>
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
						        $ksql = "select komentar.id_komen, komentar.id_pw, komentar.komentar, komentar.id_user, pengguna.id_user, pengguna.nama,
						        wisata.id_pw, wisata.nama as wisata_nama
						        from komentar, pengguna, wisata where komentar.id_user=pengguna.id_user and komentar.id_pw = wisata.id_pw
						         order by id_komen desc limit $posisi, $batas";

						        $hsql = "select komentar.id_komen, komentar.id_pw, komentar.komentar, komentar.id_user, pengguna.id_user, pengguna.nama,
						        wisata.id_pw, wisata.nama as wisata_nama
						        from komentar, pengguna, wisata where komentar.id_user=pengguna.id_user and komentar.id_pw = wisata.id_pw
						         order by id_komen desc";

						        $kqry = mysql_query($ksql);
						        
						        while($kdata = mysql_fetch_array($kqry)):

						        ?>
						        <tr>
						        
						          <td><?php echo $posisi+$no++; ?></td>
						          <td><?php echo $kdata['nama']; ?></td>
						          <td><?php echo $kdata['komentar']; ?></td>
						          <td><?php echo $kdata['wisata_nama']; ?></td>
						          
						          <td>
						          	
						          <a class="btn btn-danger" onclick="return confirm ('Apakah anda yakin akan meghapus data ini');" title="Hapus Data" href="index.php?view=delete_komentar&id=<?php echo $kdata['id_komen']; ?>">
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
								
								<a href="index.php?view=komentar&hal=<?php echo $i; ?>"><?php echo $i; ?></a>

							</li>

							<?php endfor; ?>

							</ul>

							</div>

						    <div class="alert alert-success">Jumlah User : <?php echo $jml; ?> Data </div>


						    </div>
		    			<div class="clear">
		    		</div>
    		
</div>
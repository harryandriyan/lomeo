
<?php
	defined('gis') or die('Tidak Boleh akses Langsung');
?>
<div id="wrap">
		    			
		    			<div id="side">
		    				<?php include_once 'inc/side/side_admin.php';?>
		    			</div>
		    			
		    			<div id="data">

		    			<h3>Manajemen Data Lokasi Wisata <a href="index.php?view=add_wisata" class="btn btn-success">
		    			<div class="glyphicon glyphicon-floppy-save" style="font-family: sans-serif;"> Tambahkan Data</div>
		    			</a></h3>
			    			<!-- TABEL GAN -->
				    		<table class="table table-striped table-bordered table-hover">
						      <thead>
						        <tr>
						          <th>No</th>
						          <th>Nama</th>
						          <th>Kategori</th>
						          <th>Alamat</th>
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
						        $dsql = "select wisata.id_pw, wisata.nama, wisata.id_jenis, wisata.alamat, wisata.lat, wisata.lang,
						        wisata.prov, wisata.id_kab, wisata.foto, wisata.stat, kabupaten.id_kab, kabupaten.kabupaten, jen_wis.id_jen_wis,
						        jen_wis.jenis from wisata, kabupaten, jen_wis
						        where wisata.id_kab = kabupaten.id_kab and wisata.id_jenis = jen_wis.id_jen_wis order by nama asc 
						        limit $posisi, $batas";

						        $hsql = "select wisata.id_pw, wisata.nama, wisata.id_jenis, wisata.alamat, wisata.lat, wisata.lang,
						        wisata.prov, wisata.id_kab, wisata.foto, wisata.stat, kabupaten.id_kab, kabupaten.kabupaten, jen_wis.id_jen_wis,
						        jen_wis.jenis from wisata, kabupaten, jen_wis
						        where wisata.id_kab = kabupaten.id_kab and wisata.id_jenis = jen_wis.id_jen_wis order by nama asc";

						        $dqry = mysql_query($dsql);
						        
						        while($ddata = mysql_fetch_array($dqry)):

						        ?>
						        <tr title="<?php echo $ddata['nama']; ?>, <?php echo $ddata['alamat']; ?>">
						        
						          <td><?php echo $posisi+$no++; ?></td>
						          <td><?php echo $ddata['nama']; ?></td>				          
						          <td><?php echo $ddata['jenis']; ?></td>
						          <td><?php echo $ddata['alamat']; ?></td>
						          <td>
						          	
						          <a class="btn btn-danger" onclick="return confirm ('Apakah anda yakin akan meghapus data ini');" 
						          title="Hapus Data" href="index.php?view=delete_wisata&id=<?php echo $ddata['id_pw']; ?>">
						          <div class="glyphicon glyphicon-floppy-remove"></div>
						          </a>
						          <a class="btn btn-info" title="Edit Data Data" href="index.php?view=edit_wisata&id=<?php echo $ddata['id_pw']; ?>">
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
							for ($i=1; $i<=$jml_hal; $i++) : 
							?>

							<li><a href="index.php?view=pariwisata&hal=<?php echo $i; ?>">
							<?php echo $i; ?>
							</a></li>

							<?php endfor; ?>

							</ul>

							</div>

						    <div class="alert alert-success"> Jumlah Data : <?php echo $jml; ?> </div>

			    			</div>
		    			<div class="clear">
		    		</div>
    		
</div>
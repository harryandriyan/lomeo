<?php
	defined('gis') or die('Tidak Boleh akses Langsung');
?>
			<div class="panel panel-success">
			  <!-- Default panel contents -->
			  <div class="panel-heading">
			  <h4><i class="glyphicon glyphicon-map-marker"></i> Kategori Wisata</h4>
			  </div>
			  <ul class="list-group">
			  <?php
						$katobj_sql = "select * from jen_wis order by jenis asc";
						$katobj_qry = mysql_query($katobj_sql);
						while ($katobj=mysql_fetch_array($katobj_qry)) :
												

			  ?>
			    <li class="list-group-item">
			    	
			    	<a href="index.php?view=wisata_kategori&kategori=<?php echo $katobj['id_jen_wis']; ?>" 
			    	style="color: #3c763d; font-size: 13px; padding-right: 50px;"> 
					<div class="<?php echo $katobj['icon']; ?>"></div> <?php echo $katobj['jenis']; ?></a>

			    </li>
			    <?php endwhile; ?>
			  </ul>
			</div>

			<div class="panel panel-success">
			  <!-- Default panel contents -->
			  <div class="panel-heading">
			  <h4><i class="glyphicon glyphicon-bookmark"></i> Wisata Terdekat</h4>
			  </div>
			  <ul class="list-group">
			  <?php

						 $idusr = $_SESSION['id_user'];

						 $wisdkt_sql = "select wisata.id_pw, wisata.nama as nama, wisata.alamat as alamat, 
						 		wisata.prov, pengguna.id_user, pengguna.prov
						 		from wisata, pengguna where wisata.prov = pengguna.prov 
						 		and pengguna.id_user = '$idusr'
						 		order by wisata.id_pw limit 7";

						 $wisdkt_qry = mysql_query($wisdkt_sql);
						 while ($wisdkt = mysql_fetch_array($wisdkt_qry)) :
									 

						 ?>
			    <li class="list-group-item">
			    	
			    	<a href="index.php?view=wisata_tampil&id=<?php echo $wisdkt['id_pw']; ?>"
			    	 style="color: #3c763d; font-size: 13px; padding-right: 20px;" 
						 title="<?php echo $wisdkt['nama']; ?>, di <?php echo $wisdkt['alamat']; ?>"> 
						 <i class="fa fa-globe"></i> <?php echo substr($wisdkt['nama'], 0, 18); ?></a>


			    </li>
			    <?php endwhile; ?>
			  </ul>
			</div>

			<div class="panel panel-warning">
			  <!-- Default panel contents -->
			  <div class="panel-heading">
			  <h4><i class="fa fa-bar-chart-o fa-fw"></i> Sponsor</h4>
			  </div>
			  <ul class="list-group">
			  <li class="list-group-item">
			    	
			    <address style=" font-size: 12px;">
						  <strong>Lomeo, Inc.</strong><br>
						  Candirejo, Semin<br>
						  Gunungkidul, YK 55854<br>
						  <abbr title="Phone">P:</abbr> 0888-0642-2798
						</address>

						<address>
						  <a href="mailto:harry.andriyan@gmail.com" style="color: #AC9723; font-size: 13px;">
						  	Jadilah Sponsor Kami
						  </a>
						</address>
			    </li>
			    
			  </ul>
			</div>	
			
			<div class="panel panel-warning">
			  <!-- Default panel contents -->
			  <div class="panel-heading">
			  <h4><i class="glyphicon glyphicon-paperclip"></i> Alamat Kami</h4>
			  </div>
			  <ul class="list-group">
			  <li class="list-group-item">
			    	
			    <address style=" font-size: 12px;">
						  <strong>Lomeo, Inc.</strong><br>
						  Candirejo, Semin<br>
						  Gunungkidul, YK 55854<br>
						  <abbr title="Phone">P:</abbr> 0888-0642-2798
						</address>

						<address>
						  <strong>CEO & Founder </strong><br>
						  <a href="mailto:harry.andriyan@gmail.com" style="color: #AC9723; font-size: 13px;">Harry Andriyan Maulana</a>
						</address>
			    </li>
			    
			  </ul>
			</div>

									
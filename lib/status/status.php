<?php defined('gis') or die('Tidak Boleh akses Langsung'); ?>		    		 
			    			</a>
			    			</h3>
			    			<hr>
			    			<form action="index.php?view=up_status" role="form" method="post" enctype="multipart/form-data">
			    				<fieldset>
			    				
			    				<legend>Bagikan Pengalaman Touring Anda</legend>
			    				<img src="file/gambar/banner.png" width="710" height="260" 
			    				style="border-radius: 10px; box-shadow: 2px 2px 3px #ccc;" />
			    				<div class="form-group">
			    				<textarea name="in-status" class="form-control" id="in-status"
			    				placeholder="Halo, <?php echo $_SESSION['nama_user']; ?>, bagikan pengalaman touringmu" 
			    				required="required"></textarea>
			    				</div>

			    				<div class="form-group">							
								<select name="kab" id="kab" class="form-control" style="width: 300px;">
								<option>Dimana Anda sekarang ?</option>
			    				<?php 
			    				$kab_sql = "select * from kabupaten order by kabupaten asc";
			    				$kab_qry = mysql_query($kab_sql);
			    				while ($kab= mysql_fetch_array($kab_qry)) :
			    				?>
			    				<option value="<?php echo $kab['id_kab']; ?>"><?php echo $kab['kabupaten']; ?></option>
			    				<?php endwhile; ?>
			    				</select>


								 </div>

			    				<div class="form-group">
			    				<button type="submit" name="up-status" id="up-status" class="btn btn-success">Bagikan ke Semua Orang</button>
			    				</div>
			    				</fieldset>
			    			</form>

			    			<script language="javascript">
							//membuat document jquery
							$(document).ready(function(){
								//variable yg dibaca dengan ajax untuk di kirim
								$("#up-status").click(function(){
									var textstat = $("#in-status").val();
									var kab = $("#kab").val();

									$.post("lib/status/update_status.php", {status: textstat, kab: kab});
									$("#in-status").attr("value", "");
									return false;
								});
							});
							</script>
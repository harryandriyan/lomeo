<?php defined('gis') or die('Tidak Boleh akses Langsung'); ?>
<div id="wrap">
		    			
		    		<div id="side">
		    		<?php include_once 'inc/side/side_user.php';?>
		    		</div>
		    			
		    		<div id="data">
		    		<?php include_once "lib/search/search_form.php"; ?>
		    		<?php

		    			$id = $_SESSION['id_user'];

		    			$sql = "select * from pengguna where id_user = '$id'";
		    			$qry = mysql_query($sql);
		    			$data = mysql_fetch_array($qry);
		    			
		    			
			    	?>
			    			<h3>Halo, <?php echo $_SESSION['nama_user']; ?> 
			    			<a href="index.php?view=edit_user&id=<?php echo $data['id_user']; ?>" class="btn btn-default">
			    			<h4>Edit dan Lengkapi Profile Anda</h4>
			    			</a>
			    			</h3>
			    			<hr>
			    			<?php include_once "view/user/profil.php"; ?>
			    						    			
			    			<?php include "lib/status/status.php"; ?>
			    			<h4>Status Anda</h4>
							<hr>
			    			<div id="status-user">
			    			

			    			</div>
							

	    			</div>
	<div class="clear">
	</div>
    		
</div>

					<script language='javascript'>

						$(document).ready(function(){
							
							//load ajax message
								function loadLog(){
									var oldscrolHeight = $("#status-user").attr("scrollHeight") - 20;
									$.ajax({
										url : "lib/status/status_tampil_user.php",
										cache : false,
										success : function(html){
											$("#status-user").html(html); //load ke <div chatbox>
											var newscrollHeight = $("#status-user").attr("scrollHeight") - 20;
											if(newscrollHeight > oldscrollHeight){
												$("#status-user").animate({scrollTop: newscrollHeight}, 'normal'); //scrol otomatisnya
											}
										},
									});
								}
								setInterval (loadLog, 1000);
						});

					</script>

<script type="text/JavaScript">
jQuery('title').replaceWith('<title>Lomeo :: <?php echo $data["nama"]; ?></title>');
</script>
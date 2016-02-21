<?php defined('gis') or die('Tidak Boleh akses Langsung'); ?>
<div id="wrap">
		    			
		    		<div id="side">
		    		
		    		<?php include_once 'inc/side/side_user.php';?>

		    		</div>
		    			
		    		<div id="data">
		    			<?php include_once "lib/search/search_form.php"; ?>
		    			<?php include "lib/status/status.php"; ?>
						<h4>Status Hari Ini</h4>
						<hr>
						<div id="status">
							


						</div>

						<script language='javascript'>

						$(document).ready(function(){
							
							//load ajax message
								function loadLog(){
									var oldscrolHeight = $("#status").attr("scrollHeight") - 20;
									$.ajax({
										url : "lib/status/status_tampil.php",
										cache : false,
										success : function(html){
											$("#status").html(html); //load ke <div chatbox>
											var newscrollHeight = $("#status").attr("scrollHeight") - 20;
											if(newscrollHeight > oldscrollHeight){
												$("#status").animate({scrollTop: newscrollHeight}, 'normal'); //scrol otomatisnya
											}
										},
									});
								}
								setInterval (loadLog, 1000);
						});

						</script>

		    		</div>
		    		<div class="clear"></div>
    		
</div>
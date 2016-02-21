
<?php defined('gis') or die('Tidak Boleh akses Langsung'); ?>
<div id="wrap">
<script type="text/javascript" src="style/js/jquery.min.js"></script>		    			
		    		<div id="side">
		    		
		    		<?php include_once 'inc/side/side_user.php';?>

		    		</div>
		    			
		    		<div id="data">
		    		<?php include_once 'lib/search/search_form.php';?>
				    		<?php
				    		$id = $_SESSION['id_user'];
				    		$sql = "select id_user, nama from pengguna where id_user = '$id'";
				    		$qry = mysql_query($sql);
				    		$nama = mysql_fetch_array($qry);

				    		?>
				    		<h3>Halo, <?php echo $nama['nama']; ?>, Selamat datang di Chat Bareng-Bareng :)</h3>


				    		<div id="chat">
				    			
				    		<div id="left">
				    		<div id="chatbox">
				    		<?php include_once "lib/chat/chat_box.php"; ?>
				    		</div>
				    			<form name="message" action="">
				    			<div class="input-group">
								 <input type="text" style="height: 42px;" name="message-input" id="message-input" class="form-control input-md"
								 placeholder="ketikan pesan chatting . . ." maxlength="60" />
								 <span class="input-group-btn">
                                    <button class="btn btn-success btn-md" style="height: 42px; margin-top: 7px;" id="message-submit">
                                        <i class="fa fa-comment fa-fw" style="font-size: 17px;"></i>
                                    </button>
                                </span>
								 </div>
								</form>

							</div>


				    		<div id="right">
				    		<h5>User Online</h5>
					    		<div id="useron">
					    		<?php include_once "lib/chat/user_online.php"; ?>
					    		</div>
				    		</div>
				    		

				    		<!--ajax dimulai dari sini-->
							<script language='javascript'>
							//membuat document jquery
							$(document).ready(function(){
								//variable yg dibaca dengan ajax untuk di kirim
								$("#message-submit").click(function(){
									var clientmsg = $("#message-input").val();
									$.post("lib/chat/chat_post.php", {text: clientmsg});
									$("#message-input").attr("value", "");
									return false;
								});
								//load ajax message
								function loadLog(){
									var oldscrolHeight = $("#chatbox").attr("scrollHeight") - 20;
									$.ajax({
										url : "lib/chat/chat_box.php",
										cache : false,
										success : function(html){
											$("#chatbox").html(html); //load ke <div chatbox>
											var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
											if(newscrollHeight > oldscrollHeight){
												$("#chatbox").animate({scrollTop: newscrollHeight}, 'normal'); //scrol otomatisnya
											}
										},
									});
								}
								function loadlog(){
									var oldscrolHeight = $("#useron").attr("scrollHeight") - 20;
									$.ajax({
										url : "lib/chat/user_online.php",
										cache : false,
										success : function(html){
											$("#useron").html(html); //load ke <div chatbox>
											var newscrollHeight = $("#useron").attr("scrollHeight") - 20;
											if(newscrollHeight > oldscrollHeight){
												$("#useron").animate({scrollTop: newscrollHeight}, 'normal'); //scrol otomatisnya
											}
										},
									});
								}
								
								setInterval (loadLog, 1000);
								setInterval (loadlog, 1000);
							});
							</script>

				    		</div>
				    	<div class="clear"></div>

			    	</div>

		    		<div class="clear"></div>
    		
</div>

<script type="text/JavaScript">
jQuery('title').replaceWith('<title>Lomeo :: Chat</title>');
</script>
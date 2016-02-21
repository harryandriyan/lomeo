<body>
<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<a href="index.php?view=home" style="color: #80b12c;" class="navbar-brand" title="GIS APP :: Sistem Informasi Bencana Alam"> 
			<div class="glyphicon glyphicon-leaf"></div> Lomeo</a>
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
				<span class="glyphicon glyphicon-align-justify"></span>
			</button>
<!--menu header-->
			<div class="collapse navbar-collapse navHeaderCollapse">
					<ul class="nav navbar-nav navbar-right">
						
						<li><a href="index.php?view=home" style="color: #80b12c" title="Lihat status Terbaru" id="place-tooltip">
						<div class="glyphicon glyphicon-home"></div>
						</a></li>
						<li><a href="index.php?view=wisata" style="color: #80b12c" title="Lihat Tempat Wisata" id="place-tooltip">
						<div class="glyphicon glyphicon-map-marker"></div>
						</a></li>
						<li><a href="index.php?view=chat" style="color: #80b12c" title="Halaman Untuk Chating" id="place-tooltip">
						<div class="fa fa-comments fa-fw"></div>
						</a></li>
						<li><a href="index.php?view=user" style="color: #80b12c;" title="Edit Profile " id="place-tooltip">
						<div class="fa fa-user fa-fw"></div><span style="font-size: 12px;">
						<?php

						$id = $_SESSION['id_user'];
						$sql = "select * from pengguna where id_user = '$id'";
						$qry = mysql_query($sql);
						$nama = mysql_fetch_array($qry);
						?>

						<?php echo $nama['nama']; ?>
						</span>
						
						</a></li>
						
						
						<li><a href="index.php?view=kontak" style="color: #AC9723;" title="Kirim Pesan ke Kami" id="place-tooltip">
						<div class="fa fa-envelope fa-fw"></div>
						</a></li>

						<li><a href="index.php?view=signout" style="color: red;" title="Sign Out" id="place-tooltip">
						<div class="glyphicon glyphicon-off"></div>
						
						</a>

						</ul>
			</div>
		</div>
	</div>
	
	<div id="content">
	
	<?php include_once 'module.php'; ?>
	
	</div>

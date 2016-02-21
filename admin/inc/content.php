<?php
	defined('gis') or die('Tidak Boleh akses Langsung');
?>

<body>
<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<a href="index.php" class="navbar-brand" title="GIS APP :: ADministrator" style="color: #80b12c;"> 
			<div class="glyphicon glyphicon-leaf"></div> Lomeo :: Administrator</a>
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
				<span class="glyphicon glyphicon-align-justify"></span>
			</button>
<!--menu header-->
			<div class="collapse navbar-collapse navHeaderCollapse">
					<ul class="nav navbar-nav navbar-right">
						
						<li><a href="index.php?view=admin" style="color: #086e96;" title="Edit data Anda Min" id="place-tooltip"><div class="glyphicon glyphicon-user"></div>
						<span>Profile</span>
						</a></li>
						<li><a href="index.php?view=signout" style="color: red;" title="Sign Out" id="place-tooltip"><div class="glyphicon glyphicon-off"></div>
						<span>Logout</span>
						</a></li>
						</ul>
			</div>
		</div>
	</div>
	
	<div id="content">
				
	<?php include_once 'module.php'; ?>
	
	</div>

<?php include_once "config/connect.php"; ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
    	<meta name="author" content="">
    	
		<title>Lomeo:: Cari Tempat Favoritmu</title>
		
		<link href="style/css/bootstrap.css" rel="stylesheet" />
		<link href="style/css/gis.css" rel="stylesheet" />		
		<script type="text/javascript" src="style/js/bootstrap.js"></script>
		<script type="text/javascript" src="style/js/jquery-1.10.2.js"></script>
		<link rel="icon" type="image/png" href="file/gambar/ico/favicon.png" />
	</head>

	
	<body>
	<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
	<div class="container"> 
      <a href="index.php" class="navbar-brand" style="color: #80b12c;"> 
			<div class="glyphicon glyphicon-leaf"></div> Lomeo</a>
	  <a href="admin/landing.php" id="admin" title="Login admin" class="navbar-btn btn-success btn-md active btn pull-right">Admin Login Page</a>
     </div>
    </nav>
    
    <div class="container">
    
    	<div class="jumbotron hero-spacer">
    		<h2>Selamat Datang di Lomeo Social Tourism :)</h2>
    		<div id="landing">
    			
    			<div id="area">
    				

    				
    			</div>
    			
    			<div id="sign">
	    			<form action="lib/signin.php" method="post">
	    				<fieldset>
	    				
	    				<legend>Masuk Disini </legend>
	    				
	    				<input type="text" id="email" name="email" placeholder=" Email " class="form-control" required required pattern=".+@.+." autofocus />
	    				<input type="password" id="pass" name="pass" placeholder=" Password " class="form-control" required />
	    				
	    				<button type="submit" name="signin" class="btn btn-info">Masuk</button>
	    				</fieldset>
	    			</form>
	    			
	    			
	    			
	    			<form action="lib/reg.php" method="post">
	    				<fieldset>
	    				
	    				<legend>Belum punya akun ? Daftar Disini</legend>
	    				<input type="text" id="name" name="nama" placeholder="Masukkan Nama" class="form-control" required />
	    				<input type="text" id="email" name="email" placeholder="Masukkan Email " class="form-control" required pattern=".+@.+." required />
	    				<input type="password" id="pass" name="pass" placeholder="Masukkan Password " class="form-control" required />
	    				<input type="password" id="repass" name="repass" placeholder="Tulis ulang Password" class="form-control" required />
	    				<select id="kel" class="form-control" name="kel">
	    				
	    				<option value="laki-laki">Laki-Laki</option>
	    				<option value="perempuan">Perempuan</option>
	    				</select>
	    				<?php $rand = rand(000000,999999); ?>
	    				<code><?php echo $rand; ?></code>
	    				<input type="text" name="code" class="form-control" style="width:150px;" placeholder="masukan kode" required="required" />
	    				<input type="hidden" name="rcode" value="<?php echo $rand; ?>" />

	    				<button type="submit" name="signip" class="btn btn-success">Daftar Sekarang</button>
	    				<button type="reset" name="reset" class="btn btn-warning">Hapus data</button>
	    				</fieldset>
	    			</form>
    			</div>
    			<div class="clear"></div>
    		</div>
    	    	
    		</div>
    		   	
    
    </div>
	</body>
	
</html>
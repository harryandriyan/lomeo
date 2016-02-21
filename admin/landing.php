<?php include_once "../config/connect.php"; ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
    	<meta name="author" content="">
    	
		<title>Lomeo :: Administrator</title>
		
		<link href="style/css/bootstrap.css" rel="stylesheet" />
		<link href="style/css/gis.css" rel="stylesheet" />
		<link href="style/css/sb-admin.css" rel="stylesheet">		
		<script type="text/javascript" src="style/js/bootstrap.js"></script>
		<script type="text/javascript" src="style/js/jquery-1.10.2.js"></script>
		<link rel="icon" type="image/png" href="file/gambar/ico/favicon.png" />
	</head>

	
	<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" align="center">Lomeo :: Administrator Login</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="lib/signin.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Unmae" name="uname" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="pass" type="password" value="">
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-md btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

</body>

</html>
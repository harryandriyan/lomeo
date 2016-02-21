<?php

$file1 = "config/connect.php";
$file2 = "../../config/connect.php";

if(file_exists($file1)) {
	require_once $file1;
} else {
	require_once $file2;
}
?>
						<ul class="list-group">
				    		<!--User Online-->
					    		<?php

					    		$on_sql = "select * from pengguna where status = 1";
					    		$on_qry = mysql_query($on_sql);
					    		while ($on = mysql_fetch_array($on_qry)) : 

					    		?>
					    		
					    			
									  <li class="list-group-item" style="background-color: #ffffee;">
									  <img src="admin/file/gambar/user/<?php echo $on['email']; ?>/<?php echo $on['foto']; ?>" 
									  width="40" height="40" />
									  
									  <span style="color: #14D100; background-color: #fff;" class="badge">
									  <i class="glyphicon glyphicon-refresh" style="font-size: 18px;"></i></span>
									  <a href="index.php?view=view_user&id=<?php echo $on['id_user']; ?>"><?php echo $on['nama']; ?>
									  </a>
									  
									  </li>
									


					    		<?php endwhile; ?>
				    		</ul>
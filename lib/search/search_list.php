<?php

require_once "config/connect.php";

$ssql = "select nama, alamat from wisata where nama like '%q%' or alamat like '%q%'";
$sqry = mysql_query($ssql);

while($sdata=mysql_fetch_array($sqry)) :
?>

<ul class="list-unstyled">
	
<li><?php echo $sdata['nama']; ?></li>

</ul>

<?php endwhile; ?>
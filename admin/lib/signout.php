<?php


unset($_SESSION['id_admin']);
unset($_SESSION['uname_admin']);
unset($_SESSION['pass_admin']);

echo "<script>alert('Anda berhasil Sign Out Min');</script>";
echo "<script>document.location.href='landing.php';</script>";
 
?>
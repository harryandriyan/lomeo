<?php 

require_once("../../config/connect.php");

$id = isset($_GET['id'])?(int)$_GET['id']:die;

$perintah = "select * from kabupaten where id_prov = '$id'";

$query = mysql_query($perintah);

?>

<select name="kab" class="form-control">

<?php while($data = mysql_fetch_array($query)): ?>

	<option value="<?php echo $data['id_kab']; ?>"><?php echo $data['kabupaten']; ?></option>
<?php endwhile; ?>

</select>



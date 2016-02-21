<?php defined('gis') or die('Tidak Boleh akses Langsung'); ?>
<div id="wrap">
		    			
		    	<div id="side"><?php include_once'inc/side/side_user.php'; ?></div>
		    			
		    		<div id="data">
		    		<?php include_once "lib/search/search_form.php"; ?>
		    		
		    		<!--mode page start -->
		    		<?php if(!isset($_GET['mod'])): ?>

		    		<?php include_once "view/wisata/wisata_all/wisata_tampil_map.php"; ?>
					
		    		<?php else: ?>

		    		<?php include_once "view/wisata/wisata_all/wisata_tampil_list.php"; ?>

		    		<?php endif; ?>



		    		</div>



	<div class="clear">
	</div>
    		
</div>

<script type="text/JavaScript">
jQuery('title').replaceWith('<title>Lomeo :: Daftar Semua Wisata </title>');
</script>
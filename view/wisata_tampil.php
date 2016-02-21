<?php defined('gis') or die('Tidak Boleh akses Langsung'); ?>
<div id="wrap">
		    			
		    	<div id="side"><?php include_once'inc/side/side_user.php'; ?></div>
		    			
		    		<div id="data">
		    		<?php include_once "lib/search/search_form.php"; ?>
		    		<!--mode page start -->
		    		<?php if(!isset($_GET['mod'])): ?>

		    		<?php include_once "view/wisata/wisata_satu/wisata_satu_map.php"; ?>
					
		    		<?php else: ?>

		    		<?php include_once "view/wisata/wisata_satu/wisata_satu_wisata.php"; ?>

		    		<?php endif; ?>
		    		</div>



	<div class="clear">
	</div>
    		
</div>
<?php rx_setTitle("acm@thebeach - Home"); ?>
<?php includePart("base", "documentTop"); ?>
    <?php includePart("base", "header"); ?>
    <?php includePart("index", "splash"); ?>

    <div class="main-content container_12">
    	<div class="grid_6">
    		<?php echo includePart("index", "feed");  ?>
    	</div>
    	
    	<div class="grid_3">
    		<?php echo includePart("index", "column_2");  ?>
    	</div>
    	
    	<div class="grid_3">
    		<?php echo includePart("index", "column_3");  ?>
    	</div>
    	<!---	
		<?php echo rx_getStaticPart("index", "left_sidebar");  ?>
		<?php echo rx_getStaticPart("index", "right_sidebar");  ?>
		--->
    </div>
<?php includePart("base", "documentBottom"); ?>
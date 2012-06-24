<?php rx_setTitle("acm@thebeach - Home"); ?>
<?php includePart("base", "documentTop"); ?>

    <?php includePart("base", "header"); ?>
    <?php includePart("index", "splash"); ?>

    <div class="main-content container_12">
    	
    	
    	    	
        <div class="grid_8" style="margin:0; width:640px;">

        		<?php echo rx_getStaticPart("index", "left_sidebar");  ?>
        		</div>

		<div class="grid_4 news">
			<?php echo rx_getStaticPart("index", "right_sidebar");  ?>
		</div>
		
    </div>
<?php includePart("base", "documentBottom"); ?>
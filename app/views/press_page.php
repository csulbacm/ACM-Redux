<?php include_once("./app/redux.php"); ?>

<?php $title = rx_getData('title'); ?>

<?php rx_pushCSS(rx_getData('page-css')); ?>
<?php rx_pushJS(rx_getData('page-js')); ?>

<?php rx_setTitle("acm@thebeach - " . $title); ?>

<?php includePart("base", "documentTop"); ?>
<?php includePart("base", "header"); ?>

<div class="press-page-container static-page main-content container_12">
	<div class="grid_12 content-module">
		<?php echo rx_getData("content"); ?>		
	</div>

</div>

<?php includePart("base", "documentBottom"); ?>
<?php include_once("./app/redux.php"); ?>

<?php rx_setTitle("acm@thebeach"); ?>

<?php includePart("base", "documentTop"); ?>
<?php includePart("base", "header"); ?>

<pre>
	<?php echo rx_getData("text"); ?>
</pre>

<?php includePart("base", "documentBottom"); ?>
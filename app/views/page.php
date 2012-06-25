<?php include_once("./app/redux.php"); ?>

<?php rx_setTitle("acm@thebeach - Project Pages"); ?>

<?php includePart("base", "documentTop"); ?>
<?php includePart("base", "header"); ?>

<?php echo rx_getData("content"); ?>

<?php includePart("base", "documentBottom"); ?>
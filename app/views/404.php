<?php include_once("./app/redux.php"); ?>
<?php includePart("base", "documentTop_plain"); ?>

    <?php includePart("base", "header"); ?>

    <div class="main-content">
        <div class="grid_12">
            <h2>404 - File not found</h2>
            <img src="<?php echo rx_imageURL("404.jpg") ?>" style="width:100%;"/>
            <p><br /></p>
        </div>
    </div>
<?php includePart("base", "documentBottom"); ?> 
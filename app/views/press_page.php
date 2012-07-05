<?php include_once("./app/redux.php"); ?>

<?php $pressPages = rx_getData('page-listing'); ?>

<?php rx_pushCSS(rx_getData('page-css')); ?>
<?php rx_pushJS(rx_getData('page-js')); ?>

<?php rx_setTitle("acm@thebeach - " . rx_getData('title')); ?>

<?php includePart("base", "documentTop"); ?>
<?php includePart("base", "header"); ?>

<div class="press-page-container static-page main-content container_12">
	<div class="grid_9 content-module">
		<?php echo rx_getData("content"); ?>		
	</div>

	<div class="grid_3 content-module">
      <h2>Read On</h2>
      <?php foreach($pressPages as $item): ?>
          <ul class="link-list">
            <li><a href="<?php echo rx_siteURL('press/' . $item->getSlug()); ?>">
               <?php echo $item->getTitle(); ?></a></li>
          </ul>
      <?php endforeach ?>
	</div>

</div>

<?php includePart("base", "documentBottom"); ?>
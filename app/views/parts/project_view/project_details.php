<?php $currentProject = rx_getData('project-viewing'); ?>

<div class="grid_8 project-details content-module">
    <h2 class="col-post">About <?php echo $currentProject->getName(); ?></h2>    
    <?php echo $currentProject->getPageContent(); ?>
</div>

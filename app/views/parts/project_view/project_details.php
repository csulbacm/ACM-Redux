<?php $currentProject = rx_getData('project-viewing'); ?>

<div class="project-details">
    <h2 class="col-post">About <?php echo $currentProject->getName(); ?></h2>    
    <?php echo $currentProject->getPageContent(); ?>
</div>

<?php $currentProject = rx_getData('project-viewing'); ?>
<?php rx_setTitle("acm@thebeach - " . $currentProject->getName()); ?>
<?php rx_pushCSS($currentProject->getCSS()); ?>

<?php include_once('./app/redux.php'); ?>
<?php includePart('base', 'documentTop'); ?>
   <?php includePart('base', 'header'); ?>
   <?php includePart('base', 'breadcrumb'); ?>
   <?php includePart('project_view', 'splash'); ?>

    <div class="main-content container_12">
	    <?php includePart('project_view', 'project_info'); ?>
	    <?php includePart('project_view', 'project_details'); ?>
    </div>

<?php includePart("base", "documentBottom"); ?>
<?php $currentProject = rx_getData('project-viewing'); ?>
<?php rx_setTitle("acm@thebeach - " . $currentProject->getName()); ?>

<?php
    global $defaultCSS;
    rx_setCSS(array_push($defaultCSS, $currentProject->getCSS()));
?>

<?php include_once('./app/redux.php'); ?>
<?php includePart('base', 'documentTop'); ?>
   <?php includePart('base', 'header'); ?>
   <?php includePart('base', 'breadcrumb'); ?>
   <?php includePart('project_view', 'splash'); ?>

    <div class="main-content">
        <div class="project-properties project-status-active">
            <span class="project-status-title">
                <?php echo $currentProject->getStatus(); ?> 
            </span>
            <span class="button big-button" style="float:right;">View Project Charter</span>
        </div>
	    <?php includePart('project_view', 'project_info'); ?>
	    <?php includePart('project_view', 'project_details'); ?>
    </div>

<?php includePart("base", "documentBottom"); ?>
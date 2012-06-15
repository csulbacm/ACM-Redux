<?php include_once("./app/redux.php"); ?>

<?php rx_setTitle("acm@thebeach - Project Pages"); ?>

<?php includePart("base", "documentTop"); ?>
<?php includePart("base", "header"); ?>
<?php includePart("project", "splash"); ?>
    
<div class="main-content">
    <?php // Main Prorject loop ?>
    <?php $currentProjects = rx_getData('current-projects'); ?>        
    <?php foreach($currentProjects as $project): ?>
        <div class="grid_6" style="margin:0px 10px 20px 10px">
            <h3><?php echo $project->getName(); ?></h3>
            <a href="<?php echo rx_siteURL('project-view/' . $project->getShortName()); ?>">
            <img src="<?php echo $project->getThumbURL() ?>" 
                 alt="<?php echo $project->getName(); ?>" />
            </a>
            <p><?php echo $project->getTagLine(); ?></p>
        </div>         
    <?php endforeach ?>

    <div class="grid_12"><hr /><h2>Past Projects</h2></div>
    <?php // Main Prorject loop ?>
    <?php $pastProjects = rx_getData('past-projects'); ?>        
    <?php foreach($pastProjects as $project): ?>
    <div class="grid_4">
        <h3 style="margin:0;">
        <a href="<?php echo rx_siteURL('project-view/' . $project->getShortName()); ?>">
            <img src="<?php echo $project->getThumbURL() ?>"  style="width:100%;" alt="<?php echo $project->getName(); ?>" />
        </a>
        </h3>
    </div>
    <?php endforeach ?>

    <div class="grid_12"><br/><br/></div>
</div>

<?php includePart("base", "documentBottom"); ?>
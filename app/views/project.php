<?php include_once("./app/redux.php"); ?>

<?php rx_setTitle("acm@thebeach - Project Pages"); ?>

<?php includePart("base", "documentTop"); ?>
<?php includePart("base", "header"); ?>
<?php includePart("project", "splash"); ?>
    
<div class="main-content container_12">
    <?php // Main Prorject loop ?>
    <?php $currentProjects = rx_getData('current-projects'); ?>        
    <?php foreach($currentProjects as $project): ?>
        <div class="grid_6 content-module" style="margin:0px 10px 20px 10px">
            <h2><?php echo $project->getName(); ?></h2>
            <a href="<?php echo rx_siteURL('project-view/' . $project->getShortName()); ?>">
            <img src="<?php echo $project->getThumbURL() ?>" 
                 alt="<?php echo $project->getName(); ?>" />
            </a>
            <p><?php echo $project->getTagLine(); ?></p>
        </div>         
    <?php endforeach ?>

    <?php // Main Prorject loop ?>
    <?php $pastProjects = rx_getData('past-projects'); ?>        
    <?php foreach($pastProjects as $project): ?>
    
    <div class="grid_4">
        <div class="content-module">
                <h2><?php echo $project->getName(); ?></h2>
            
            <a href="<?php echo rx_siteURL('project-view/' . $project->getShortName()); ?>">
                <img src="<?php echo $project->getThumbURL() ?>"  style="width:100%;" alt="<?php echo $project->getName(); ?>" />
            </a>
            <p><?php echo $project->getTagLine(); ?></p>

        </div>
    </div>
    <?php endforeach ?>

    <div class="grid_12"><br/><br/></div>
</div>

<?php includePart("base", "documentBottom"); ?>
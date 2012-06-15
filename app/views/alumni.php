<?php include_once("./app/redux.php"); ?>

<?php rx_setTitle("acm@thebeach - M.V.P and Alumni "); ?>

<?php includePart("base", "documentTop"); ?>
<?php includePart("base", "header"); ?>
<?php includePart("alumni", "splash"); ?>
    
<div class="main-content">
    <?php // Main Prorject loop ?>
    <?php $alumnus = rx_getData('alumni'); ?>        
    <?php foreach($alumnus as $alumni): ?>
        <div class="grid_4 person" style="margin:0px 10px 20px 10px">
            <a href="#<?php //echo rx_siteURL('project-view/' . $alumni->getShortName()); ?>">
            <h3><?php echo $alumni->getName(); ?></h3>
            <img src="<?php echo $alumni->getPhoto() ?>" 
                 alt="<?php echo $alumni->getName(); ?>" 
                 style="width:100%;"/>
            </a>
        </div>         
    <?php endforeach ?>


    <div class="grid_12"><br/><br/></div>
</div>

<?php includePart("base", "documentBottom"); ?>
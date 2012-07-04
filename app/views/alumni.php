<?php include_once("./app/redux.php"); ?>

<?php rx_setTitle("acm@thebeach - M.V.P and Alumni "); ?>

<?php includePart("base", "documentTop"); ?>
<?php includePart("base", "header"); ?>
<?php includePart("alumni", "splash"); ?>
    
<div class="main-content container_12">
    <?php // Main ALumni loop ?>
    <?php
    	// Since we don't have everyone's profile yet,
    	// we have a whitelist of valid profiles to display
    	// TODO: get more profile information from members 
    	// TODO: Remove this eventually. Written 4/25/2012
    	
    	$list = array("npickrell", "msguerri", "jliong", "rwang", "flima");
	 ?>
    
    <?php 
        $alumnus = rx_getData('alumni'); 
    ?>        

    <?php foreach($alumnus as $alumni): ?>
    	<?php $shortName = $alumni->getShortName(); ?>
    	
        <div class="grid_4 content-module alumni" style="margin:0px 10px 20px 10px">
        	
        	<?php // TODO: when we have all the data, take this out. ?>
            <h3><?php echo $alumni->getName(); ?></h3>
        	<?php if (in_array($shortName, $list)): ?>
         	   <a href="<?php echo rx_siteURL('alumni-view/' . $alumni->getShortName()); ?>">
			   <span class="click">Click to view bio</span>
         	<?php else: ?>
       		 <a href="#<?php echo $shortName; ?>">
         	<?php endif ?>
         	
            <img src="<?php echo $alumni->getPhoto() ?>" 
                 alt="<?php echo $alumni->getName(); ?>" 
                 style="width:100%;"/>
            </a>
        </div>         
    <?php endforeach ?>


    <div class="grid_12"><br/><br/></div>
</div>

<?php includePart("base", "documentBottom"); ?>
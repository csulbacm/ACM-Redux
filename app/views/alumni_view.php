<?php $profile = rx_getData('profile'); ?>
<?php rx_setTitle("acm@thebeach - " . $profile->getName()); ?>

<?php include_once('./app/redux.php'); ?>
<?php includePart('base', 'documentTop'); ?>
   <?php includePart('base', 'header'); ?>
   <?php includePart('base', 'breadcrumb'); ?>

    <div class="main-content container_12">
        <div class="grid_12">
            <br/>
        </div>
   		<div class="grid_4">
   		                <img src="<?php echo $profile->getPhoto(); ?>" alt=<?php echo $profile->getName(); ?>" style="width:100%""/>

   			<h2>
   				<?php echo $profile->getName(); ?>
   			</h2>
   			<h3>
   				"<?php echo $profile->getQuote(); ?>"
   			</h3>
   			
   			<span>
   				Years Active: <?php echo $profile->getActiveYears(); ?>
   			</span>
   		</div>
   		
   		<div class="grid_8">
			<div class="profile-content-block">
   				<h3>Please give a description of yourself and what you do.</h3>
   				<div class="content">
   					<?php echo $profile->getDescription(); ?>
   				</div>
   			</div>
            <div class="profile-content-block">
   				<h3>How did you find out about ACM?</h3>
   				<div class="content">
   					<?php echo $profile->getDiscovery(); ?>
   				</div>
   			</div>
            <div class="profile-content-block">
   				<h3>What made you join?</h3>
   				<div class="content">
   					<?php echo $profile->getMotivation(); ?>
   				</div>
   			</div>
            <div class="profile-content-block">
   				<h3>What advice would you give to new students?</h3>
   				<div class="content">
   					<?php echo $profile->getAdvice(); ?>
   				</div>
   			</div>
            <div class="profile-content-block">
   				<h3>Did you hold any officer positions or did you work on any projects for ACM?</h3>
   				<div class="content">
   					<?php echo $profile->getActivity(); ?>
   				</div>
   			</div>
            <div class="profile-content-block">
   				<h3>What will you remember the most?</h3>
   				<div class="content">
   					<?php echo $profile->getMemory(); ?>
   				</div>
   			</div>
   		</div>
    </div>

<script src="<?php echo SITEROOT; ?>/static/global/js/jquery.masonry.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">

</script>
<?php includePart("base", "documentBottom"); ?>
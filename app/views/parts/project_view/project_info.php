<?php $currentProject = rx_getData('project-viewing'); ?>

<div class="grid_4 project-info">
	<div class="content-module">
		<h2>Project Information</h2>
        <span class="label">
        	<strong>
        	Status:
        	</strong>
        	<?php echo $currentProject->getStatus(); ?> 
    	</span>
        <a href="#" class="label link">Project Charter</a>

    </div>

	<div class="content-module">
		<h2 class="col-post">Abstract</h2>
	    <?php echo $currentProject->getAbstract(); ?>
	</div>

	<div class="content-module">
	<h2 class="col-post">The Team</h2>
	<ul>
		<?php foreach($currentProject->getTeamContent() as $member): ?>
			<?php if($member !== ''): ?>
				<li><?php echo $member; ?></li>
			<?php endif ?>
		<?php endforeach ?>
	</ul>
	</div>
</div>
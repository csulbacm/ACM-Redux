<?php $currentProject = rx_getData('project-viewing'); ?>

<div class="grid_4 project-info">
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
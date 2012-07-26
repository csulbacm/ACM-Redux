<?php $minutes = rx_getData('minutes-listing'); ?>
<?php $pressPages = rx_getData('press-listing'); ?>

<div class="content-module">
    <h2>Press</h2>
    <ul class="link-list">
      <?php foreach($pressPages as $item): ?>
            <li><a href="<?php echo rx_siteURL('press/' . $item->getSlug()); ?>">
               <?php echo $item->getTitle(); ?>
           </a>
            </li>
      <?php endforeach ?>
    </ul> 
</div>

<div class="content-module">
    <h2>Meeting Protocols</h2>
    <ul class="link-list">
    	<?php foreach($minutes as $item): ?>
            <li><a href="<?php echo $item['URL']; ?>">
               <?php echo $item['date']; ?>
           </a></li>
    	<?php endforeach ?>
    </ul> 
</div>
      
<div class="content-module index-photos">
    <h2>Random Album</h2>
    <div id="photos-content">Loading</div>
</div>


<div class="content-module github">
<h2>ACM &hearts; GitHub</h2>
  <a href="http://www.github.com/davidnuon/ACM-Redux" target="_blank">
          <img src="static/global/img/github.png" alt="Github" />
  </a>
</div>
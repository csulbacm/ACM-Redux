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
    <h2>Latest Minutes</h2>
    <ul class="link-list">
    	<?php foreach($minutes as $item): ?>
            <li><a href="<?php echo $item['URL']; ?>">
               Minutes for <?php echo $item['date']; ?>
           </a></li>
    	<?php endforeach ?>
    </ul> 
</div>
      
<div class="content-module">
    <h2>Photos</h2>
    <div id="photos-content">
      
    </div>
</div>



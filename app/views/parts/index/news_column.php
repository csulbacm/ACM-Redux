<div class="grid_4 news">
    <?php // TODO : Add news display here ?>
    
    <h2 class="col-post">Latest News</h2>
    <?php $newsFeed = rx_getData('news'); ?>
    <?php foreach ($newsFeed as $feed): ?>
        <h3><?php echo $feed['name'] ?></h3>
        <p><?php  echo $feed['desc'] ?></p>
    <?php endforeach ?>

</div>

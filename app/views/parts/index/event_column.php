<div class="grid_4 event">
    <h2 class="col-post">Events</h2>
    
    <?php $eventFeed = rx_getData('fake_date'); ?>
    <?php foreach ($eventFeed as $feed): ?>
        <div class="event_post">
            <div class="date">
                <div class="day"><?php echo $feed['day']; ?></div>
                <div class="month"><?php echo $feed['month']; ?></div>
            </div>
            <h3><?php echo $feed['title'] ?></h3>
            <div class="content">
                <p><strong>Time: <?php echo $feed['time']; ?></strong></p>
                <p><strong>Location: <?php echo $feed['location']; ?></strong></p>
                <a class="button" href="#">More info</a>
                <a class="button" href="#">RSVP</a>

            </div>
        </div>
    <?php endforeach ?>

</div>
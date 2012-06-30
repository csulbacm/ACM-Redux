<?php $minutes = rx_getData('minutes-listing'); ?>
<?php $charters = rx_getData('charters'); ?>
<?php $closedCharters = rx_getData('closed-charters'); ?>

<?php rx_setTitle("acm@thebeach - Documents"); ?>


<?php includePart("base", "documentTop"); ?>

    <?php includePart("base", "header"); ?>
    <?php includePart("documents", "splash"); ?>
    
    <div class="main-content container_12">
        
        <div class="grid_6">
            <div class="content-module">
                <h2>Meeting Minutes</h2>
                <ul class="document-listing">
                	<?php foreach($minutes as $item): ?>
                        <li><a href="<?php echo $item['URL']; ?>">
                           General Meeting for <?php echo $item['date']; ?>
                       </a></li>
                	<?php endforeach ?>
                </ul> 
            </div>
        </div>

        <div class="grid_6">

            <div class="content-module">
                <h2>Project Charters</h2>
                <ul class="document-listing">
                    <?php foreach($charters as $item): ?>
                        <li><a href="<?php echo $item['url']; ?>" target="_blank">
                        <?php echo $item['name']; ?>
                       </a></li>
                    <?php endforeach ?>
                </ul>
            </div>
            
            <div class="content-module">
                <h2>Closed Project Charters</h2>
                <ul class="document-listing">
                    <?php foreach($closedCharters as $item): ?>
                        <li><a href="<?php echo $item['url']; ?>" target="_blank">
                        <?php echo $item['name']; ?>
                       </a></li>
                    <?php endforeach ?>
                </ul> 
            </div>  

        </div> <!-- grid-6 -->
    </div> <!-- grid-12 -->
<?php includePart("base", "documentBottom"); ?>
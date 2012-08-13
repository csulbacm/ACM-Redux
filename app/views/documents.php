<?php $minutes = rx_getData('minutes-listing'); ?>
<?php $charters = rx_getData('charters'); ?>

<?php rx_setTitle("acm@thebeach - Documents"); ?>
<?php includePart("base", "documentTop"); ?>

    <?php includePart("base", "header"); ?>
    <?php includePart("documents", "splash"); ?>
    
    <div class="main-content container_12">
        <div class="grid_6">
            <div class="content-module">
                <h2>Meeting Minutes</h2>
                <ul class="link-list">
                	<?php foreach($minutes as $item): ?>
                        <li><a href="<?php echo $item['URL']; ?>">
                           Minutes for <?php echo $item['date']; ?>
                       </a></li>
                	<?php endforeach ?>
                </ul> 
            </div>
        </div>

        <div class="grid_6">

            <div class="content-module">
                <h2>Charters</h2>
                <ul class="link-list">
                  <?php foreach($charters as $item): ?>
                        <li><a href="<?php echo rx_siteURL('charters/' . $item->getSlug()); ?>">
                           <?php 
                           $name = $item->getTitle(); 
                           $name = str_replace('_', ' ', $name);
                           $name = str_replace('.md', '', $name);
                           echo $name;

                           ?>
                       </a>
                        </li>
                  <?php endforeach ?>
                </ul> 
            </div>

        </div> <!-- grid-6 -->
    </div> <!-- grid-12 -->
<?php includePart("base", "documentBottom"); ?>
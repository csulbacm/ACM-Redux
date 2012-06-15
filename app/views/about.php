<?php $admin    = rx_getData('admin'); ?>
<?php $officers = rx_getData('officers'); ?>
<?php $viewingYear     = rx_getData('year'); ?>
<?php $allYears     = rx_getData('allYears'); ?>

<?php rx_setTitle("acm@thebeach - About Us"); ?>

<?php includePart("base", "documentTop"); ?>
    <?php includePart("base", "header"); ?>
   
    <div class="grid_12" id="breadcrumb">
        <strong>Select a year:</strong> &nbsp;&nbsp;&nbsp;
        <?php
         foreach ($allYears as $year) {
             if($viewingYear === $year["name"]) {
                echo '<span>' . $year["name"] . '</span>';    
             } else {
                echo '<a href="' . $year["url"] . '" > ' . $year["name"] . '</a>';
             }
             echo '&nbsp;&nbsp;&nbsp;';
         } 
        ?>
    </div>
    
    <div id="main-page-splash">
      <div class="grid_12">
        <h2>We are acm@thebeach</h2>
      </div>
    </div>

    
    <div class="main-content">
    <div class="grid_12"><h2><?php echo $viewingYear; ?> Administration</h2></div>
        <?php echo $admin; ?>
        <div class="grid_12" 
            style="border-bottom:1px solid #aaa; margin:0px 10px 20px 10px; height:1px;"></div>
            
        <?php echo $officers; ?>
    </div>
<?php includePart("base", "documentBottom"); ?>
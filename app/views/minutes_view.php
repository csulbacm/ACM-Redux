<?php
$meetingDocument = rx_getData('dir');
$dateName = rx_getData('dateName');
rx_setTitle("acm@thebeach - Minutes for " . $dateName);
?>

<?php includePart("base", "documentTop");?>

<?php includePart("base", "header");?>
<?php includePart("base", "breadcrumb");?>

<div class="main-content">
    <div class="grid_12">
        <h2>Viewing Minutes for <?php echo $dateName;?></h2>
    </div>
    <div class="grid_3" id="func">
        <h3>Meeting Documents</h3>
        <ul class="document-listing">
            <?php foreach ($meetingDocument as $document): ?>
            <li>
                <a href="<?php echo $document['url'];?>"> <?php echo $document['name'];?></a>
            </li>
            <?php endforeach?>
        </ul>
    </div>
    <div class="grid_9">
    
    <?php $minutes =  rx_getData('minutes-content'); ?>
    <?php if ($minutes != ''): ?>
        <?php echo $minutes; ?>
        <?php else: ?>
            <h3>(No minutes preview available.)</h3>
    <?php endif ?>
    </div>
</div>

<?php if ($minutes != ''): ?>
    <script type="text/javascript">
        (function() {
            var $col = document.getElementById('column_1');
            var $children = $col.childNodes;
            for($c in $children) {
                if($children[$c].setAttribute) {
                    $children[$c].setAttribute('style', '');
                }
            }
            if($col != '' || typeof($col) == typeof("")) {
                var x = document.getElementById('func');
                $("#column_1 *").attr("style", "");
                x.innerHTML += "<h2>Officers</h2>" + $col.innerHTML;
            }
        })();
        
    </script>
<?php endif ?>
<?php includePart("base", "documentBottom");?>
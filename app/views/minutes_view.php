<?php
$meetingDocument = rx_getData('dir');
$dateName = rx_getData('dateName');
rx_setTitle("acm@thebeach - Minutes for " . $dateName);
?>

<?php includePart("base", "documentTop"); ?>
<?php includePart("base", "header"); ?>
<?php includePart("base", "breadcrumb"); ?>

<?php $minutes = rx_getData('minutes-content'); ?>
<?php $sidebar = rx_getData('sidebar-content'); ?>

<div class="main-content container_12">
    <div class="grid_3 content-module" id="func">
        <h3>Meeting Documents</h3>
        <ul class="document-listing">
            <?php foreach ($meetingDocument as $document): ?>
            <li>
                <a href="<?php echo $document['url']; ?>"> <?php echo $document['name']; ?></a>
            </li>
            <?php endforeach ?>
        </ul>
        
        <?php if(isset($sidebar)): ?>
            <h3>Officers</h3>
            <ul id="sidebar">
            <?php foreach ($sidebar as $officerType): ?>
                <?php if(count($officerType["officers"]) > 0): ?>
                <li>
                        <?php echo $officerType["type"]; ?>
                        <ol>
                            <?php foreach ($officerType["officers"] as $officer): ?>
                                <li>
                                    <span class="position"><?php echo $officer["position"]; ?></span>
                                    <span class="name"><?php echo $officer["name"]; ?></span>
                                </li>
                            <?php endforeach ?>
                        </ol>
                </li>
                <?php endif ?>
            <?php endforeach ?> 
            </ul>
        <?php endif ?>       
    </div>

    <div class="grid_9 content-module minutes-content">
    <?php if ($minutes != ''): ?>
        <h2>Minutes for <?php echo $dateName; ?></h2>
        <?php echo $minutes; ?>
        <?php else: ?>
            <h3>(No minutes preview available.)</h3>
    <?php endif ?>
    </div>
</div>

<?php if ($minutes != '' && !isset($sidebar)): ?>
    <script type="text/javascript">
        (function() {
            var $col = document.getElementById('column_1');
            var $children = $col.childNodes;
            for ($c in $children) {
                if ($children[$c].setAttribute) {
                    $children[$c].setAttribute('style', '');
                }
            }
            if ($col != '' || typeof ($col) == typeof ("")) {
                var x = document.getElementById('func');
                $("#column_1 *").attr("style", "");
                x.innerHTML += "<h2>Officers</h2>" + $col.innerHTML;
            }
        })();
    </script>
<?php else: ?>
    <?php if (isset($sidebar)): ?>
    <script type="text/javascript">
        (function () {
            var $subheaders = $(".minutes-content ol li ol li");
            var len = $subheaders.length;

            while(len--) {
                var text = $subheaders[len].childNodes[0];
                console.log(text);
                $subheaders[len].childNodes[0].nodeContent = "2323ajhdopjsp2";
            }
        })();
    </script>
    <?php endif?>
<?php endif ?>
<?php includePart("base", "documentBottom"); ?>
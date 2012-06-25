<?php $minutes = rx_getData('minutes-listing'); ?>
<?php $charters = rx_getData('charters'); ?>
<?php $closedCharters = rx_getData('closed-charters'); ?>

<?php rx_setTitle("acm@thebeach - Constitution/Bylaws"); ?>


<?php includePart("base", "documentTop"); ?>    
    <?php includePart("base", "header"); ?>
    
    <div class="grid_12" id="breadcrumb">
        <a id="con" href="#const">Constitution</a> &nbsp;&nbsp;&nbsp;
        <a id="byl" href="#bylaws">Bylaws</a> &nbsp;&nbsp;&nbsp;
    </div>
    
    <?php includePart("constitution", "splash"); ?>
    
    <div class="main-content container_12">
        <div class="grid_12">
            <div id="const" class="doc">
                <?php includePart("constitution", "constitution"); ?>
            </div>

            <div id="bylaws" class="doc">
                <?php includePart("constitution", "bylaws"); ?>
            </div>        
        </div>
    </div>
    
<script type="text/javascript" charset="utf-8">
	$( function () {
	    $(".doc").hide();
	    
        $("#breadcrumb a").click( function () {
           var $id = $(this).attr("href");
           $("#breadcrumb a").attr("style", "");
           
           $(this).attr("style", "font-weight:bold");
           $(".doc").hide();
           $($id).fadeIn(); 
        });
        
        $("#con").attr("style", "font-weight:bold");
        $("#const").show();
	});
</script>
<?php includePart("base", "documentBottom"); ?>
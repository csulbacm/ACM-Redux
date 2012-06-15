<div id="header">
    <div class="grid_6">
        <h1><a href="<?php echo rx_siteURL(); ?>">
            <img src="./assets/img/logo_white.png" alt="acm, csulb chapter">
        </a></h1>
    </div>
    <div class="grid_6" style="position:relative">
<div id="cse" style="width: 100%;">Loading</div>
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript"> 
  google.load('search', '1', {language : 'en'});
  google.setOnLoadCallback(function() {
    var customSearchOptions = {};  var customSearchControl = new google.search.CustomSearchControl(
      '014304568081427037718:j5a6ncmyioe', customSearchOptions);
    customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
    customSearchControl.draw('cse');
  }, true);
</script>

       
    </div>
	<?php includePart("base", "navi"); ?>
</div>

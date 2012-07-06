<div id="header" class="container_12">
    <div class="grid_6">
        <h1>
        <a href="<?php echo rx_siteURL(); ?>">
          <span class="text-header">acm@thebeach</span>
        </a></h1>
    </div>
    
    <div class="grid_6">
<div id="cse-search-form" style="width: 100%;">Loading</div>
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript"> 
  google.load('search', '1', {language : 'en'});
  google.setOnLoadCallback(function() {
    var customSearchOptions = {};  var customSearchControl = new google.search.CustomSearchControl(
      '014304568081427037718:j5a6ncmyioe', customSearchOptions);
    customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
    var options = new google.search.DrawOptions();
    options.enableSearchboxOnly("http://www.google.com/cse?cx=014304568081427037718:j5a6ncmyioe");
    customSearchControl.draw('cse-search-form', options);
  }, true);
</script>
<link rel="stylesheet" href="http://www.google.com/cse/style/look/default.css" type="text/css" />

    </div>

	<?php includePart("base", "navi"); ?>
</div>

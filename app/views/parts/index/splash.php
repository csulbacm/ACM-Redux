<?php 
	global $siteConfig; 
	$indexSplashSettings = $siteConfig->getIndexSplash();
?>

<div id="splash">
  <div id="main-page-splash">
  	<a href="<?php echo $indexSplashSettings["url"]; ?>">
    	<img src="static/data/assets/<?php echo $indexSplashSettings["image"]; ?>" alt="SOAR, now what?" />
	</a>
  </div>
</div>
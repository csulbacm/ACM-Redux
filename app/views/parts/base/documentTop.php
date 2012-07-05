<!DOCTYPE html>
<html>
    <head>
        <title><?php echo rx_getTitle(); ?></title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <?php echo rx_getCSS(); ?>
        <?php echo rx_getData('arbitraryTop'); ?>
        <?php if(file_exists(CSSFILEDIR . rx_getViewType() . '.css')): ?>
            <link rel="stylesheet" type="text/css" href="<?php echo CSSDIR . rx_getViewType() . '.css'?>" />
        <?php endif ?>
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <?php echo rx_getJS(); ?>

    </head>
    <body>
        <div class="wrapper">
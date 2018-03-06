<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
<head> 
  <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>          
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" title="no title" charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->        
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js" type="text/javascript" charset="utf-8"></script>
  <?php wp_head(); ?>
  
  <script type="text/javascript">
    var intervalID;
    
    function slideSwitch() {
        var $active = $('#slideshow a.active');
    
        if ( $active.length == 0 ) $active = $('#slideshow a:last');
    
        var $next =  $active.next().length ? $active.next()
            : $('#slideshow a:first');
    
        $active.addClass('last-active');
    
        $next.css({opacity: 0.0})
            .addClass('active')
            .animate({opacity: 1.0}, 1000, function() {
                $active.removeClass('active last-active');
            });
        clearInterval(intervalID);
        intervalID = setInterval( "slideSwitch()", 5000 );

    }
    
    function slideSwitch_prev() {
        var $active = $('#slideshow a.active');
    
        if ( $active.length == 0 ) $active = $('#slideshow a:first');
    
        var $next =  $active.prev().length ? $active.prev() : $('#slideshow a:last');
    
        $active.addClass('last-active');
    
        $next.css({opacity: 0.0})
            .addClass('active')
            .animate({opacity: 1.0}, 1000, function() {
                $active.removeClass('active last-active');
            });
        clearInterval(intervalID);
        intervalID = setInterval( "slideSwitch()", 5000 );

    }    
    
    $(function() {
        intervalID = setInterval( "slideSwitch()", 5000 );
    });    
  </script>          
</head>
<body>

<div id="main_container">
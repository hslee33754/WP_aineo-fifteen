<!DOCTYPE html>
<html>
    
<head>
    <title><?php bloginfo('decription'); ?> | <?php bloginfo('name');?> | Seattle, WA</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="robots" content="noindex,nofollow"/> <!-- Delete this line when this page goes live.-->
    
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_front_css(); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/magnific-popup.css">        
    <!-- Enable media queries for old IE -->
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>	

    <script src="<?php bloginfo('template_directory') . get_my_js(); ?>"></script>   

<!-- Start Script -->
<script>	

    
// lightbox jquery //
$(function() {	  
    $('.gallery').each(function() { // the containers for all your galleries. - multiple galleryies on one page.
        $(this).magnificPopup({
            delegate: 'a', // child items selector, by clicking on it popup will open
            type: 'image', //type option: image, ifram, inline, ajax - No auto detection. it is required.
            tLoading: 'Loading image #%curr%...', // String that contains classes that will be added to the root element of popup wrapper and to dark overlay.
            mainClass: 'mfp-img-mobile', // String that contains classes that will be added to the root element of popup wrapper and to dark overlay.
            gallery: { 
                enabled: true, // allows you to switch content of popup and adds navigation arrows
                navigateByImgClick: true,
                preload: [0,1] // Will preload 0 - before current, and 1 after the current image
            },
            image: { 
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.', // Error message
                titleSrc: function(item) {
                    return item.el.attr('title') + '<small>by Jin Kim</small>';
                    // Title attribute of the target element that contains caption for the slide.
                }
            }
        });
    });
});
//  End Lightbox jquery //    

    
// include Fullpage js for front-page //
$(function() {
    $('#fullpage').fullpage({
        verticalCentered: false,
        'navigation': true,
        'navigationPosition': 'right',
        'navigationTooltips': ['About Us', 'Prtfolio', 'Services', 'Products'],
    });
});
// End Fullpage js for front-page //
    
// Tab for toggling (open / close) box // 		
$(function() {
    $( "#tab1" ).click(function(){
        $("#box1").slideToggle(600, "swing");
        });	
    $( "#tab2" ).click(function(){
        $("#box2").slideToggle(600, "swing");
        });		
    $( "#tab3" ).click(function(){
        $("#box3").slideToggle(600, "swing");
        });	
    $( "#tab4" ).click(function(){
        $("#box4").slideToggle(600, "swing");
        });	

    // botton for hiding box //
    $( "#up1" ).click(function(){
        $("#box1").hide(600, "swing");
        });	
    $( "#up2" ).click(function(){
        $("#box2").hide(600, "swing");
        });		
    $( "#up3" ).click(function(){
        $("#box3").hide(600, "swing");
        });	
    $( "#up4" ).click(function(){
        $("#box4").hide(600, "swing");
        });	
});		
// End custom toggle jquery //	

    
</script>
<!-- End Script -->    

<!-- Start WP HEAD -->
<?php wp_head();?>
<!-- End WP HEAD -->
    
</head>
    
    
<body <?php body_class();?>>

    
<!-- Start Header -->
<header>
    <div class="logo_container">
        <a href="index.php"><!-- <img class="logo" src="" alt="" /> -->AINEO CREATIVE LAB</a>
    </div>
    <div class="sub_logo_container"> <!-- sub logo for small display -->
        <a href="index.php"><!-- <img class="logo" src="" alt="" /> -->ACL</a>
    </div>
    
     <!-- Start WP Nav -->
    <?php wp_nav_menu(array(
        'theme_location' => 'main-menu', 
        'container' =>'nav', 
        'container_class' => 'main_nav',
        'depth' => 1
    )); ?>
    <!-- End WP NAV -->
    
</header>
<!-- End Header -->
    
<!-- Start Section -->
<section>
    
<!-- Start Banner only when it is a page -->
<?php if(!is_front_page() && is_page() || is_home()): ?>
<!-- Banner images by page title -->
<div class="banner" style="background:url('<?php bloginfo('template_directory'); ?>/images/<?php echo strtolower(get_the_title()); ?>.jpg') no-repeat center center; background-size: cover;"></div>
<?php endif ?>
<!-- End Banner -->
    
<!-- Start Article -->    
<article>
  	


<?php

/*Theme Name: Aineo Fifteen
Author: Kate Lee
Author URI: http://kateleeseattle.com/
Description: This is a theme for Aineo Creative Lab. 
Version:1.0
*/

//Register My Menus

register_nav_menus(array(
    'main-menu' => __('Main'),
));
//

//Create function for using multiple css
function get_front_css(){    
    $my_css ='';
    if(is_front_page()){
        $my_css = bloginfo('template_directory');
        $my_css .= '/css/aineo_home.css';
    }
    return $my_css;
}


function get_my_js(){
    $my_js ='';
    if(is_front_page()){
        $my_js = '/js/jquery.fullPage.js';
    }else{
        $my_js = '/js/jquery.magnific-popup.js';
    }
    echo $my_js;
}


?>
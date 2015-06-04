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


function get_portfolio(){
    $attachments = get_children( array(
        'post_parent' => get_the_ID(),
        'post_type' => 'attachment',
        'order' => 'ASC'
    ));
    
    if($attachments){
        $portfolio='<div id="box1" class="wrap opened gallery">';
        
        foreach ($attachments as $attachment_id => $attachment){
            
            $thePermalink = get_permalink($attachment_id);
            $theUrl = wp_get_attachment_url($attachment_id);
            $theTitle = 'Find out how can I have a title';
            //$theTitle = apply_filters('the_title', $attachment->post_title);
            $theCaption = get_post_field('post_excerpt', $attachment->ID);
            
            $portfolio .='
            <div class="box">
			<a href="' . $theUrl . '" title="'.$theTitle.'" target="_blank">
			<div class="innerContent"  style="background-image: url(' . $theUrl . '); ">
			</div>
			</a>
			</div>
            
            ';            
        }//end foreach
        
        $portfolio .= '</div>';
            
    }//end if
    
    
    return $portfolio;
    
}//end get gallery function

add_shortcode( 'portfolio', 'get_portfolio');

?>
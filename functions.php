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


//Create function for using multiple js
function get_my_js(){
    $my_js ='';
    if(is_front_page()){
        $my_js = '/js/jquery.fullPage.js';
    }else{
        $my_js = '/js/jquery.magnific-popup.js';
    }
    echo $my_js;
}


//Create function for getting portfolios from subpages
function get_portfolios(){
    $subPages = get_children( array(
        'post_parent' => get_the_ID(),
        'post_type' => 'page',
        'order' =>'ASC',
        'orderby' => 'menu_order'
    ));
    
    $portfolio_box = '';
    $theNumber = 1;    

    foreach ($subPages as $subPage_id => $subPage){
        
        $thePermalink = get_permalink($subPage_id);
        $theTitle = get_the_title($subPage_id);
        
        $portfolio_box .='
            <h3 id="tab'.$theNumber.'"><a href="'.$thePermalink.'">'.$theTitle.'</a></h3>
            <div id ="box'.$theNumber.'" class="wrap opened gallery">
            <img class="up" id="up'.$theNumber.'" src="'.get_bloginfo('template_directory').'/images/up.png" alt="up">
        ';
        
        $theNumber++;
    } //end foreach
        
    /*
    echo '<pre>';
    var_dump($subPages);
    echo '</pre>';
    */
    
    return $portfolio_box;
}//end function

add_shortcode( 'portfolios', 'get_portfolios');


//Create function for gallery type portfolios using light box jquery
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


// For adding custom field to gallery popup 
function add_image_attachment_fields_to_edit($form_fields, $post) {
    
    // $form_fields is a an array of fields to include in the attachment form
    // $post is nothing but attachment record in the database
    // $post->post_type == 'attachment'
    // attachments are considered as posts in WordPress. So value of post_type in wp_posts table will be attachment
    // now add our custom field to the $form_fields array
    // input type="text" name/id="attachments[$attachment->ID][custom1]"
  
    $form_fields["category"] = array(
    "label" => __("Category"),
    "input" => "text", // this is default if "input" is omitted
    "value" => get_post_meta($post->ID, "_category", true),
    "helps" => __("Category is a custom field."),
    );
    
    return $form_fields;
}

// now attach our function to the hook
add_filter("attachment_fields_to_edit", "add_image_attachment_fields_to_edit", null, 2);

function add_image_attachment_fields_to_save($post, $attachment) {
    // $attachment part of the form $_POST ($_POST[attachments][postID])
    // $post['post_type'] == 'attachment'
    if( isset($attachment['category']) ){
        // update_post_meta(postID, meta_key, meta_value);
        update_post_meta($post['ID'], '_category', $attachment['category']);
    }
    return $post;
}

// now attach our function to the hook.
add_filter("attachment_fields_to_save", "add_image_attachment_fields_to_save", null , 2);


?>
<?php

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


include_once('functions/default.php');

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Geral');
}



add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="button"';
}


function user_agent(){
    $iPod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
    $iPhone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    $iPad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
    $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
    
    if($iPad||$iPhone||$iPod){
        return 'ios';
    }else if($android){
        return 'android';
    }
}

function isAndroid(){
    if(user_agent() == 'android'){
        return true;
    }
}

function isIos(){
    if(user_agent() == 'ios'){
        return true;
    }
}


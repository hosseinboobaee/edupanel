<?php

add_action('wp_enqueue_scripts', 'register_assetss');
function register_assetss(){
 wp_register_style('main-style', get_stylesheet_directory_uri().'/style.css', '', '1.0.0');
 wp_enqueue_style('main-style');
// //----- COLORS
 wp_register_style('theme-colors', get_stylesheet_directory_uri().'/assets/css/colors.css', '', '1.0.0');
 wp_enqueue_style('theme-colors');


 //---Register Js
 wp_register_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', ['jquery'], '1.0.0', 'true');
 wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', ['jquery'], '4.5.1', 'false');
 wp_register_script('front-ajax', get_template_directory_uri() . '/assets/js/ajax.js', ['jquery'], '1.0.0', 'true');
wp_localize_script( 'front-ajax', 'ajax',[
    'ajaxurl'=> admin_url('admin-ajax.php'),
   '_nonce'=> wp_create_nonce()
]);



 wp_enqueue_script('popper');
wp_enqueue_script('bootstrap');
wp_enqueue_script('front-ajax');
}
<?php
function theme_setup(){
    add_filter( 'show_admin_bar','__return_false');
    //Register Menu
    register_nav_menu( 'top nav', 'منوی هدر اصلی' );+ 
    
    // add thumb to theme
    add_theme_support('post-thumbnails');
    // crop uploder
    add_image_size( 'my-size', 200, 200, array('center' , 'center'));

    // add nav walker
    require_once get_template_directory() . '/class/nav-walker/WP_Bootsratp_Navwalker.php';
}

add_action( 'after_setup_theme', 'theme_setup' );
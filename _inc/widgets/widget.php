<?php
function register_widgets(){
    register_sidebar(
        [
            'name'=>'my_theme_sidebra',
            'id'=>'sidebar-1',
            'description'=>'ساید بار سفارشی قالب',
            'before_widget'=>'<li id="%1$s" class="%2$s">',
            'after_widget'=>'</li>',
            'before_title'=> '<h2 class="widget-title">',
            'after_title'=> '</h2>'
        ]
        );
}
add_action( 'widgets_init', 'register_widgets');
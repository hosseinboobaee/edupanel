<?php
function register_sidebar_widgets(){
    register_sidebar(
        [
            'name'=>'my_theme_sidebra',
            'id'=>'sidebar-1',
            'description'=>'ساید بار سفارشی قالب',
            'before_widget'=>'<li id="%1$s" class="%2$s">',
            'after_widget'=>'</li>',
            'before_title'=> '<h2 class="title">',
            'after_title'=> '</h2>'
        ]
        );
        register_sidebar(
            [
                'name'=>'my_theme_sidebar_hot_post',
                'id'=>'sidebar-2',
                'description'=>'سایدبار سفارشی 2 قالب',
                'before_widget'=>'<li id ="%1$s" class="%2$s">',
                'after_widget'=>'</li>',
                'before_title'=>'<h4 class="title">',
                'after_title' =>'</h4>'
            ]
        );
}
add_action( 'widgets_init', 'register_sidebar_widgets');
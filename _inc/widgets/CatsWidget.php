<?php
class CatsWidget extends WP_Widget{

    function __construct(){
        parent::__construct(false, 'دسته بندی مطالب');
    }
    function widget($args, $instance){
        echo $args['before_widget'];

        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        echo $args['after-title'];
        echo'اولین ویجت من';
        echo $args['after-widget'];
      
    }

    function update($new_instance, $old_instance){
        return '';
    }
    function form($instance){
       // $title = !empty($instance['title']) ? $instance['title']: 'عنوان پیش فرض( برای ویجت خود لطفا یک نام انتخاب نمایید)';
    }
}

function dwt_register_widget(){
    register_widget('CatsWidget');
}

add_action('widgets_init', 'dwt_register_widget');
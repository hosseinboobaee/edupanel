<?php
function dwt_register_level()
{
    add_meta_box(
        'dwt_level',
        'تنظیمات بیشتر ',
        'dwt_more_setting_html',
        '',
        'normal',
        'default'
    );
}
function dwt_more_setting_html()
{
    wp_nonce_field('post_level_nonce', 'post_level_nonces');
    wp_nonce_field('post_cat_nonce', 'post_cat_nonces');
    ?>
    <!-- <label for="post-level">سطح مقاله</label>
    <input type="text" value="<?php echo get_post_meta(get_the_ID(), '_dwt_post_level', true) ?>" name="post_level"
        placeholder="سطح مقاله خود را وارد نمایید"> -->

    <select name="post_level">
        <option value="1" <?php selected(get_post_meta(get_the_ID(), '_dwt_post_level', true),1 ) ?>>مقدماتی</option>
        <option value="2" <?php selected(get_post_meta(get_the_ID(), '_dwt_post_level', true),2 ) ?>>متوسط</option>
        <option value="3" <?php selected(get_post_meta(get_the_ID(), '_dwt_post_level', true),3 ) ?>>پیشرفته</option>
    </select>
    <?php
    wp_dropdown_categories( 
        ['name' => 'post_cat',
        'selected' => get_post_meta(get_the_ID(), '_dwt_post_cat', true)
        ]
    );
}
function save_meta_box($post_id)
{
    $post_level_nonce = $_POST['post_level_nonces'];
    $post_cat_nonce = $_POST['post_cat'];
    if (!wp_verify_nonce($post_level_nonce, 'post_level_nonces') && !wp_verify_nonce($post_cat_nonce, 'post_cat_nonces')) {
        return $post_id;
    }
    if (!empty($_POST['post_level']) && !empty($_POST['post_cat'])) {
        $post_level = sanitize_text_field($_POST['post_level']);
        $post_level = sanitize_text_field($_POST['post_cat']);
        update_post_meta($post_id, '_dwt_post_level', $post_level);
        update_post_meta($post_id, '_dwt_post_cat', $post_level);
    }

}
add_action('add_meta_boxes', 'dwt_register_level');
add_action('save_post', 'save_meta_box');
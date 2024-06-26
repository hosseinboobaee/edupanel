<!-- <?php GoogleReferer::dwt_set_google_referer(get_the_ID(),$_SERVER['PHP_REFERER']) ?> -->
<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); 
     PostView::dwt_set_post_view(get_the_ID( ));
     ?>
        <div class="article_detail_wrapss single_article_wrap format-standard">
            <div class="article_body_wrap">

                <div class="article_featured_image">
                    <!-- <img class="img-fluid" src="<?php echo get_template_directory_uri() . '/assets/image/h-5.png' ?>" alt=""> -->
                    <?php
                    if (has_post_thumbnail()) {
                        //the_post_thumbnail( 'post-thumbnail',['class'=>'img-responsive','alt' => get_the_title();]);
                        the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full', 'alt' => get_the_title()]);
                    } else {
                        echo dwt_default_post_thumbnail();
                    }
                    ?>
                </div>

                <?php echo get_template_part('meta-data/single/post-meta', 'post-meta'); ?>
             <?php the_content() ?>
                <div class="article_bottom_info">
                    <?php echo get_template_part('meta-data/single/post-tag', 'post-tag'); ?>
                    <?php echo get_template_part('meta-data/single/post-share', 'post-share'); ?>
                </div>
                <?php echo get_template_part('partials/single/pagination', 'pagination'); ?>

            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
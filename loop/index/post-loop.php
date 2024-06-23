<?php
$args = [
	'post_type' => 'post',
	'posts_per_page' => 4
];
$the_query = new WP_Query($args);

?>
<?php if ($the_query->have_posts()): ?>
	<?php while ($the_query->have_posts()): $the_query->the_post(); ?>
		<div class="singles_items">
			<div class="edu_cat">
				<div class="pic">
					<!-- <div class="topic_level bg-info text-white">سطح :
						<?php echo get_post_meta(get_the_ID(), '_dwt_post_level', true) ?>
					</div> -->

					<?php
					if (!empty(get_post_meta(get_the_ID(), '_dwt_post_level'))) {
						switch (get_post_meta(get_the_ID(), '_dwt_post_level', true)) {
							case 1:
								echo '<div class="topic_level bg-info text-white"> سطح: مقدماتی</div>';
								break;

							case 2:
								echo '<div class="topic_level bg-info text-white"> سطح: متوسط</div>';
								break;
							case 3:
								echo '<div class="topic_level bg-info text-white"> سطح: پیشرفته</div>';
						}
					}?>


					<?php if (!empty(get_post_meta(get_the_ID(), '_dwt_post_cat',true))): ?>
					<!-- اینجا یک خط حذف شده -->
					<?php else: ?>
						<div class="topic_cat bg-danger text-white">دسته بندی نشده</div>
						<?php endif; ?>

					<div class="education_block_thumb n-shadow">
						<a class="pic-main" href="<?php the_permalink(); ?>">

							<?php
							if (has_post_thumbnail()) {
								//the_post_thumbnail( 'post-thumbnail',['class'=>'img-responsive','alt' => get_the_title();]);
								the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full', 'alt' => get_the_title()]);
							} else {
								echo dwt_default_post_thumbnail();
							}
							?>
						</a>
					</div>

				</div>
				<div class="edu_data singles_items_border_bottom">
					<h4 class="title"><a href="<?php echo get_the_title() ?>">پلاگین نویسی وردپرس</a></h4>
					<ul class="meta d-flex mt-4">
						<li class="d-flex align-items-center"></i><?php echo get_the_author() ?></li>
						<li class="video d-flex align-items-center"><i class="ti-video-clapper"></i>ویدئو</li>
						<li class="video d-flex align-items-center"><i class="ti-eye"></i><?php echo PostView::dwt_get_post_view(get_the_ID()) ?></li>
						<li class="d-flex align-items-center"><i
								class="ti-calendar theme-cl"></i><?php echo get_the_date('j F ماه Y') ?></li>
					</ul>
				</div>
			</div>
		</div>

	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
<?php else: ?>
	<div class="alert alet-info">تاکنون مطلبی منتشر نشده است</div>
<?php endif; ?>
<?php
/**
 * The template Featured Article - Latest Post
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Potaruru
 */

$ft = get_posts(array(
	'posts_per_page'	=> 2,
	'post_type' 		=> 'post',
	'post_status'       => 'publish',
	'order' 			=> 'DESC'
)); ?>

<?php if ($ft >= 2): ?>
	<div id="featured" class="featured-latest">
		<div class="primary col-md-6 featured-wrap float-left">
			<a href="<?php the_permalink($ft[0]->ID) ?>" class="featured-article" rel="bookmark">
				<div class="featured-article-image-container">
					<img src="<?php pota_image($ft[0]->ID, '750x450') ?>" 
						alt="<?php echo $ft[0]->ID->post_title ?>">
					<div class="featured-article-image-container-gradient"></div>
					<div class="article-title">
						<span class="post-title"><?php echo $ft[0]->post_title ?></span>
					</div>
				</div>
			</a>
		</div>
		<div class="primary col-md-6 featured-wrap float-left">
			<a href="<?php the_permalink($ft[1]->ID) ?>" class="featured-article" rel="bookmark">
				<div class="featured-article-image-container">
					<img src="<?php pota_image($ft[1]->ID, '750x450') ?>" 
						alt="<?php echo $ft[1]->ID->post_title ?>">
					<div class="featured-article-image-container-gradient"></div>
					<div class="article-title">
						<span class="post-title"><?php echo $ft[1]->post_title ?></span>
					</div>
				</div>
			</a>
		</div>
	</div>
<?php endif ?>

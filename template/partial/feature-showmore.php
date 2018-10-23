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
	'posts_per_page'	=> 6,
	'post_type' 		=> 'post',
	'post_status'       => 'publish',
	'orderby' 			=> 'rand',
	'exclude'			=> $post->ID
)); ?>

<section class="p-b-0">
	<div class="container">
		<div class="category-line">
			<h2><span>Baca Juga</span></h2>
		</div>
	</div>
</section>

<div class="row">
	<div id="featured" class="featured-latest">
		<?php foreach ($ft as $key => $value): ?>
			<div class="primary col-md-4 featured-wrap float-left">
				<a href="<?php the_permalink($value->ID) ?>" class="featured-article" rel="bookmark">
					<div class="featured-article-image-container">
						<img src="<?php pota_image($value->ID, '750x450') ?>" 
							alt="<?php echo $value->ID->post_title ?>">
						<div class="featured-article-image-container-gradient"></div>
						<div class="article-title">
							<span class="post-title"><?php echo $value->post_title ?></span>
						</div>
					</div>
				</a>
			</div>
		<?php endforeach ?>
	</div>
</div>
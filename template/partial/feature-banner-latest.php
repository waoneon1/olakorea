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
						<span class="post-title">
							<?php echo $ft[0]->post_title ?>
						</span>
					</div>
				</div>
			</a>
			<div class="header-post-cat">
				<div class="row">
					<?php 
					$categories = get_the_category($ft[0]->ID);
					foreach($categories as $category) : ?>
					  <div class="col-xs-3" style="margin-left: 3px;"> 
						  	<p class="header-post-cat-name" style="">

							   <a href="<?php echo get_category_link($category->term_id); ?>"> 
							   		<?php echo $category->name; ?>
							   </a>
							</p>
					   </div>
					<?php endforeach; ?>
				
			    </div>
			    <?php //var_dump($categories); ?>	
		    </div>
		</div>

		<?php array_shift($ft) ?>
		<div class="secondary col-md-6 featured-wrap float-left">
			<?php foreach ($ft as $value): ?>
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
				<div class="header-post-cat">
				<div class="row">
					<?php 
					$categories = get_the_category($value->ID);
					foreach($categories as $category) : ?>
					  <div class="col-xs-3" style="margin-left: 3px;"> 
						  	<p class="header-post-cat-name" style="">
							   <a href="<?php echo get_category_link($category->term_id); ?>"> 
							   		<?php echo $category->name; ?>
							   </a>
							</p>
					   </div>
					<?php endforeach; ?>
				
			    </div>	
		    </div>
			<?php endforeach ?>
		</div>
	</div>
	
<?php endif ?>

<?php
/**
 * The template Block - Games
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Potaruru
 */

// if page template 
if (is_page_template( 'template-product-page.php' )) {
	$post_type 	= 'product_post';
	$tax 		= 'platforms';
	$filter 	= (isset($_GET['filter']) && $_GET['filter']) ? $_GET['filter'] : false;
	$args_tax	= array(array(
		'taxonomy' => $tax,
		'field' => 'slug',
		'terms' => $filter 
	));

	// get 3 oldest post
	$args_oldest = array(
		'posts_per_page'	=> 3,
		'post_type' 		=> $post_type,
		'post_status'       => 'publish',
		'meta_key'          => 'product_page_release_date',
		'meta_value'        => date("Ymd"), 
		'meta_compare'      => '>',
		'orderby'           => 'meta_value',
		'order'             => 'ASC'
	);
	if ($filter) $args_oldest['tax_query'] = $args_tax;
	$posts_master['latest'] = get_posts($args_oldest);

	// get all post exclude 3 oldest
	$args_random = array(
		'posts_per_page'	=> -1,
		'post_type' 		=> $post_type,
		'post_status'       => 'publish',
		'orderby' 			=> 'rand',
		'exclude'			=> array_map(function($arr) { return $arr->ID; }, $posts_master['latest'])
	);
	if ($filter) $args_random['tax_query'] = $args_tax;
	$posts_master['random'] = get_posts($args_random);

}
?>

<div class="row col-card-wraper">
	<?php foreach ($posts_master as $posts): ?>
		<?php foreach ($posts as $key => $post): ?>
			<?php setup_postdata($post) ?>

			<?php $pp 	= get_field("product_page") ?>
			<?php $b 	= $pp['platform'] ?>
			
			<div class="col-12 col-sm-6 col-md-4 col-card" 

				<?php if ($b): ?>
					data-platform="<?php 
						array_map(function($arr){
								echo $arr["value"].',';
							}, $b
						) 
					?>"
				<?php endif ?>>

				<div class="card card-lg">
					<div class="card-img">
						<a href="<?php the_permalink() ?>">
							<img src="<?php pota_image($pp['image'], '360x235', 'acf') ?>" class="card-img-top" alt="<?php the_title() ?>">
						</a>
						<!-- <div class="badge badge-<?php //echo $b['value'] ?>"><?php //echo $b['label'] ?></div> -->
					</div>
					<div class="card-block">
						<h4 class="card-title">
							<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
						</h4>
						<div class="card-meta">
							<span><?php echo $pp['release_date'] ?></span>
						</div>
						<p class="card-text"><?php echo $pp['blurb'] ?></p>
					</div>
				</div>
			</div>
			<?php wp_reset_postdata() ?>
		<?php endforeach ?>
	<?php endforeach ?>
</div>

<!-- <div class="text-center">
	<a class="btn btn-primary btn-shadow btn-rounded btn-effect btn-lg m-t-10" href="games.html">Show More</a>
</div> -->
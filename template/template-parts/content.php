<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Potaruru
 */

global $numpages;

$paged = 1;
//pagination
if ( get_query_var( 'paged' ) )
    $paged = get_query_var('paged');
else if ( get_query_var( 'page' ) )
    $paged = get_query_var( 'page' );
else
    $paged = 1;

?>

<?php if ($paged > 1): ?>
	<a href="<?php echo get_permalink($post->ID).($paged-1) ?>" class="pota-prev-page" >
		<i class="fa fa-chevron-up"></i>
		<span class="sr-only">Previous</span>
	</a>
<?php endif ?>

<section>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
		<div class="pota-data-nextpage"
			data-url="<?php echo get_permalink($post->ID) ?>" 
			data-page="<?php echo $paged ?>"
			data-maxpage="<?php echo $numpages ?>"
			data-id="<?php echo $post->ID ?>">	
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-1 hidden-md-down">
					<?php if ($paged == 1): ?>
						<!-- widget share -->
						<?php get_template_part( 'template/partial/widget', 'share' ) ?>
					<?php endif ?>
				</div>
				<div class="col-lg-10 progress-wrap">
					
					<!-- post -->
					<div class="post post-single">
						
						<?php if ($paged == 1): ?>
							<h2 class="post-title"><?php the_title() ?></h2>
							<?php pota_component( 'post-meta' ) ?>

							<div class="post-actions hidden-md-up">
								<?php pota_component( 'social-share-top' ) ?>
							</div>

							<?php pota_post_thumbnail($post->ID, '945x550', $post->title) ?>
							<?php //echo do_shortcode('[ajax_load_more nextpage="true" nextpage_urls="true" nextpage_scroll="0:30"  pause="true" pause_override="true"  nextpage_post_id="'. get_the_ID() .'" transition="fade" container_type="div" images_loaded="true" button_label="Next Page"]'); ?>
						<?php endif ?>

						<?php the_content() ?>
					</div>

					<?php if ($paged == $numpages): ?>

						<?php $href = $btn_effect = '' ?>
						<?php if (get_previous_post()->ID): ?>
							<?php $prev_link = get_permalink(get_previous_post()->ID) ?>
							<?php $href = 'href="'.esc_url($prev_link).'"' ?>
							<?php $btn_effect = ' btn-effect' ?>
						<?php endif ?>

						<!-- <div class="text-center">
							<a class="btn btn-primary btn-shadow btn-rounded btn-lg m-t-10 <?php echo $btn_effect ?>" <?php echo $href ?>>Load More</a>
						</div> -->
						
						<div class="post-actions">
							<?php pota_component( 'post-tags' ) ?>
							<?php pota_component( 'social-share' ) ?>
						</div>
						<?php get_template_part( 'template/partial/feature', 'showmore' ) ?>

					<?php endif ?>

					<?php if ( comments_open() || get_comments_number() ) :
						//comments_template(); 
					endif ?>
					
				</div>
			</div>
			<?php if ($paged != $numpages): ?>
				<div class="alert alert-info" role="alert" style="margin: 10px; text-align: center;">
					<center>Scroll untuk melanjutkan</center>
				</div>
			<?php endif ?>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
</section>

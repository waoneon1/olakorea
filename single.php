<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Potaruru
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<div class="container mt-2">
   			 <?php echo get_field('ads_single_page_content', 'option') ?>
		</div>
		
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template/template-parts/content', get_post_type() );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

			echo "<section>";
				get_template_part( 'template/template-parts/content', 'page' );
			echo "</section>";

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

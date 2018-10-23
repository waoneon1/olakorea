<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Potaruru
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<h1 class="m-b-20"><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

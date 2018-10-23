<?php
/**
 * The template Feature - User Profile
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Potaruru
 */

$ID 			= get_the_author_meta('ID');
$display_name 	= get_the_author_meta('display_name');
$desc 			= get_the_author_meta('description');
?>

<section class="p-b-0">
	<div class="container">
		<div class="post pota-user-profile">
			<div class="post-thumbnail">
				<?php echo get_avatar( $ID , 200 ) ?>
			</div>
			<div class="post-block">
				<div class="hero-block">
					<h1><?php echo $display_name ?></h1>
				</div>
				<p><?php echo $desc ?></p>
			</div>
		</div>
		<h1><i class="fa fa-file-text"></i> Artikel Oleh Era</h1>
	</div>
</section>
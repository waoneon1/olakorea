<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Potaruru
 */

get_header();
?>

<!-- main -->
<section class="bg-image bg-image-sm error-404" style="background-image: url(
	<?php pota_image(get_field('background_image', 'option'), '800x450', 'acf') ?>
);">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mx-auto">
				<div class="heading">
					<h2>404</h2>
				</div>
				<p>Sorry, but the page you requested could not be found.</p>
				<form method="get" action="<?php echo esc_url( home_url( '/' )) ?>" >
					<div class="col-lg-8 mx-auto">
						<div class="form-group input-icon-right">
							<input type="text" class="form-control" name="s" placeholder="Search Page...">
							<i class="fa fa-search"></i>
						</div>
					</div>
				</form>
				<div class="m-t-50">
					<a href="<?php echo esc_url( home_url( '/' )) ?>" class="btn btn-primary btn-effect btn-shadow btn-rounded btn-lg">Back to home</a>
					<a href="#" class="btn btn-outline-default btn-rounded btn-lg m-l-10">Contact Us</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /main -->

<?php
get_footer();

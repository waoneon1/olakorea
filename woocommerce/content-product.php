<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<div class="col-12 col-sm-6 col-md-3">
	<div class="card card-review" style="margin-bottom: 30px;">
		<div class="card-img">
			<a href="<?php echo get_permalink($product->id) ?>" class="woocommerce-LoopProduct-link">
				<span><?php woocommerce_template_loop_rating() ?></span>
				<?php woocommerce_template_loop_product_thumbnail() ?>
			</a>
			<?php woocommerce_show_product_loop_sale_flash() ?>
		</div>
		<div class="card-block">
			<h4 class="card-title">
				<a href="<?php echo get_permalink($product->id) ?>"><?php echo get_the_title() ?></a>
			</h4>
			<p><?php woocommerce_template_loop_price() ?></p>
			<?php woocommerce_template_loop_add_to_cart() ?>
		</div>
	</div>
</div>
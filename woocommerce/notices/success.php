<?php
/**
 * Show messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/success.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! $messages ) {
	return;
}
?>

<?php foreach ( $messages as $message ) : ?>
    <?php if (strpos($message," has been added to your cart.")): ?>
        <?php 
            $strip = strip_tags($message);
            $strip = str_replace(' has been added to your cart.', '', $strip);
            $product_name = str_replace('View cart ', '', $strip);
        ?>
        <div class="alert alert-success" role="alert">
            <strong><?php echo $product_name.' ' ?></strong> has been added to your cart. 
            <a href="<?php echo wc_get_cart_url() ?>" class="button wc-forward">View cart <i class="fa fa-shopping-cart"></i></a>
        </div>
    <?php else: ?>
        <div class="woocommerce-message" role="alert"><?php echo wp_kses_post( $message ); ?></div>
    <?php endif ?>
<?php endforeach; ?>

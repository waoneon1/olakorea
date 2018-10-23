<?php
/**
 * The template Block - Blog Medium
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Potaruru
 */

// On Product CPT
if (get_post_type() == 'product_post') {
    $get = ($_GET['ppage'] == 'guides') ? 'guides' : 'news';
    $pn = get_field('product_'.$get);
    $post_type = 'post';

    $have_posts = $pn['news'];
    $args = array(
        'tag__in'       => $pn['news'],
        'post_type'     => $post_type,
        'post_status'   => 'publish',
        'order'         => 'DESC'
    );
}

// On Page
if (is_search()) {
    $have_posts = ($_GET['s'] != '');
    $args = array(
        's'             => $_GET['s'],
        'post_type'     => $post_type,
        'post_status'   => 'publish',
        'order'         => 'DESC'
    );
}

$query = new WP_Query($args);

if ($have_posts) {

    if ($query->have_posts()): ?>
    	<?php foreach ($query->posts as $key => $post): ?>
    		<?php setup_postdata($post) ?>
    		<!-- post -->
    		<div class="post post-md">
    			<?php pota_post_thumbnail($post->ID, '320x180', $post->title, get_permalink($post->ID)) ?>
    			<div class="post-block">
    				<h2 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
    				<?php pota_component('post-meta') ?>
    				<?php //pota_blurb_autofill() ?>
    			</div>
    		</div>
    	<?php endforeach ?>
    	<?php wp_reset_postdata() ?>
    <?php else: ?>
        <?php get_template_part( 'template/partial/alert', 'search' );  ?>
    <?php endif ?>
<?php 

} else {
    get_template_part( 'template/partial/alert', 'search' );
} ?>
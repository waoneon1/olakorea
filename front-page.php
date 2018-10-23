<?php
/**
 * The template Front Page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Potaruru
 */

get_header(); 
$type = get_field('type'); 
?>

<div class="container mt-2">
        <?php echo get_field('ads_single_page_content', 'option') ?>
</div>

<div class="container">
	<div class="row"><?php get_template_part( 'template/partial/feature', 'banner-'.$type ) ?></div>
</div>

<section>
    <div class="container">
        <div class="row col-card-wraper">
            <?php get_template_part( 'template/partial/block', 'blog-content' ) ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php echo do_shortcode( '[ajax_load_more container_type="div" css_classes="container" post_type="post" posts_per_page="3" offset="7" transition_container_classes="col-card-wraper"]' ) ?>
        </div>
    </div>
</section>

<?php get_footer() ?>

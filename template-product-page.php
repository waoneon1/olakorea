<?php
/**
 * Template Name: Product Page
 * The template Product Page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Potaruru
 */

get_header(); ?>


<section class="p-t-30">
    <div class="container">
        <?php get_template_part( 'template/partial/feature', 'search-dropdown' ) ?>
        <?php get_template_part( 'template/partial/block', 'games' ) ?>
    </div>
</section>

<?php get_footer() ?>

	<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Potaruru
 */

get_header();

if (is_author()){ 
	$author = get_the_author_meta('ID');
	$param  = 'author="'.$author.'"';	
    $title  = get_the_author_meta('display_name',$post->post_author);
    $desc   = '';
} 

if (is_category()){ 
	$cat    = get_category( get_query_var( 'cat' ) );
	$param  = 'category="'.$cat->slug.'"';
    $title  = single_cat_title('', false);    
    $desc   = category_description();	
} 

if (is_tag()){ 
	$tag    = get_query_var('tag'); 
	$param  = 'category="'.$tag.'"';	
    $title  = single_cat_title('', false);
    $desc   = category_description();
}

?>

<?php if (is_author()): ?>
    <?php get_template_part( 'template/partial/feature', 'profile' ) ?>
<?php else: ?>
    <section class="p-b-0">
        <div class="container">
            <div class="category-line">
                <h2><span><?php echo $title ?></span></h2>
                <p><?php echo $desc ? $desc : '' ?></p>
            </div>
        </div>
    </section>
<?php endif ?>

<section>
    <div class="container">
        <div class="row col-card-wraper">
            <?php get_template_part( 'template/partial/block', 'blog-cards' ) ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php echo do_shortcode( '[ajax_load_more container_type="div" css_classes="container" post_type="post" posts_per_page="2" offset="4" transition_container_classes="col-card-wraper" '.$param.']' ) ?>
        </div>
    </div>
</section>	

<?php get_footer();

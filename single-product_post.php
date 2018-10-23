<?php
/**
 * The template for displaying single product
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Potaruru
 */

get_header(); 

// Subnav News ===========================================
$tags = get_field('product_news')['news'];
if (pota_subnav_filter($tags)) $subnav[] = 'news';
// Subnav Review =========================================
if (get_field('product_reviews')['positive'] 
|| get_field('product_reviews')['negative']) 
$subnav[] = 'reviews';
// Subnav Image&Video ====================================
$subnav[] = 'images';
$subnav[] = 'videos';
// Subnav Guide ==========================================
$tags = get_field('product_guides')['news'];
if (pota_subnav_filter($tags)) $subnav[] = 'guides';
//========================================================

$page = $_GET['ppage'];
$page_default = $subnav[0];
$page = (in_array($page, $subnav)) ? $_GET['ppage'] : $page_default;

?>
<!-- --------------------Subtitle------------------- -->
<section class="pota-subnav toolbar toolbar-links" data-fixed="true">
    <div class="container">
        <h5><?php the_title() ?></h5>
        <ul class="toolbar-nav m-r-25 hidden-sm-down">
            <?php foreach ($subnav as $nav): ?>
                <?php $nav_val = pota_subnav_title($nav) ?>
                <li <?php echo ($page == $nav) ? 'class="active"' : '' ?> >
                    <a href="?ppage=<?php echo $nav ?>"><?php echo $nav_val ?></a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</section>
<section class="toolbar toolbar-links hidden-md-up">
    <div class="container">
        <ul class="toolbar-nav m-r-25 mx-auto">
            <?php foreach ($subnav as $nav): ?>
                <?php $nav_val = pota_subnav_title($nav) ?>
                <li <?php echo ($page == $nav) ? 'class="active"' : '' ?> >
                    <a href="?ppage=<?php echo $nav ?>"><?php echo $nav_val ?></a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</section>
<!-- --------------------Content------------------- -->
<?php if ($page == 'reviews'): ?>
    <div class="product-review-page">
        <?php get_template_part( 'template/partial/widget', 'review' ); ?>
    </div>
<?php endif ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-lg-8">
                <?php switch ($page) {
                    
                    case 'reviews':
                        get_template_part( 'template/partial/block', 'review-post' );
                        break;
                                
                    case 'images':
                        get_template_part( 'template/partial/block', 'gallery' );
                        break;
                    
                    case 'videos':
                        get_template_part( 'template/partial/block', 'videos' );
                        break;
                    
                    case 'guides':
                        get_template_part( 'template/partial/block', 'blog-medium' );
                        break;
                    
                    default:
                        get_template_part( 'template/partial/block', 'blog-medium' );
                        break;
                } ?>
            </div>

            <div class="col-lg-4">
                <div class="sidebar">
                    <?php get_template_part( 'template/partial/widget', 'game' ) ?>    
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer() ?>

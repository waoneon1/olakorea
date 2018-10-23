<?php
/**
 * The template Widget - Game
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Potaruru
 */

$product            = get_field('product_page'); 
$prod_review        = get_field('product_reviews'); 
$background_image   = ($prod_review['background_image']) ? $prod_review['background_image'] : $product['image'];
$platforms          = get_the_terms($post, 'platforms');
?>

<div class="widget widget-game">
    <div class="widget-block" style="
        background-image: url('<?php pota_image($background_image, '750x450', 'acf') ?>');
        background-position: <?php echo $prod_review['background_position'] ?>;
    ">
        <div class="overlay"></div>
        <div class="widget-item">
            <h4><?php the_title() ?></h4>
            <span class="meta">Released Date: <?php echo $product['release_date'] ?></span>

            <?php if ($platforms): ?>
                <h5>Platforms</h5>
                <?php array_map(function($arr){
                    echo '<span class="badge badge-'.$arr->slug.'">'.$arr->name.'</span>';
                }, $platforms); ?>
            <?php endif ?>
            
            <?php if ($product['developer']): ?>
                <h5>Developer</h5>
                <ul>
                   <?php foreach ($product['developer'] as $dev): ?>
                       <li><a href="<?php echo $dev['link'] ?>" target="_blank"><?php echo $dev['name'] ?></a></li>
                   <?php endforeach ?>
                </ul>
            <?php endif ?>

            <?php if ($product['publisher']): ?>
                <h5>Publisher</h5>
                <ul>
                    <?php foreach ($product['publisher'] as $publisher): ?>
                         <li><a href="<?php echo $publisher['link'] ?>" target="_blank"><?php echo $publisher['name'] ?></a></li>
                    <?php endforeach ?>
                </ul>
            <?php endif ?>

            <?php echo $product['description'] ?>

            <?php if ($product['download_android']): ?>
                <a href="<?php echo $product['download_android'] ?>" target="_blank" class="btn-block pota-btn-download" style="text-align: center;">
                    <?php pota_btn_googleplay() ?>
                </a>
            <?php endif ?>
            
            <?php if ($product['download_ios']): ?>
                <a href="<?php echo $product['download_ios'] ?>" target="_blank" class="btn-block pota-btn-download" style="text-align: center;">
                    <?php pota_btn_appstore() ?>
                </a>
            <?php endif ?>
            
            <?php if ($product['download_link']): ?>
                <a href="<?php echo $product['download_link'] ?>" target="_blank" class="btn btn-outline-default btn-block">
                    Download <i class="fa fa-arrow-circle-o-down"></i>
                </a>
            <?php endif ?>

            <?php if ($product['buy_link']): ?>
                <a href="<?php echo $product['buy_link'] ?>" target="_blank" class="btn btn-outline-default btn-block">Buy <i class="fa fa-cart-arrow-down"></i></a>
            <?php endif ?>
            
        </div>
    </div>
</div>
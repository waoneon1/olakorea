<?php
/**
 * The template Widget - Review Stat
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Potaruru
 */

$product            = get_field('product_page'); 
$prod_review        = get_field('product_reviews'); 
$background_image   = ($prod_review['background_image']) ? $prod_review['background_image'] : $product['image'];
?>

<section class="bg-image bg-image-sm" style="
        background-image: url('<?php pota_image($background_image, '800x450', 'acf') ?>');
        background-position: <?php echo $prod_review['background_position'] ?>;
    ">
    <div class="overlay-dark"></div>
    <div class="container">
        <div class="review">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h2 class="review-title text-center"><?php the_title() ?></h2>
                    <!-- <p><?php echo $prod_review['review_text'] ?></p> -->
                </div>
                <div class="col-12 col-lg-2 col-md-2 col-sm-12 pota-percentage">
                    <?php $percentage = $prod_review['percentage'] ?>
                    <?php if ($percentage): ?>
                        <?php echo '<div class="chart easypiechart" data-percent="'.$percentage.'" data-scale-color="#e3e3e3"><span>'.$percentage.'</span>%</div>' ?>
                    <?php endif ?>
                </div>
            </div>
            <div class="row m-t-20">

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12 col-sm-2"></div>
                        <div class="col-12 col-sm-4">
                            <div class="review-good">
                                <?php if ($prod_review['positive']): ?>
                                    <h5>Pros:</h5>
                                    <?php foreach ($prod_review['positive']  as $positive): ?>
                                        <p><?php echo $positive['+'] ?></p>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="review-bad">
                                <?php if ($prod_review['negative']): ?>
                                    <h5>Cons:</h5>
                                    <?php foreach ($prod_review['negative']  as $negative): ?>
                                        <p><?php echo $negative['-'] ?></p>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
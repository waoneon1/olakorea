<?php
/**
* The template Block - Review
*
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Potaruru
*/

$product 		= get_field('product_page'); 
$prod_review 	= get_field('product_reviews'); 
?>

<div class="post post-single">
	<h1>asd</h1>
	<?php echo $prod_review['content'] ?>
</div>
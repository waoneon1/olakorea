<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Potaruru
 */

get_header();
?>

<section>
    <div class="container">	

    	<div class="heading">
    		<i class="fa fa-search"></i>
    		<h2>Search Result: "<?php echo $_GET['s']; ?>"</h2>
    	</div>

    	<div class="row m-t-50">
    		<div class="col-lg-12">
    			<form method="get" action="<?php echo esc_url( home_url( '/' )) ?>" >
    				<div class="col-lg-8 mx-auto">
    					<div class="form-group input-icon-right">
    						<input type="text" class="form-control" name="s" placeholder="Search Page..." value="<?php echo $_GET['s']; ?>">
    						<i class="fa fa-search"></i>
    					</div>
    				</div>
    			</form>
    		</div>
    	</div>

        <div class="row m-t-50">
            <div class="col-lg-12">
      			<?php get_template_part( 'template/partial/block', 'blog-medium' ); ?>
            </div>
        </div>

    </div>
</section>

<?php
get_footer();

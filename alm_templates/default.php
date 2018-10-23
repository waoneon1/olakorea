<div class="col-sm-4 float-left col-card">
		

		<div class="post post-card">
			<!-- <div>
				<a href="profile.html">
					<img src="img/user/user-3.jpg" alt="">
				</a>
			</div> -->
			<?php $image = has_post_thumbnail() ? pota_image($post->ID, '750x450', 'wp', false) : pota_placeholder('pota_750x450'); ?>

			
			<div class="post-thumbnail">
				<a href="<?php the_permalink() ?>">
					 <img src="<?php echo $image ?>" alt="<?php the_title() ?>">
					<!-- <img class="card-img-top" src="<?php echo $image ?>" alt="<?php the_title() ?>"> -->
				</a>
			</div>

			<div class="row" style="margin-left: -5px;">
				<?php 
				$categories = get_categories();
				
				foreach($categories as $category) : ?>
				  <div class="col-xs-3 catlink" style="padding:3px; font-size: 13px;"> 
				  	<p style="color: #ce1126;">
					   <a href="<?php echo get_category_link($category->term_id); ?>"> 
					   		<?php echo $category->name; ?>
					   </a>
					</p>
				   </div>
				<?php endforeach; ?>
		    </div>
		
			
			<div>
				<h2 class="post-title">
					<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
				</h2>
				<?php pota_component( 'post-meta' ) ?>
			</div>

			<?php pota_blurb_autofill(); ?>

<!-- 			<div class="post-footer">
				<a class="float-right p-t-10 btn btn-secondary" href="<?php the_permalink() ?>" role="button">Read More</a> 
			</div> -->
		</div>
	</div>
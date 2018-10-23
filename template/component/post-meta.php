<?php global $post ?>
<div class="post-meta">
	<span>
		<i class="fa fa-clock-o"></i>
        <?php echo get_the_date('j F Y') ?>
        <?php $user_login = get_the_author_meta('user_login',$post->post_author); ?>
		by <a href="<?php echo get_home_url().'/author/'.$user_login ?>"><?php the_author() ?></a>
	</span>
	<!-- <span><a href="#comments"><i class="fa fa-comment-o"></i> <?php echo get_comments_number() ?> comments</a></span> -->
</div>

<?php
function pota_blurb_autofill() {
	global $post;

	$meta_blurb = get_post_meta($post->ID, 'blurb', true);
	$trim   = 30; //max length of words to display

	if (!$meta_blurb || empty($meta_blurb))
	{
		$content = strip_tags($post->post_content);

		$old_arr = array_map('trim', explode(' ', $content));
		$new_arr = array_slice($old_arr, 0, $trim);

		$content = implode(' ',$new_arr).' ...';
		echo '<p>'.$content.'</p>';
	} else {
		echo '<p>'.$meta_blurb.'</p>';
	}
}

function pota_component($comp) {
	require get_template_directory() . '/template/component/'.$comp.'.php';
}

// search result only post
if (!is_admin()) {
	function pota_search_filter($query) {
		if ($query->is_search) {
			$query->set('post_type', 'post');
		}
		return $query;
	}
	add_filter('pre_get_posts','pota_search_filter');
}
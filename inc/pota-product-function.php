<?php
function pota_subnav_filter($tags) {
	if ($tags) {

        $terms = array_map(function($arr) {
            return get_term_by( 'id', $arr, 'post_tag');
        }, $tags);

       $guide_has_post = array_sum(
            array_map(function($arr) {
                return $arr->count;
            }, $terms)
        );

       return $guide_has_post;

    } else {
        return false;   
    }
}

function pota_subnav_title($slug) {
    $subnav_title = array(
        'news' => 'News',
        'reviews' => 'Review',
        'images' => 'Image',
        'videos' => 'Video',
        'guides' => 'Guide'
    );
    return $subnav_title[$slug];
}
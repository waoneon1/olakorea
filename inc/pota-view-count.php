<?php
/**
 *	Post View
 */
function pota_get_view_count($postID) {
    $count_key = 'pota_views';
    $count = get_post_meta($postID, $count_key, true);
    return $count; /* so you can show it */
}
function pota_add_view_count($postID) {
    $count_key = 'pota_views';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Run on selected page
add_action( 'wp', 'pota_view_count' );
function pota_view_count()
{
 	if (is_singular('post')) {
 		global $post;
 		pota_add_view_count(get_the_ID());
 	}

 	if (is_singular('product_post')) {
 		global $post;
 		pota_add_view_count(get_the_ID());
 	}
}

// =======================================================================================================
//         ADMIN
// ======================================================================================================= 
// POST
add_filter( 'manage_edit-post_columns', 'post_view_columns');
function post_view_columns( $columns ) {
  //  $column_meta = array( 'post_view' => '<span class="dashicons dashicons-visibility"></span>' );
    //$columns = array_slice( $columns, 0, 2, true ) + $column_meta + array_slice( $columns, 2, NULL, true );
    $columns['post_view'] = '<span class="dashicons dashicons-visibility"></span>';
    return $columns;
}
add_action( 'manage_posts_custom_column' , 'post_view_data' );
function post_view_data( $column ) {
    global $post;
    switch ( $column ) {
        case 'post_view':
            $metaData = get_post_meta( $post->ID, 'pota_views', true );
            echo ($metaData) ? $metaData : 0;
        break;
    }
}

// Product CPT
add_filter( 'manage_product_post_posts_columns', 'product_view_columns');
function product_view_columns( $columns ) {
  //  $column_meta = array( 'post_view' => '<span class="dashicons dashicons-visibility"></span>' );
    //$columns = array_slice( $columns, 0, 2, true ) + $column_meta + array_slice( $columns, 2, NULL, true );
    $columns['post_view'] = '<span class="dashicons dashicons-visibility"></span>';
    return $columns;
}
add_action( 'manage_product_post_posts_custom_column' , 'product_view_data' );
function product_view_data( $column ) {}

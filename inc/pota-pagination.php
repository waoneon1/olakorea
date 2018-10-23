<?php
/**
 *	Pagination
 */
function pota_paginate_links( $args = '' ) {
    global $wp_query, $wp_rewrite;
    // Setting up default values based on the current URL.
    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $url_parts    = explode( '?', $pagenum_link );
    // Get max pages and current page out of the current query, if available.
    $total   = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
    $current = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
    // Append the format placeholder to the base URL.
    $pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';
    // URL base depends on permalink settings.
    $format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
    $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';
    $defaults = array(
        'base'               => $pagenum_link, // http://example.com/all_posts.php%_% : %_% is replaced by format (below)
        'format'             => $format, // ?page=%#% : %#% is replaced by the page number
        'total'              => $total,
        'current'            => $current,
        'aria_current'       => 'page',
        'show_all'           => false,
        'prev_next'          => true,
        'prev_text'          => __( '&laquo; Previous' ),
        'next_text'          => __( 'Next &raquo;' ),
        'end_size'           => 1,
        'mid_size'           => 2,
        'type'               => 'plain',
        'add_args'           => array(), // array of query args to add
        'add_fragment'       => '',
        'before_page_number' => '',
        'after_page_number'  => '',
    );
    $args = wp_parse_args( $args, $defaults );
    if ( ! is_array( $args['add_args'] ) ) {
        $args['add_args'] = array();
    }
    // Merge additional query vars found in the original URL into 'add_args' array.
    if ( isset( $url_parts[1] ) ) {
        // Find the format argument.
        $format       = explode( '?', str_replace( '%_%', $args['format'], $args['base'] ) );
        $format_query = isset( $format[1] ) ? $format[1] : '';
        wp_parse_str( $format_query, $format_args );
        // Find the query args of the requested URL.
        wp_parse_str( $url_parts[1], $url_query_args );
        // Remove the format argument from the array of query arguments, to avoid overwriting custom format.
        foreach ( $format_args as $format_arg => $format_arg_value ) {
            unset( $url_query_args[ $format_arg ] );
        }
        $args['add_args'] = array_merge( $args['add_args'], urlencode_deep( $url_query_args ) );
    }
    // Who knows what else people pass in $args
    $total = (int) $args['total'];
    if ( $total < 2 ) {
        return;
    }
    $current  = (int) $args['current'];
    $end_size = (int) $args['end_size']; // Out of bounds?  Make it the default.
    if ( $end_size < 1 ) {
        $end_size = 1;
    }
    $mid_size = (int) $args['mid_size'];
    if ( $mid_size < 0 ) {
        $mid_size = 2;
    }
    $add_args   = $args['add_args'];
    $r          = '';
    $page_links = array();
    $dots       = false;
    if ( $args['prev_next']) :
        $link = str_replace( '%_%', 2 == $current ? '' : $args['format'], $args['base'] );
        $link = str_replace( '%#%', $current - 1, $link );
        if ( $add_args ) {
            $link = add_query_arg( $add_args, $link );
        }
        $link .= $args['add_fragment'];
        $pota_disable = ($current && 1 < $current) ? '' : 'disabled';
        /**
         * Filters the paginated links for the given archive pages.
         *
         * @since 3.0.0
         *
         * @param string $link The paginated link URL.
         */
        $pota_page_link = '<a class="prev page-numbers page-link" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '" aria-label="Previous">' . $args['prev_text'] . '</a>';
        $page_links[]   = "<li class='page-item ".$pota_disable."'>".$pota_page_link."</li>";
    endif;

    for ( $n = 1; $n <= $total; $n++ ) :
        if ( $n == $current ) :
            $pota_page_link = "<span class='page-numbers page-link'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . '</span>';
            $page_links[]   = "<li class='page-item active'>".$pota_page_link."</li>";
            $dots           = true;
        else :
            if ( $args['show_all'] || ( $n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size ) ) :
                $link = str_replace( '%_%', 1 == $n ? '' : $args['format'], $args['base'] );
                $link = str_replace( '%#%', $n, $link );
                if ( $add_args ) {
                    $link = add_query_arg( $add_args, $link );
                }
                $link .= $args['add_fragment'];
                /** This filter is documented in wp-includes/general-template.php */
                $pota_page_link = "<a class='page-numbers page-link' href='" . esc_url( apply_filters( 'paginate_links', $link ) ) . "'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . '</a>';
                $page_links[]   = "<li class='page-item'>".$pota_page_link."</li>";
                $dots           = true;
            elseif ( $dots && ! $args['show_all'] ) :
                $pota_page_link = '<span>' . __( '&hellip;' ) . '</span>';
                $page_links[]  = "<li class='separate'>".$pota_page_link."</li>";
                $dots           = false;
            endif;
        endif;
    endfor;
    if ( $args['prev_next'] ) :
        $link = str_replace( '%_%', $args['format'], $args['base'] );
        $link = str_replace( '%#%', $current + 1, $link );
        if ( $add_args ) {
            $link = add_query_arg( $add_args, $link );
        }
        $link .= $args['add_fragment'];
        $pota_disable = ($current && $current < $total) ? '' : 'disabled';
        /** This filter is documented in wp-includes/general-template.php */
        $pota_page_link = '<a class="next page-numbers page-link" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '" aria-label="Next">' . $args['next_text'] . '</a>';
        $page_links[]   = "<li class='page-item ".$pota_disable."'>".$pota_page_link."</li>";
    endif;

    $r .= "<ul class='pagination page-numbers'>\n\t";
    foreach ($page_links as $page_link) {
        $r .= $page_link."\n";
    }
    $r .= "</ul>";
    return $r;
}
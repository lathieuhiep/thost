<?php
// setting favicon
add_action('wp_head', 'thost_favicon', 1);
function thost_favicon(): void {
    $opt_favicon = thost_get_option( 'general_opt_favicon' );

    if ( empty( $opt_favicon['url'] ) ) :
        $favicon_url = get_theme_file_uri('/assets/images/favicon.png' );
    else:
	    $favicon_url = $opt_favicon['url'];
    endif;

    echo '<link rel="shortcut icon" href="' . esc_url( $favicon_url ) . '" type="image/x-icon" sizes="16x16" />';
}

// Sanitize Pagination
add_action( 'navigation_markup_template', 'thost_sanitize_pagination' );
function thost_sanitize_pagination( $thost_content ): string {
	// Remove role attribute
	$thost_content = str_replace( 'role="navigation"', '', $thost_content );

	// Remove h2 tag
	return preg_replace( '#<h2.*?>(.*?)<\/h2>#si', '', $thost_content );
}

// Walker for the main menu
add_filter( 'walker_nav_menu_start_el', 'thost_add_arrow',10,4);
function thost_add_arrow( $output, $item, $depth, $args ){
	if('primary' == $args->theme_location && $depth >= 0 ){
		if (in_array("menu-item-has-children", $item->classes)) {
			$output .='<span class="sub-menu-toggle"></span>';
		}
	}

	return $output;
}

// Custom Search Post
add_action( 'pre_get_posts', 'thost_include_custom_post_types_in_search_results' );
function thost_include_custom_post_types_in_search_results( $query ): void {
	if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
		$query->set( 'post_type', array( 'post' ) );
	}
}

//Disable emojis in WordPress
add_action( 'init', 'thost_disable_emojis' );
function thost_disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'thost_disable_emojis_tinymce' );
}

function thost_disable_emojis_tinymce( $plugins ): array
{
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}
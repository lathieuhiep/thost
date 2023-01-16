<?php
//
add_filter("use_block_editor_for_post_type", "disable_gutenberg_editor");
function disable_gutenberg_editor()
{
	return false;
}

function basictheme_get_version_theme(): string {
	return wp_get_theme()->get( 'Version' );
}
// Callback Comment List
function basictheme_comments( $basictheme_comment, $basictheme_comment_args, $basictheme_comment_depth ): bool {
	if ( 'div' === $basictheme_comment_args['style'] ) :
		$basictheme_comment_tag       = 'div';
		$basictheme_comment_add_below = 'comment';
	else :
		$basictheme_comment_tag       = 'li';
		$basictheme_comment_add_below = 'div-comment';
	endif;

	?>
	<<?php echo $basictheme_comment_tag ?><?php comment_class( empty( $basictheme_comment_args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

	<?php if ( 'div' != $basictheme_comment_args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>

	<div class="comment-author vcard">
		<?php if ( $basictheme_comment_args['avatar_size'] != 0 ) {
			echo get_avatar( $basictheme_comment, $basictheme_comment_args['avatar_size'] );
		} ?>
	</div>

	<?php if ( $basictheme_comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation">
			<?php esc_html_e( 'Your comment is awaiting moderation.', 'basictheme' ); ?>
		</em>
	<?php endif; ?>

	<div class="comment-meta commentmetadata">
		<div class="comment-meta-box">
             <span class="name">
                <?php comment_author_link(); ?>
            </span>
			<span class="comment-metadata">
                <?php comment_date(); ?>
            </span>

			<?php edit_comment_link( esc_html__( 'Edit ', 'basictheme' ) ); ?>

			<?php comment_reply_link( array_merge( $basictheme_comment_args, array(
				'add_below' => $basictheme_comment_add_below,
				'depth'     => $basictheme_comment_depth,
				'max_depth' => $basictheme_comment_args['max_depth']
			) ) ); ?>

		</div>

		<div class="comment-text-box">
			<?php comment_text(); ?>
		</div>
	</div>

	<?php if ( 'div' != $basictheme_comment_args['style'] ) : ?>
		</div>
	<?php
	endif;

	return true;
}

// Content Nav
function basictheme_comment_nav(): void {
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
?>
	<nav class="navigation comment-navigation">
		<h2 class="screen-reader-text">
			<?php esc_html_e( 'Comment navigation', 'basictheme' ); ?>
		</h2>

		<div class="nav-links">
			<?php
			if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'basictheme' ) ) ) :
				printf( '<div class="nav-previous">%s</div>', $prev_link );
			endif;

			if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'basictheme' ) ) ) :
				printf( '<div class="nav-next">%s</div>', $next_link );
			endif;
			?>
		</div>
	</nav>
<?php
	endif;
}

// Pagination
function basictheme_pagination(): void {
	the_posts_pagination( array(
		'type'               => 'list',
		'mid_size'           => 2,
		'prev_text'          => esc_html__( 'Previous', 'basictheme' ),
		'next_text'          => esc_html__( 'Next', 'basictheme' ),
		'screen_reader_text' => '&nbsp;',
	) );
}

// Pagination Nav Query
function basictheme_paging_nav_query( $query ): void {

	$args = array(
		'prev_text' => esc_html__( ' Previous', 'basictheme' ),
		'next_text' => esc_html__( 'Next', 'basictheme' ),
		'current'   => max( 1, get_query_var( 'paged' ) ),
		'total'     => $query->max_num_pages,
		'type'      => 'list',
	);

	$paginate_links = paginate_links( $args );

	if ( $paginate_links ) :

		?>
		<nav class="pagination">
			<?php echo $paginate_links; ?>
		</nav>

	<?php

	endif;
}

// Get col global
function basictheme_col_use_sidebar( $option_sidebar, $active_sidebar ): string
{
	if ( $option_sidebar != 'hide' && is_active_sidebar( $active_sidebar ) ):

		if ( $option_sidebar == 'left' ) :
			$class_position_sidebar = ' order-1 order-md-2';
		else:
			$class_position_sidebar = ' order-1';
		endif;

		$class_col_content = 'col-12 col-md-8 col-lg-9' . $class_position_sidebar;
	else:
		$class_col_content = 'col-md-12';
	endif;

	return $class_col_content;
}

function basictheme_col_sidebar(): string
{
	return 'col-12 col-md-4 col-lg-3';
}

// Post Meta
function basictheme_post_meta(): void {
	?>

	<div class="site-post-meta">
        <span class="site-post-author">
            <?php esc_html_e( 'Author:', 'basictheme' ); ?>

            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                <?php the_author(); ?>
            </a>
        </span>

		<span class="site-post-date">
            <?php esc_html_e( 'Post date: ', 'basictheme' );
            the_date(); ?>
        </span>

		<span class="site-post-comments">
            <?php
            comments_popup_link( '0 ' . esc_html__( 'Comment', 'basictheme' ), '1 ' . esc_html__( 'Comment', 'basictheme' ), '% ' . esc_html__( 'Comments', 'basictheme' ) );
            ?>
        </span>
	</div>

	<?php
}

// Link Pages
function basictheme_link_page(): void {

	wp_link_pages( array(
		'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'basictheme' ),
		'after'       => '</div>',
		'link_before' => '<span class="page-number">',
		'link_after'  => '</span>',
	) );

}

// Comment
function basictheme_comment_form(): void {

	if ( comments_open() || get_comments_number() ) :
		?>
		<div class="site-comments">
			<?php comments_template( '', true ); ?>
		</div>
	<?php
	endif;
}

// Get Category Check Box
function basictheme_check_get_cat( $type_taxonomy ): array
{
	$cat_check = array();
	$category  = get_terms(
		array(
			'taxonomy'   => $type_taxonomy,
			'hide_empty' => false
		)
	);

	if ( isset( $category ) && ! empty( $category ) ):
		foreach ( $category as $item ) {
			$cat_check[ $item->term_id ] = $item->name;
		}
	endif;

	return $cat_check;
}

// Get Contact Form 7
function basictheme_get_form_cf7(): array {
	$options = array();

	if ( function_exists('wpcf7') ) {

		$wpcf7_form_list = get_posts( array(
			'post_type' => 'wpcf7_contact_form',
			'numberposts' => -1,
		) );

		$options[0] = esc_html__('Select a Contact Form', 'basictheme');

		if ( !empty($wpcf7_form_list) && !is_wp_error($wpcf7_form_list) ) :
			foreach ( $wpcf7_form_list as $item ) :
				$options[$item->ID] = $item->post_title;
			endforeach;
		else :
			$options[0] = esc_html__('Create a Form First', 'basictheme');
		endif;

	}

	return $options;
}

// Share Facebook
function basictheme_post_share(): void {
	?>
	<div class="site-post-share">
		<iframe src="https://www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&width=150&layout=button&action=like&size=large&share=true&height=30&appId=612555202942781" width="150" height="30" style="border:none;overflow:hidden" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
	</div>
	<?php
}

// Social Network
function basictheme_get_social_url(): void {
	$opt_social_networks = basictheme_get_option('social_network_opt_list', '');

    if ( !empty( $opt_social_networks ) ) :
	    foreach ( $opt_social_networks as $item ) :
        ?>
            <div class="social-network-item">
                <a href="<?php echo esc_url( $item['url'] ); ?>" target="_blank">
                    <i class="<?php echo $item['icon']; ?>"></i>
                </a>
            </div>
        <?php

        endforeach;
    endif;
}
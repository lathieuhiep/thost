<?php
// A Custom function for get an option
if ( ! function_exists( 'thost_get_option' ) ) {
	function thost_get_option( $option = '', $default = null ) {
		$options = get_option( 'options' );

		return ( isset( $options[ $option ] ) ) ? $options[ $option ] : $default;
	}
}

// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {
// Set a unique slug-like ID
	$thost_prefix   = 'options';
	$thost_my_theme = wp_get_theme();

	// Create options
	CSF::createOptions( $thost_prefix, array(
		'menu_title'          => esc_html__( 'Theme Options', 'thost' ),
		'menu_slug'           => 'theme-options',
		'menu_position'       => 2,
		'admin_bar_menu_icon' => 'dashicons-admin-generic',
		'framework_title'     => $thost_my_theme->get( 'Name' ) . ' ' . esc_html__( 'Options', 'thost' ),
		'footer_text'         => esc_html__( 'Thank you for using my theme', 'thost' ),
		'footer_after'        => '<pre>Contact me:<br />Zalo/Phone: 0975458209 - Skype: lathieuhiep - Facebook: <a href="https://www.facebook.com/lathieuhiep" target="_blank">La Khắc Điệp</a></pre>',
	) );

	// Create a section general
	CSF::createSection( $thost_prefix, array(
		'title'  => esc_html__( 'General', 'thost' ),
		'icon'   => 'fas fa-cog',
		'fields' => array(
			// favicon
			array(
				'id'      => 'general_opt_favicon',
				'type'    => 'media',
				'title'   => esc_html__( 'Upload Image Favicon', 'thost' ),
				'library' => 'image',
				'url'     => false
			),

			// logo
			array(
				'id'      => 'general_opt_logo',
				'type'    => 'media',
				'title'   => esc_html__( 'Upload Image Logo', 'thost' ),
				'library' => 'image',
				'url'     => false
			),

			// show loading
			array(
				'id'         => 'general_opt_loading',
				'type'       => 'switcher',
				'title'      => esc_html__( 'website loader', 'thost' ),
				'text_on'    => esc_html__( 'Yes', 'thost' ),
				'text_off'   => esc_html__( 'No', 'thost' ),
				'text_width' => 80,
				'default'    => false
			),

			array(
				'id'         => 'general_opt_image_loading',
				'type'       => 'media',
				'title'      => esc_html__( 'Upload Image Loading', 'thost' ),
				'subtitle'   => esc_html__( 'Use file .git', 'thost' ) . ' <a href="https://loading.io/" target="_blank">loading.io</a>',
				'dependency' => array( 'general_opt_loading', '==', 'true' ),
				'url'        => false
			),

			// show back to top
			array(
				'id'         => 'general_opt_back_to_top',
				'type'       => 'switcher',
				'title'      => esc_html__( 'Use Back To Top', 'thost' ),
				'text_on'    => esc_html__( 'Yes', 'thost' ),
				'text_off'   => esc_html__( 'No', 'thost' ),
				'text_width' => 80,
				'default'    => true
			),
		)
	) );

	//
	// Create a section menu
	CSF::createSection( $thost_prefix, array(
		'title'  => esc_html__( 'Menu', 'thost' ),
		'icon'   => 'fas fa-bars',
		'fields' => array(
			// Sticky menu
			array(
				'id'         => 'menu_option_sticky',
				'type'       => 'switcher',
				'title'      => esc_html__( 'Sticky menu', 'thost' ),
				'text_on'    => esc_html__( 'Yes', 'thost' ),
				'text_off'   => esc_html__( 'No', 'thost' ),
				'text_width' => 80,
				'default'    => true
			),

			// Show cart
			array(
				'id'         => 'menu_option_cart',
				'type'       => 'switcher',
				'title'      => esc_html__( 'Cart', 'thost' ),
				'text_on'    => esc_html__( 'Yes', 'thost' ),
				'text_off'   => esc_html__( 'No', 'thost' ),
				'text_width' => 80,
				'default'    => true
			),
		)
	) );

	//
	// Create a section contact us
	CSF::createSection( $thost_prefix, array(
		'title'  => esc_html__( 'Contact us', 'thost' ),
		'icon'   => 'far fa-address-card',
		'fields' => array(
			// Show contact us
			array(
				'id'         => 'contact_us_opt_show',
				'type'       => 'switcher',
				'title'      => esc_html__( 'Show Contact Us', 'thost' ),
				'text_on'    => esc_html__( 'Yes', 'thost' ),
				'text_off'   => esc_html__( 'No', 'thost' ),
				'text_width' => 80,
				'default'    => true
			),

			// Address
			array(
				'id'      => 'contact_us_opt_address',
				'type'    => 'text',
				'title'   => esc_html__( 'Address', 'thost' ),
				'default' => esc_html__( '988782, Our Street, S State', 'thost' )
			),

			// Email
			array(
				'id'      => 'contact_us_opt_email',
				'type'    => 'text',
				'title'   => esc_html__( 'Email', 'thost' ),
				'default' => 'info@domain.com'
			),

			// Phone
			array(
				'id'      => 'contact_us_opt_phone',
				'type'    => 'text',
				'title'   => esc_html__( 'Phone', 'thost' ),
				'default' => '+1 234 567 186'
			),
		)
	) );

	//
	// -> Create a section blog
	CSF::createSection( $thost_prefix, array(
		'id'    => 'blog_opt_section',
		'icon'  => 'fas fa-blog',
		'title' => esc_html__( 'Blog', 'thost' ),
	) );

	// Category Post
	CSF::createSection( $thost_prefix, array(
		'parent' => 'blog_opt_section',
		'title'  => esc_html__( 'Category', 'thost' ),
		'description' => esc_html__( 'Use for archive, index, page search', 'thost' ),
		'fields' => array(
			// Sidebar
			array(
				'id'      => 'blog_cat_opt_sidebar',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar position', 'thost' ),
				'options' => array(
					'hide'  => esc_html__( 'Hide', 'thost' ),
					'left'  => esc_html__( 'Left', 'thost' ),
					'right' => esc_html__( 'Right', 'thost' ),
				),
				'default' => 'right'
			),

			// Per Row
			array(
				'id'      => 'blog_cat_opt_per_row',
				'type'    => 'select',
				'title'   => esc_html__( 'Blog Per Row', 'thost' ),
				'options' => array(
					'2' => esc_html__( '2 Column', 'thost' ),
					'3' => esc_html__( '3 Column', 'thost' ),
					'4' => esc_html__( '4 Column', 'thost' ),
				),
				'default' => '3'
			),
		)
	) );

	// Single Post
	CSF::createSection( $thost_prefix, array(
		'parent' => 'blog_opt_section',
		'title'  => esc_html__( 'Single', 'thost' ),
		'fields' => array(
			array(
				'id'      => 'single_opt_sidebar',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar position', 'thost' ),
				'options' => array(
					'hide'  => esc_html__( 'Hide', 'thost' ),
					'left'  => esc_html__( 'Left', 'thost' ),
					'right' => esc_html__( 'Right', 'thost' ),
				),
				'default' => 'right'
			),

			array(
				'id'         => 'single_opt_share_post',
				'type'       => 'switcher',
				'title'      => esc_html__( 'Share post', 'thost' ),
				'text_on'    => esc_html__( 'Yes', 'thost' ),
				'text_off'   => esc_html__( 'No', 'thost' ),
				'default'    => true,
				'text_width' => 80
			),

			// Show related post
			array(
				'id'         => 'single_opt_related_post',
				'type'       => 'switcher',
				'title'      => esc_html__( 'Show related post', 'thost' ),
				'text_on'    => esc_html__( 'Yes', 'thost' ),
				'text_off'   => esc_html__( 'No', 'thost' ),
				'default'    => true,
				'text_width' => 80
			),

			// Limit related post
			array(
				'id'      => 'single_opt_limit_related_post',
				'type'    => 'number',
				'title'   => esc_html__( 'Limit related post', 'thost' ),
				'default' => 3,
			),
		)
	) );

	//
	// Create a section social network
	CSF::createSection( $thost_prefix, array(
		'title'  => esc_html__( 'Social Network', 'thost' ),
		'icon'   => 'fab fa-hive',
		'fields' => array(
			array(
				'id'      => 'social_network_opt_list',
				'type'    => 'repeater',
				'title'   => esc_html__( 'Social Network', 'thost' ),
				'fields'  => array(
					array(
						'id'      => 'icon',
						'type'    => 'icon',
						'title'   => esc_html__( 'Icon', 'thost' ),
						'default' => 'fab fa-facebook-f'
					),

					array(
						'id'    => 'url',
						'type'  => 'text',
						'title' => esc_html__('URL', 'thost'),
						'default' => '#'
					),

				),
				'default' => array(
					array(
						'icon' => 'fab fa-facebook-f',
						'url' => '#',
					),

					array(
						'icon' => 'fab fa-youtube',
						'url' => '#',
					),
				)
			),
		)
	) );

	//
	//  Create a section shop
	CSF::createSection( $thost_prefix, array(
		'title'  => esc_html__( 'Shop', 'thost' ),
		'icon'   => 'fas fa-shopping-cart',
		'fields' => array(
			// Sidebar
			array(
				'id'      => 'shop_opt_sidebar',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar position', 'thost' ),
				'options' => array(
					'hide'  => esc_html__( 'Hide', 'thost' ),
					'left'  => esc_html__( 'Left', 'thost' ),
					'right' => esc_html__( 'Right', 'thost' ),
				),
				'default' => 'left'
			),

			// Limit
			array(
				'id'      => 'shop_opt_limit',
				'type'    => 'number',
				'title'   => esc_html__( 'Limit Product', 'thost' ),
				'default' => 12,
			),

			// Per Row
			array(
				'id'      => 'shop_opt_per_row',
				'type'    => 'select',
				'title'   => esc_html__( 'Products Per Row', 'thost' ),
				'options' => array(
					'3' => esc_html__( '3 Column', 'thost' ),
					'4' => esc_html__( '4 Column', 'thost' ),
					'5' => esc_html__( '5 Column', 'thost' ),
				),
				'default' => '4'
			),
		)
	) );

	//
	// -> Create a section footer
	CSF::createSection( $thost_prefix, array(
		'id'    => 'footer_opt_section',
		'icon'  => 'fas fa-stream',
		'title' => esc_html__( 'Footer', 'thost' ),
	) );

	// footer columns
	CSF::createSection( $thost_prefix, array(
		'parent' => 'footer_opt_section',
		'title'  => esc_html__( 'Columns Sidebar', 'thost' ),
		'fields' => array(
			// select columns
			array(
				'id'      => 'footer_opt_columns',
				'type'    => 'select',
				'title'   => esc_html__( 'Number of footer columns', 'thost' ),
				'options' => array(
					'0' => esc_html__( 'Hide', 'thost' ),
					'1' => esc_html__( '1', 'thost' ),
					'2' => esc_html__( '2', 'thost' ),
					'3' => esc_html__( '3', 'thost' ),
					'4' => esc_html__( '4', 'thost' ),
				),
				'default' => '4'
			),

			// column width 1
			array(
				'id'         => 'footer_opt_column_width_1',
				'type'       => 'slider',
				'title'      => esc_html__( 'Column width 1', 'thost' ),
				'default'    => 3,
				'min'        => 1,
				'max'        => 12,
				'dependency' => array( 'footer_opt_columns', '!=', '0' )
			),

			// column width 2
			array(
				'id'         => 'footer_opt_column_width_2',
				'type'       => 'slider',
				'title'      => esc_html__( 'Column width 2', 'thost' ),
				'default'    => 3,
				'min'        => 1,
				'max'        => 12,
				'dependency' => array( 'footer_opt_columns', 'not-any', '0,1' )
			),

			// column width 3
			array(
				'id'         => 'footer_opt_column_width_3',
				'type'       => 'slider',
				'title'      => esc_html__( 'Column width 3', 'thost' ),
				'default'    => 3,
				'min'        => 1,
				'max'        => 12,
				'dependency' => array( 'footer_opt_columns', 'not-any', '0,1,2' )
			),

			// column width 4
			array(
				'id'         => 'footer_opt_column_width_4',
				'type'       => 'slider',
				'title'      => esc_html__( 'Column width 4', 'thost' ),
				'default'    => 3,
				'min'        => 1,
				'max'        => 12,
				'dependency' => array( 'footer_opt_columns', 'not-any', '0,1,2,3' )
			),
		)
	) );

	// Copyright
	CSF::createSection( $thost_prefix, array(
		'parent' => 'footer_opt_section',
		'title'  => esc_html__( 'Copyright', 'thost' ),
		'fields' => array(
			// show
			array(
				'id'         => 'copyright_opt_show',
				'type'       => 'switcher',
				'title'      => esc_html__( 'Show copyright', 'thost' ),
				'text_on'    => esc_html__( 'Yes', 'thost' ),
				'text_off'   => esc_html__( 'No', 'thost' ),
				'text_width' => 80,
				'default'    => true
			),

			// content
			array(
				'id'      => 'copyright_opt_content',
				'type'    => 'wp_editor',
				'title'   => esc_html__( 'Content', 'thost' ),
				'media_buttons' => false,
				'default' => esc_html__( 'Copyright &amp; DiepLK', 'thost' )
			),
		)
	) );
}
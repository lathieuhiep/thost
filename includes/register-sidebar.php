<?php
// Remove gutenberg widgets
add_filter('use_widgets_block_editor', '__return_false');

/* Better way to add multiple widgets areas */
function thost_widget_registration($name, $id, $description = ''): void {
	register_sidebar( array(
		'name' => $name,
		'id' => $id,
		'description' => $description,
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
}

function thost_multiple_widget_init(): void {
	thost_widget_registration( esc_html__('Sidebar Main', 'thost'), 'sidebar-main' );

	thost_widget_registration( esc_html__('Sidebar Footer Mid 1', 'thost'), 'sidebar-footer-mid-1' );
	thost_widget_registration( esc_html__('Sidebar Footer Mid 2', 'thost'), 'sidebar-footer-mid-2' );
	thost_widget_registration( esc_html__('Sidebar Footer Mid 3', 'thost'), 'sidebar-footer-mid-3' );
	thost_widget_registration( esc_html__('Sidebar Footer Mid 4', 'thost'), 'sidebar-footer-mid-4' );

	thost_widget_registration( esc_html__('Sidebar Footer Bottom 1', 'thost'), 'sidebar-footer-bottom-1' );
	thost_widget_registration( esc_html__('Sidebar Footer Bottom 2', 'thost'), 'sidebar-footer-bottom-2' );
	thost_widget_registration( esc_html__('Sidebar Footer Bottom 3', 'thost'), 'sidebar-footer-bottom-3' );
	thost_widget_registration( esc_html__('Sidebar Footer Bottom 4', 'thost'), 'sidebar-footer-bottom-4' );
}

add_action('widgets_init', 'thost_multiple_widget_init');
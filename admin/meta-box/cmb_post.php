<?php
add_action('cmb2_admin_init', 'thost_post_meta_boxes');
function thost_post_meta_boxes(): void {
    $cmb = new_cmb2_box(array(
        'id' => 'thost_cmb_post',
        'title' => esc_html__('Option metabox', 'thost'),
        'object_types' => array('post'),
        'context' => 'normal',
        'priority' => 'low',
        'show_names' => true,
    ));

    $cmb->add_field( array(
        'id'   => 'thost_cmb_post_title',
        'name' => esc_html__( 'Test Title', 'thost' ),
        'type' => 'title',
        'desc' => esc_html__( 'This is a title description', 'thost' ),
    ) );
}
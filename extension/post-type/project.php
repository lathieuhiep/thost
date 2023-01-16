<?php
/*
*---------------------------------------------------------------------
* This file create and contains the template post_type meta elements
*---------------------------------------------------------------------
*/

add_action('init', 'thost_create_project', 10);

function thost_create_project() {

    /* Start post type template */
    $labels = array(   
        'name'                  =>  _x( 'Dự án', 'post type general name', 'thost' ),
        'singular_name'         =>  _x( 'Dự án', 'post type singular name', 'thost' ),
        'menu_name'             =>  _x( 'Dự án', 'admin menu', 'thost' ),
        'name_admin_bar'        =>  _x( 'Danh sách Dự án', 'add new on admin bar', 'thost' ),
        'add_new'               =>  _x( 'Thêm mới', 'Dự án', 'thost' ),
        'add_new_item'          =>  esc_html__( 'Thêm Dự án', 'thost' ),
        'edit_item'             =>  esc_html__( 'Sửa Dự án', 'thost' ),
        'new_item'              =>  esc_html__( 'Dự án mới', 'thost' ),
        'view_item'             =>  esc_html__( 'Xem dự án', 'thost' ),
        'all_items'             =>  esc_html__( 'Tất cả dự án', 'thost' ),
        'search_items'          =>  esc_html__( 'Tìm kiếm dự án', 'thost' ),
        'not_found'             =>  esc_html__( 'Không tìm thấy', 'thost' ),
        'not_found_in_trash'    =>  esc_html__( 'Không tìm thấy trong thùng rác', 'thost' ),
        'parent_item_colon'     =>  ''
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'menu_icon'          => 'dashicons-open-folder',
        'capability_type'    => 'post',
        'rewrite'            => array('slug' => 'du-an' ),
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    );

    register_post_type('thost_project', $args );
    /* End post type template */

    /* Start taxonomy */
    $taxonomy_labels = array(
        'name'              => _x( 'Danh mục dự án', 'taxonomy general name', 'thost' ),
        'singular_name'     => _x( 'Danh mục dự án', 'taxonomy singular name', 'thost' ),
        'search_items'      => __( 'Tìm kiếm danh mục', 'thost' ),
        'all_items'         => __( 'Tất cả danh mục', 'thost' ),
        'parent_item'       => __( 'Danh mục cha', 'thost' ),
        'parent_item_colon' => __( 'Danh mục cha:', 'thost' ),
        'edit_item'         => __( 'Sửa', 'thost' ),
        'update_item'       => __( 'Cập nhật', 'thost' ),
        'add_new_item'      => __( 'Thêm mới', 'thost' ),
        'new_item_name'     => __( 'Tên mới', 'thost' ),
        'menu_name'         => __( 'Danh mục', 'thost' ),
    );

    $taxonomy_args = array(

        'labels'            => $taxonomy_labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'danh-muc-du-an' ),
    );

    register_taxonomy( 'thost_project_cat', array( 'thost_project' ), $taxonomy_args );
    /* End taxonomy */

}
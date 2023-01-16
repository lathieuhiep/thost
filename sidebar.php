<?php if( is_active_sidebar( 'thost-sidebar-main' ) ): ?>

    <aside class="<?php echo esc_attr( thost_col_sidebar() ); ?> site-sidebar order-1">
        <?php dynamic_sidebar( 'thost-sidebar-main' ); ?>
    </aside>

<?php endif; ?>
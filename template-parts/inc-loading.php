<?php
$show_loading = thost_get_option( 'general_opt_loading', '0' );

if(  $show_loading == '1' ) :
    $opt_image_loading  = thost_get_option( 'general_opt_image_loading' );
?>
    <div id="site-loadding" class="d-flex align-items-center justify-content-center">
        <?php if ( !empty( $opt_image_loading['url'] ) ): ?>
            <img class="loading_img" src="<?php echo esc_url( $opt_image_loading['url'] ); ?>" alt="<?php esc_attr_e('loading...','thost') ?>"  >
        <?php else: ?>
            <img class="loading_img" src="<?php echo esc_url(get_theme_file_uri( '/assets/images/loading.gif' )); ?>" alt="<?php esc_attr_e('loading...','thost') ?>">
        <?php endif; ?>
    </div>
<?php endif; ?>
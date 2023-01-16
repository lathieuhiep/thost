<?php
$opt_number_columns = basictheme_get_option('footer_opt_columns', '4');

if( is_active_sidebar( 'basictheme-sidebar-footer-column-1' ) || is_active_sidebar( 'basictheme-sidebar-footer-column-2' ) || is_active_sidebar( 'basictheme-sidebar-footer-column-3' ) || is_active_sidebar( 'basictheme-sidebar-footer-column-4' ) ) :

?>

    <div class="site-footer__column">
        <div class="container">
            <div class="row">
                <?php
                for( $i = 0; $i < $opt_number_columns; $i++ ):
                    $j = $i +1;
                    $basictheme_col = basictheme_get_option( 'footer_opt_column_width_' .  $j, 3);

                    if( is_active_sidebar( 'basictheme-sidebar-footer-column-'.$j ) ):
                ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-<?php echo esc_attr( $basictheme_col ); ?>">
                        <?php dynamic_sidebar( 'basictheme-sidebar-footer-column-'.$j ); ?>
                    </div>
                <?php
                    endif;
                endfor;
                ?>
            </div>
        </div>
    </div>

<?php endif; ?>
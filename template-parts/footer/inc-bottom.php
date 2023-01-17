<?php
$opt_number_columns = thost_get_option('footer_opt_sidebar_bottom', '4');

if( is_active_sidebar( 'sidebar-footer-bottom-1' ) || is_active_sidebar( 'sidebar-footer-bottom-2' ) || is_active_sidebar( 'sidebar-footer-bottom-3' ) || is_active_sidebar( 'sidebar-footer-bottom-4' ) ) :
	?>

    <div class="footer__item footer__bottom">
        <div class="row align-items-center">
			<?php
			for( $i = 0; $i < $opt_number_columns; $i++ ):
				$j = $i +1;
				$col = thost_get_option( 'footer_opt_sidebar_bottom_' .  $j, 3);

				if( is_active_sidebar( 'sidebar-footer-bottom-' . $j ) ):
					?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-<?php echo esc_attr( $col ); ?>">
						<?php dynamic_sidebar( 'sidebar-footer-bottom-' . $j ); ?>
                    </div>
				<?php
				endif;
			endfor;
			?>
        </div>
    </div>

<?php endif; ?>
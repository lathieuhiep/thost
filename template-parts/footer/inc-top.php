<?php
$opt_logo_footer = thost_get_option('footer_opt_logo');

if ( !empty( $opt_logo_footer ) && !empty( $opt_logo_footer['id'] ) ) :
?>

<div class="footer__item footer__top">
	<a href="<?php echo esc_url( home_url('/') ) ?>">
        <?php echo wp_get_attachment_image( $opt_logo_footer['id'], 'full' ); ?>
    </a>
</div>

<?php endif; ?>
<?php
$sticky_menu = thost_get_option( 'menu_option_sticky', '1' );
?>
<header id="home" class="site-header<?php echo esc_attr( $sticky_menu == '1' ? ' active-sticky-nav' : '' ); ?>">
	<?php get_template_part( 'template-parts/header/inc', 'nav' ); ?>
</header>
<?php
$sticky_menu = basictheme_get_option( 'menu_option_sticky', '1' );
$logo = basictheme_get_option( 'general_opt_logo' );
$cart = basictheme_get_option( 'menu_option_cart', '1' );
?>

<nav id="site-navigation" class="main-navigation<?php echo esc_attr( $sticky_menu == '1' ? ' active-sticky-nav' : '' ); ?>">
    <div class="site-navbar navbar-expand-lg">
        <div class="container">
            <div class="site-navigation_warp d-flex justify-content-lg-end">
                <div class="site-logo d-flex align-items-center">
                    <a href="<?php echo esc_url( get_home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
                        <?php
                            if ( !empty( $logo['id'] ) ) :
                                echo wp_get_attachment_image( $logo['id'], 'full' );
                            else :
                        ?>

                            <img class="logo-default" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/logo.png' ) ) ?>" alt="<?php echo esc_attr( get_bloginfo('title') ); ?>" width="64" height="64" />

                        <?php endif; ?>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#site-menu" aria-controls="site-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                </div>

                <div id="site-menu" class="site-menu collapse navbar-collapse d-lg-flex justify-content-lg-end">
                    <?php
                    if ( has_nav_menu('primary') ) :
                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'menu_class'     => 'navbar-nav',
                            'container'      => false,
                        ) ) ;
                    else:
                    ?>
                        <ul class="main-menu">
                            <li>
                                <a href="<?php echo get_admin_url().'/nav-menus.php'; ?>">
                                    <?php esc_html_e( 'ADD TO MENU','basictheme' ); ?>
                                </a>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>

                <?php if ( class_exists('Woocommerce') && $cart == '1' && !is_cart() && !is_checkout() ) : ?>
                    <div class="shop-cart-view d-flex align-items-center">
                        <?php
                        do_action( 'basictheme_woo_shopping_cart' );

                        the_widget( 'WC_Widget_Cart', '' );
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
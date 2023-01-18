<?php
$logo = thost_get_option( 'general_opt_logo' );
$opt_link_register_login = thost_get_option( 'menu_opt_link_register_login' );
$opt_link_target = thost_get_option( 'menu_opt_link_target' );
?>

<header class="global-header">
    <nav class="global-header__nav main-nav container align-items-lg-center">
        <div class="main-nav__logo">
            <a href="<?php echo esc_url( get_home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
                <?php
                if ( !empty( $logo['id'] ) ) :
                    echo wp_get_attachment_image( $logo['id'], 'full' );
                else :
                    ?>

                    <img class="logo-default" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/logo.png' ) ) ?>" alt="<?php echo esc_attr( get_bloginfo('title') ); ?>" width="64" height="64" />

                <?php endif; ?>
            </a>

            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav__menu" aria-controls="main-nav__menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
        </div>

        <div id="main-nav__menu" class="main-nav__menu collapse d-lg-block">
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_class' => 'd-flex',
                    'container' => false,
                ) ) ;
             ?>
        </div>

        <div class="main-nav__action">
            <a href="<?php echo esc_url( $opt_link_register_login ) ?>" class="link" target="<?php echo esc_attr( $opt_link_target ); ?>">
                <span class="register"><?php esc_html_e('Đăng kí', 'thost'); ?></span>
                <span class="login"><?php esc_html_e('Đăng nhập', 'thost'); ?></span>
            </a>
        </div>
    </nav>
</header>
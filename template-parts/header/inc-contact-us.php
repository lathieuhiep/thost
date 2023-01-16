<?php
$show_contact_us = basictheme_get_option('contact_us_opt_show', '1');

if ( $show_contact_us == '1' ) :
    $address = basictheme_get_option('contact_us_opt_address', '988782, Our Street, S State');
    $mail = basictheme_get_option('contact_us_opt_email', 'info@domain.com');
    $phone = basictheme_get_option('contact_us_opt_phone', '+1 234 567 186');
?>

<div class="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-7">
                 <span>
                    <i class="fas fa-map-marker" aria-hidden="true"></i>
                    <?php echo esc_html( $address ); ?>
                </span>

                <span>
                    <i class="fas fa-envelope"></i>
                    <?php echo esc_html( $mail ); ?>
                </span>

                <span>
                    <i class="fas fa-mobile-alt"></i>
                    <?php echo esc_html( $phone ); ?>
                </span>
            </div>

            <div class="col-12 col-md-12 col-lg-5 d-none d-lg-block">
                <div class="contact-us__social-network d-lg-flex justify-content-lg-end">
                    <?php basictheme_get_social_url(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
endif;
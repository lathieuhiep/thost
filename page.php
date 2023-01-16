<?php
get_header();

$thost_check_elementor =   get_post_meta( get_the_ID(), '_elementor_edit_mode', true );

$thost_class_elementor =   '';

if ( $thost_check_elementor ) :
    $thost_class_elementor =   ' site-container-elementor';
endif;
?>

    <main class="site-container<?php echo esc_attr( $thost_class_elementor ); ?>">
        <?php
        if ( $thost_check_elementor ) :
            get_template_part('template-parts/page/content','page-elementor');
        else:
            get_template_part('template-parts/page/content','page');
        endif;
        ?>
    </main>

<?php 

get_footer();
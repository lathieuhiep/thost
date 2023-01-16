<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!--Include Loading Template-->
<?php
get_template_part('template-parts/inc','loading');

if ( !is_404() ) {
	get_template_part('template-parts/header/inc','header');
}
?>
<!--End Loading Template-->

<!--Start back top-->
<?php
$opt_back_to_top = basictheme_get_option( 'general_opt_back_to_top', '1' );

if ( $opt_back_to_top == '1' ) :
?>
    <div id="back-top">
        <a href="#">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
<?php endif; ?>
<!--End back top-->

<!--Start Sticky Footer-->
<div class="sticky-footer">



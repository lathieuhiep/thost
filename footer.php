</div><!--End Sticky Footer-->

<?php if ( !is_404() ) : ?>

<footer class="site-footer">
    <?php
    get_template_part( 'template-parts/footer/inc','multi-column' );

    get_template_part( 'template-parts/footer/inc','copyright' );
    ?>
</footer>

<?php
endif;

wp_footer();
?>

</body>
</html>

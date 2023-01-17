</div><!--End Sticky Footer-->

<?php if ( !is_404() ) : ?>

<footer class="footer">
    <div class="container">
	    <?php
	    get_template_part( 'template-parts/footer/inc','top' );
	    get_template_part( 'template-parts/footer/inc','mid' );
	    get_template_part( 'template-parts/footer/inc','bottom' );
	    ?>
    </div>
</footer>

<?php
endif;

wp_footer();
?>

</body>
</html>

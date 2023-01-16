<div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="site-page-content">
            <?php
            the_content();
            thost_link_page();
            ?>
        </div>
    <?php
        thost_comment_form();
    endwhile;
    ?>
</div>
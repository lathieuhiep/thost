<?php
$show_related = thost_get_option('single_opt_related_post', '1');
?>

<div id="post-<?php the_ID() ?>" <?php post_class( 'site-post-single-item' ); ?>>
    <?php if ( has_post_thumbnail() ) :?>
        <div class="site-post-image">
            <?php the_post_thumbnail('full'); ?>
        </div>
    <?php endif; ?>

    <div class="site-post-content">
        <h2 class="site-post-title">
            <?php the_title(); ?>
        </h2>

        <?php thost_post_meta(); ?>

        <div class="site-post-excerpt">
            <?php
            the_content();

            thost_link_page();
            ?>
        </div>

        <div class="site-post-cat-tag">
            <?php if( get_the_category() ): ?>
                <p class="site-post-category">
                    <?php
                    esc_html_e('Category: ','thost');
                    the_category( ' ' );
                    ?>
                </p>
            <?php
            endif;

            if( get_the_tags() ):
            ?>
                <p class="site-post-tag">
                    <?php
                    esc_html_e( 'Tag: ','thost' );
                    the_tags('',' ');
                    ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
thost_comment_form();

if ( $show_related == '1' ) :
    get_template_part( 'template-parts/post/inc','related-post' );
endif;






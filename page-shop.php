<?php
/*
    Template Name: Shop
*/
?>
<?php



get_header(); ?>
<main id="main" class="site-main" role="main">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
            do_action('storefront_page_before');
            get_template_part('content', 'page');
            /**
             * Functions hooked in to storefront_page_after action
             *
             * @hooked storefront_display_comments - 10
             */
            do_action('storefront_page_after');
        endwhile; // End of the loop.
        ?>
    </div>
</main><!-- #main -->
<?php
get_footer();

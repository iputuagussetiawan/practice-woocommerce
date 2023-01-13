<?php

/*
    Template Name: Wishlist
*/

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package storefront
 */

get_header(); ?>
<main id="main" class="site-main" role="main">
    <section class="wishlist">
        <div class="container">
            <?php
            do_action('storefront_page_before');
            get_template_part('content', 'page');
            do_action('storefront_page_after');
            ?>
        </div>
    </section>
</main><!-- #main -->
<?php
get_footer();

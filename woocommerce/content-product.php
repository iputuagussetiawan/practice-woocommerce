<?php
$themeVersion = wp_get_theme()->get('Version');
wp_enqueue_style('content-product_css', get_stylesheet_directory_uri() . '/build/css/content-product.css', array(), $themeVersion, 'all');


/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
	return;
}
?>
<div <?php wc_product_class('card-product', $product); ?>>
	<a href="<?php the_permalink(); ?>">
		<div class="card-product__image-container">

			<?php if (function_exists('woocommerce_template_loop_product_thumbnail')) echo woocommerce_template_loop_product_thumbnail(); ?>
		</div>
		<div class="card-product__info-container">
			<h3 class="card-product__title"><small><?php the_title(); ?></small></h3>
			<?php echo apply_filters('woocommerce_short_description', $post->post_excerpt) ?>
			<?php if (function_exists('woocommerce_template_loop_price')) echo woocommerce_template_loop_price(); ?>
			<?php if (function_exists('woocommerce_template_loop_rating')) echo woocommerce_template_loop_rating(); ?>
			<?php if (function_exists('woo_add_compare_button')) echo woo_add_compare_button(); ?>
			<?php if (function_exists('woocommerce_template_loop_add_to_cart')) echo woocommerce_template_loop_add_to_cart(); ?>
			<?php
			echo do_shortcode('[yith_wcwl_add_to_wishlist]');
			?>
		</div>

	</a>
</div>
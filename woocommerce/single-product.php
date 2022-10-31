<?php
$currentLang = pll_current_language();
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

get_header('shop'); ?>

<?php
/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */
do_action('woocommerce_before_main_content');
?>

<?php while (have_posts()) : ?>
	<?php the_post(); ?>

	<?php wc_get_template_part('content', 'single-product'); ?>

<?php endwhile; // end of the loop. 
?>

<div class="container">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb black">
			<li class="breadcrumb-item">
				<?php if ($currentLang == 'en') { ?>
					<a href="<?php echo get_option("siteurl"); ?>">Home</a>
				<?php } elseif ($currentLang == 'id') { ?>
					<a href="<?php echo get_option("siteurl"); ?>/id">Beranda</a>
				<?php } ?>
			</li>

			<li class="breadcrumb-item">
				<a href="<?php echo get_option("siteurl") . '/shop'; ?>">Shop</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page"><?php the_title() ?>
			</li>
		</ol>
	</nav>
</div>



<?php
/**
 * woocommerce_after_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');
?>



<?php
/**
 * woocommerce_sidebar hook.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action('woocommerce_sidebar');
?>

<?php
get_footer('shop');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

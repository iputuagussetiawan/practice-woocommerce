<?php
$themeVersion = wp_get_theme()->get('Version');
$currentLang = pll_current_language();
wp_enqueue_style('shop_css', get_stylesheet_directory_uri() . '/build/css/shop.css', array(), $themeVersion, 'all');

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');
?>


<?php
$productCategory = get_queried_object();
if (is_product_category()) :
	$catId			 = $productCategory->taxonomy . '_' . $productCategory->term_id;
	$categoryPageHeader = get_field('page_header_product_category', $catId);

	if ($categoryPageHeader) :
		// Image variables.
		$urlCategoryPageHeader = $categoryPageHeader['url'];
	endif;
?>

	<section class="page-header">
		<?php
		if ($categoryPageHeader) :
		?>
			<div class="page-header__image-container">
				<img class="page-header__image" src="<?php echo $urlCategoryPageHeader ?>" alt="<?php echo $productCategory->name ?>">
			</div>
			<div class="container page-header__info">
				<h1 class="page-header__title"><?php echo $productCategory->name ?></h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<?php if ($currentLang == 'en') { ?>
								<a href="<?php echo get_option("siteurl"); ?>">Home</a>
							<?php } elseif ($currentLang == 'id') { ?>
								<a href="<?php echo get_option("siteurl"); ?>/id">Beranda</a>
							<?php } ?>
						</li>
						<li class="breadcrumb-item active" aria-current="page"><?php echo $productCategory->name ?></li>
					</ol>
				</nav>
			</div>
		<?php
		endif;
		?>
	</section>
<?php else : ?>
	<section class="page-header">
		<?php
		$pageShopID = get_field('shop_link', 'page_link')->ID;
		$shopImagePageHeader = get_field('page_header_image', $pageShopID);
		if ($shopImagePageHeader) :
			$urlShopImagePageHeader = $shopImagePageHeader['url'];
		endif;
		?>
		<div class="page-header__image-container">
			<img class="page-header__image" src="<?php echo $urlShopImagePageHeader ?>" alt="shop">
		</div>
		<div class="container page-header__info">
			<h1 class="page-header__title">Shop</h1>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<?php if ($currentLang == 'en') { ?>
							<a href="<?php echo get_option("siteurl"); ?>">Home</a>
						<?php } elseif ($currentLang == 'id') { ?>
							<a href="<?php echo get_option("siteurl"); ?>/id">Beranda</a>
						<?php } ?>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Shop</li>
				</ol>
			</nav>
		</div>

	</section>
<?php endif; ?>

<section class="section-shop">
	<div class="container section-padding--top">
		<div class="row">
			<div class="col-md-3">
				<?php
				//echo do_shortcode('[searchandfilter id="shop_filter"]');
				echo do_shortcode('[woof]');
				?>
			</div>
			<div class="col-md-9">

				<?php
				if (woocommerce_product_loop()) {

					/**
					 * Hook: woocommerce_before_shop_loop.
					 *
					 * @hooked woocommerce_output_all_notices - 10
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					do_action('woocommerce_before_shop_loop');

					woocommerce_product_loop_start();

					if (wc_get_loop_prop('total')) {
						while (have_posts()) {
							the_post();

							/**
							 * Hook: woocommerce_shop_loop.
							 */
							do_action('woocommerce_shop_loop');
				?>
							<?php
							wc_get_template_part('content', 'product');
							?>


				<?php
						}
					}

					woocommerce_product_loop_end();

					/**
					 * Hook: woocommerce_after_shop_loop.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action('woocommerce_after_shop_loop');
				} else {
					/**
					 * Hook: woocommerce_no_products_found.
					 *
					 * @hooked wc_no_products_found - 10
					 */
					do_action('woocommerce_no_products_found');
				}
				?>

			</div>
		</div>
	</div>
</section>
<?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action('woocommerce_sidebar');

?>


<?php
get_footer('shop');
?>
<?php

/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php do_action('storefront_before_site'); ?>
	<?php do_action('storefront_before_header'); ?>
	<nav class="navbar navbar-custom navbar-expand-lg">
		<div class="navbar-custom__top">
			<?php
			wp_nav_menu(array(
				'theme_location' => 'top-menu',
				'container' => false,
				'menu_class' => ' navbar-custom__top-menu',
				'fallback_cb' => '__return_false',
				'items_wrap' => '<ul id="%1$s" class="navbar-nav%2$s">%3$s</ul>',
				'depth' => 2,
				'walker' => new bootstrap_5_wp_nav_menu_walker()
			));
			?>
		</div>
		<div class="container-fluid">
			<?php
			if (function_exists('the_custom_logo')) {
				the_custom_logo();
			}
			?>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarScroll">
				<?php
				wp_nav_menu(array(
					'theme_location' => 'header-menu-primary',
					'container' => false,
					'menu_class' => ' me-auto my-2 my-lg-0 navbar-nav-scroll',
					'fallback_cb' => '__return_false',
					'items_wrap' => '<ul id="%1$s" class="navbar-nav%2$s">%3$s</ul>',
					'depth' => 2,
					'walker' => new bootstrap_5_wp_nav_menu_walker()
				));
				?>
				<ul class="navbar-nav navbar-custom__action-container">
					<li class="nav-item">
						<a id="btn-minishop" class="nav-link" href="javascript:void(0)">
							<iconify-icon class="navbar-custom__action-icon" width="24" icon="heroicons:shopping-bag"></iconify-icon>
							<span class="mini-cart-count"> <?php echo WC()->cart->get_cart_contents_count()   ?></span>
						</a>
					</li>
					<li class="nav-item">
						<?php echo do_shortcode('[yith_wcwl_items_count]') ?>
					</li>
					<li class="nav-item">
						<a class="nav-link--bg" href="#">
							Catalog No. 01
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link--search" href="#">
							<iconify-icon class="navbar-custom__action-icon" width="24" icon="heroicons-outline:search"></iconify-icon>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
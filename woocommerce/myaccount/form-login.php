<?php

/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 6.0.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
$themeVersion = wp_get_theme()->get('Version');
wp_enqueue_style('register_css', get_stylesheet_directory_uri() . '/build/css/register.css', array(), $themeVersion, 'all');

$pageLoginID = get_field('login_link', 'page_link')->ID;
$pageRegisterID = get_field('register_link', 'page_link')->ID;
$loginLink = get_permalink($pageLoginID);
$registerLink = get_permalink($pageRegisterID);
?>

<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>
<?php endif; ?>
<div class="u-columns col2-set" id="customer_login">

	<section class="login-register section-padding">
		<div class="container">
			<div class="login-register__grid">
				<div class="login-register__notification">
					<?php
					do_action('woocommerce_before_customer_login_form');
					?>
				</div>
				<div class="login-register__login-container">
					<div class="u-column1 col-1 card-register">
						<div class="card-register__image-container">
							<img class="card-register__image" src="<?php echo get_stylesheet_directory_uri() . '/src/images/register/register.jpg' ?>" alt="register image">
						</div>
						<div class="card-register__form-container">

							<h2 class="card-register__title"><?php esc_html_e('Login', 'woocommerce'); ?></h2>

							<form class="card-register__form woocommerce-form woocommerce-form-login login" method="post">
								<?php do_action('woocommerce_login_form_start'); ?>
								<div class="card-register__form-row woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label class="card-register__label" for="username"><?php esc_html_e('Username or email address', 'woocommerce'); ?>&nbsp;<span class="required card-register__required">*</span></label>
									<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																																				?>
								</div>
								<div class="card-register__form-row woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<div class="card-register__label-container d-flex justify-content-between">
										<label class="card-register__label m-0" for="password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required card-register__required">*</span></label>
										<div class="woocommerce-LostPassword lost_password">
											<a class="card-register__lost_password" href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>
										</div>
									</div>

									<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
								</div>
								<?php do_action('woocommerce_login_form'); ?>
								<div class="card-register__form-row form-row">
									<label class="checkbox woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme m-0"><?php esc_html_e('Remember me', 'woocommerce'); ?>
										<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" />
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="card-register__form-row form-row d-grid gap-2">
									<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
									<button type="submit" class="woocommerce-button button woocommerce-form-login__submit btn btn-primary" name="login" value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Log in', 'woocommerce'); ?></button>
								</div>

								<?php do_action('woocommerce_login_form_end'); ?>
							</form>
							<div class="text-center">
								<p>Don't Have an Account? <a href="<?php echo $registerLink ?>">Sign up</a></p>
							</div>
						</div>
					</div>
				</div>
				<div class="login-register__register-container">
					<div class="u-column2 card-register">
						<div class="card-register__image-container">
							<img class="card-register__image" src="<?php echo get_stylesheet_directory_uri() . '/src/images/register/register.jpg' ?>" alt="register image">
						</div>
						<div class="card-register__form-container">

							<h2 class="card-register__title"><?php esc_html_e('Register', 'woocommerce'); ?></h2>
							<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?>>
								<?php do_action('woocommerce_register_form_start'); ?>
								<?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>
									<div class="mb-3 woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
										<label for="reg_username" class="form-label"><?php esc_html_e('Username', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
										<input type="text" class="form-control-custom  woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" />
										<?php // @codingStandardsIgnoreLine 
										?>
									</div>
								<?php endif; ?>


								<div class="mb-3 woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label class="form-label" for="reg_email"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
									<input type="email" class="form-control-custom woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 																																																												
																																																																							?>
								</div>

								<?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

									<div class="mb-4  woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
										<label class="form-label" for="reg_password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
										<input type="password" class="form-control-custom woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
									</div>

								<?php else : ?>

									<!-- <p><?php esc_html_e('A link to set a new password will be sent to your email address.', 'woocommerce'); ?></p> -->

								<?php endif; ?>

								<?php do_action('woocommerce_register_form'); ?>

								<p class="woocommerce-form-row form-row d-grid gap-2">
									<?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
									<button type="submit" class="btn btn-primary woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>
								</p>

								<?php do_action('woocommerce_register_form_end'); ?>

							</form>

							<div class="text-center">
								<p>Already have an account? <a href="<?php echo $loginLink ?>">Sign In</a></p>
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php do_action('woocommerce_after_customer_login_form'); ?>
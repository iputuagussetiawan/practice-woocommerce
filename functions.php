<?php

add_action('wp_enqueue_scripts', 'sf_child_theme_dequeue_style', 999);

function sf_child_theme_dequeue_style()
{
  wp_dequeue_style('storefront-style');
  wp_dequeue_style('storefront-woocommerce-style');
}

require_once get_stylesheet_directory() . '/inc/widgets.php';
require_once get_stylesheet_directory() . '/inc/function-acf.php';
require_once get_stylesheet_directory() . '/inc/frontend.php';
require_once get_stylesheet_directory() . '/inc/backend.php';
require_once get_stylesheet_directory() . '/inc/polylang.php';
require_once get_stylesheet_directory() . '/inc/custom-woocommerce.php';

function tmdr_script_enqueue()
{
  $themeVersion = wp_get_theme()->get('Version');
  //css
  wp_enqueue_style('style', get_stylesheet_directory_uri() . '/build/css/app.css', array(), $themeVersion, 'all');


  //JS
  wp_enqueue_script('jquery');
  // wp_enqueue_script('app_js', get_template_directory_uri() . '/build/app.js', 'jquery', $themeVersion, true); //if you use jquery
  wp_enqueue_script('app_js', get_stylesheet_directory_uri() . '/build/js/app.js', array(), $themeVersion, true);
  wp_enqueue_script('iconify_js', 'https://cdn.jsdelivr.net/npm/iconify-icon@1.0.1/dist/iconify-icon.min.js', array(), $themeVersion, true);


  if (is_page_template('page-home.php')) {
    wp_enqueue_style('home_css', get_stylesheet_directory_uri() . '/build/home.css', array(), $themeVersion, 'all');
    wp_enqueue_script('home_js', get_stylesheet_directory_uri() . '/build/home.js', array(), $themeVersion, true);
  }

  if (is_page_template('page-wishlist.php')) {
    wp_enqueue_style('wishlist_css', get_stylesheet_directory_uri() . '/build/css/wishlist.css', array(), $themeVersion, 'all');
  }
}
add_action('wp_enqueue_scripts', 'tmdr_script_enqueue');

// function cw_change_product_price_display($price)
// {
//     $price .= ' At Each Item Product';
//     return $price;
// }
// add_filter('woocommerce_get_price_html', 'cw_change_product_price_display');
// add_filter('woocommerce_cart_item_price', 'cw_change_product_price_display');



function add_membership_in_menu($items, $args)
{

  $item = "";
  if ($args->theme_location == 'header-menu-primary') {
    // WISHLIST
    $cat_args = array(
      'orderby'    => 'name',
      'order'      => 'asc',
      'number'     => 7,
      'hide_empty' => false,
      'parent' => 0
    );

    $product_categories = get_terms('product_cat', $cat_args);


    $item .= '
        <li class="nav-item dropdown has-megamenu order-3">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Products</a>
            <div class="dropdown-menu megamenu" role="menu">
                <div class="row">';

    foreach ($product_categories as $category) {
      $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
      //var_dump( $thumbnail_id )


      if ($thumbnail_id) {
        $image = wp_get_attachment_image_src($thumbnail_id, 'large');
        $image = $image[0];
      } else {
        $image = get_stylesheet_directory_uri() . '/src/images/logo/logo.png';
      }
      $item .= '<div class="col-md-3 mb-3">';
      $item .= '<a href="' . get_category_link($category->term_id) . '" class="card-nav-category">';
      $item .= '<div class="card-nav-category__image-container">';
      $item .= '<img class="card-nav-category__image" src="' . $image . '" alt="' . $category->name . '">';
      $item .= '</div>';
      $item .= '<h3 class="card-nav-category__title">' . $category->name . '</h3>';
      $item .= '</a>';
      $item .= '</div>';
    }
    $item .= '<div class="col-md-3 mb-3">';
    $item .= '<a href="" class="card-nav-category--text">';
    $item .= '<h3 class="card-nav-category__title">Explore More</h3>';
    $item .= '</a>';
    $item .= '</div>';

    $item .= '</div>
            </div> <!-- dropdown-mega-menu.// -->
        </li>
        ';

    $items .= $item;
  }
  return $items;
}
add_filter('wp_nav_menu_items', 'add_membership_in_menu', 10, 2);

// CUSTOM BUTTON QUANTITY PLUS MINUS
add_action('wp_head', 'custom_quantity_fields_css');
function custom_quantity_fields_css()
{
?>
  <style>
    .quantity input::-webkit-outer-spin-button,
    .quantity input::-webkit-inner-spin-button {
      display: none;
      margin: 0;
    }

    .quantity input.qty {
      appearance: textfield;
      -webkit-appearance: none;
      -moz-appearance: textfield;
    }
  </style>
<?php
}


add_action('wp_footer', 'custom_quantity_fields_script');
function custom_quantity_fields_script()
{
?>
  <script type='text/javascript'>
    jQuery(function($) {
      if (!String.prototype.getDecimals) {
        String.prototype.getDecimals = function() {
          var num = this,
            match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
          if (!match) {
            return 0;
          }
          return Math.max(0, (match[1] ? match[1].length : 0) - (match[2] ? +match[2] : 0));
        }
      }
      // Quantity "plus" and "minus" buttons
      $(document.body).on('click', '.btn-plus, .btn-minus', function() {
        var $qty = $(this).closest('.quantity').find('.qty'),
          currentVal = parseFloat($qty.val()),
          max = parseFloat($qty.attr('max')),
          min = parseFloat($qty.attr('min')),
          step = $qty.attr('step');

        // Format values
        if (!currentVal || currentVal === '' || currentVal === 'NaN') currentVal = 0;
        if (max === '' || max === 'NaN') max = '';
        if (min === '' || min === 'NaN') min = 0;
        if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN') step = 1;

        // Change the value
        if ($(this).is('.plus')) {
          if (max && (currentVal >= max)) {
            $qty.val(max);
          } else {
            $qty.val((currentVal + parseFloat(step)).toFixed(step.getDecimals()));
          }
        } else {
          if (min && (currentVal <= min)) {
            $qty.val(min);
          } else if (currentVal > 0) {
            $qty.val((currentVal - parseFloat(step)).toFixed(step.getDecimals()));
          }
        }

        // Trigger change event
        $qty.trigger('change');
      });
    });
  </script>
<?php
}


function mode_theme_update_mini_cart()
{
  echo wc_get_template('cart/mini-cart.php');
  die();
}
add_filter('wp_ajax_nopriv_mode_theme_update_mini_cart', 'mode_theme_update_mini_cart');
add_filter('wp_ajax_mode_theme_update_mini_cart', 'mode_theme_update_mini_cart');


add_filter('woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');
function wc_refresh_mini_cart_count($fragments)
{
  $count = WC()->cart->get_cart_contents_count();
  $items = "<span class='mini-cart-count'>" . $count . "</span>";

  $fragments['.mini-cart-count'] = $items;

  return $fragments;
}

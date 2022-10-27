<?php
//Thme Options
function tmdr_theme_setup()
{
    add_theme_support('menus');
    register_nav_menus(
        array(
            'top-menu' => 'Top Menu Location',
            'header-menu-primary' => 'Header Menu Primary Location',
            'header-menu-secondary' => 'Header Menu Secondary Location',
            'footer-menu' => 'Footer Menu Location',
            'mobile-menu' => 'Mobile Menu Location',
        )
    );
    add_theme_support('post-thumbnails');
    add_theme_support('widgets');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails', array('post', 'customposttypename'));
}
add_action('init', 'tmdr_theme_setup');

//Register Navwalker
function register_navwalker()
{
    require_once get_stylesheet_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

//Register Sidebar
function my_sidebars()
{
    register_sidebar(
        array(
            'name' => 'Page Sidebar',
            'id' => 'page-sidebar',
            'class' => 'custom-sidebar',
            'description' => 'Standard Sidebar',
            'before-title' => '<h3 class="widget-title">',
            'after-title' => '</h3>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Blog Sidebar',
            'id' => 'blog-sidebar',
            'class' => 'blog-custom-sidebar',
            'description' => 'Standard Sidebar',
            'before-title' => '<h3 class="widget-title">',
            'after-title' => '</h3>'
        )
    );

    register_sidebar(
        array(
            'name' => 'Shop Sidebar',
            'id' => 'shop-sidebar',
            'class' => 'shop-custom-sidebar',
            'description' => 'Standard Sidebar',
            'before-title' => '<h3 class="widget-title">',
            'after-title' => '</h3>'
        )
    );
}
add_action('widgets_init', 'my_sidebars');

function tmdr_custom_excerpt_length($length)
{
    return 30;
}
add_filter('excerpt_length', 'tmdr_custom_excerpt_length', 999);

// Add li class at footer
function add_additional_class_on_li($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

// Add link class at footer
function add_menu_link_class($atts, $item, $args)
{
    if (property_exists($args, 'link_class')) {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

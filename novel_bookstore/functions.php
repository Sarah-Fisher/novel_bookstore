<?php
// Add a menu to  the bookstore theme
function custom_theme_setup() {
    register_nav_menus( array(
        'header'  => 'Header Menu',
        'footer'  => 'Footer Menu'
    ));
}

add_action( 'after_setup_theme', 'custom_theme_setup' );

// Featured Image support
add_theme_support( 'post-thumbnails' );

// set up the footer widgets
function footer_widgets_init(){
    register_sidebar(array(
        'name'          => __( 'Footer Widget Area One', 'footerwidget' ),
        'id'            => 'footer-widget-area-one',
        'description'   => __( 'The first footer widget area', 'footerwidget' ),
        'before_widget' => '<div class="local-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    register_sidebar(array(
        'name'          => __( 'Footer Widget Area Two', 'footerwidget' ),
        'id'            => 'footer-widget-area-two',
        'description'   => __( 'The second footer widget area', 'footerwidget' ),
        'before_widget' => '<div class="hours-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    register_sidebar(array(
        'name'          => __( 'Footer Widget Area Three', 'footerwidget' ),
        'id'            => 'footer-widget-area-three',
        'description'   => __( 'The third footer widget area', 'footerwidget' ),
        'before_widget' => '<div class="social-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    register_sidebar(array(
        'name'          => __( 'Footer Widget Area Four', 'footerwidget' ),
        'id'            => 'footer-widget-area-four',
        'description'   => __( 'The fourth footer widget area', 'footerwidget' ),
        'before_widget' => '<div class="info-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}

// Add the action for the widgets

add_action( 'widgets_init', 'footer_widgets_init' );
// Customize the post type
function bookstore_init(){
  $args = array(
    'label' => 'Bookstore',
    'public' => true,
    'show_ui' => true,
    'capability_type' => 'post',
    'taxonomies'  => array( 'category'),
    'hierarchical' => 'false',
    'query_var' => true,
    'menu_icon' => 'dashicons-book',
    'supports' => array(
      'title',
      'editor',
      'excerpts',
      'comments',
      'thumbnail',
      'author',
      'post-formats',
      'page-attributes',
    )
  );
  register_post_type('Bookstore', $args);
}
add_action('init', 'bookstore_init');

// Create the shortcode for the bookstore post-type
function bookstore_shortcode(){
  $query = new WP_Query(array('post_type' => 'bookstore', 'post_per_page' => 4, 'order' => 'asc'));
  while ($query -> have_posts()) : $query-> the_post(); ?>
    <div class="col-sm-12 col-md-6 col-lg-3">
      <div class="image-container">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
      </div>
      <div class="bookstore_content">
        <h4><?php the_title(); ?></h4>
        <?php the_excerpt(); ?>
        <p><a href="<?php the_permalink(); ?>">Learn More</a></p>
      </div>
    </div>
    <?php wp_reset_postdata(); ?>
  <?php
  endwhile;
  wp_reset_postdata();
}
// register the shortcode
add_shortcode('bookstore', 'bookstore_shortcode');
// change the excerpt length
add_filter( 'excerpt_length', function($length) {
  return 25;
}, PHP_INT_MAX );
// Woocommerce Support for the theme
function novelbookstore_add_woocommerce_support() {
  add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'novelbookstore_add_woocommerce_support' );
function enqueue_wc_cart_fragments() { wp_enqueue_script( 'wc-cart-fragments' ); }
add_action( 'wp_enqueue_scripts', 'enqueue_wc_cart_fragments' );
<?php
add_action( 'after_setup_theme', 'food_setup' );
function food_setup() {
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'widgets' );
// This theme uses post thumbnails
add_theme_support( 'post-thumbnails', array('post', 'page') );


global $content_width;
if ( !isset( $content_width ) ) { $content_width = 1920; }
register_nav_menus( array( 'magazine_menu' => esc_html__( 'Main Menu', 'blankslate' ) ) );
register_nav_menus( array( 'footer-links' => esc_html__( 'Footer Links', 'blankslate' ) ) );
register_nav_menus( array( 'footer-categories' => esc_html__( 'Footer Categories', 'blankslate' ) ) );


}





add_action( 'wp_enqueue_scripts', 'magazine_add_stylesheet' );


function magazine_add_stylesheet() {
  wp_enqueue_style('media_query.css',get_stylesheet_directory_uri().'/assets/css/media_query.css');
  wp_enqueue_style('bootstrap.css',get_stylesheet_directory_uri().'/assets/css/bootstrap.css');
  wp_enqueue_style( 'font-awesome.min.css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
  wp_enqueue_style('animate.css',get_stylesheet_directory_uri().'/assets/css/animate.css');
  // wp_enqueue_style( 'css?family=Poppins', 'https://fonts.googleapis.com/css?family=Poppins' );
  wp_enqueue_style('owl.carousel.css',get_stylesheet_directory_uri().'/assets/css/owl.carousel.css');
  wp_enqueue_style('owl.theme.default.css',get_stylesheet_directory_uri().'/assets/css/owl.theme.default.css');
  wp_enqueue_style('style_1.css',get_stylesheet_directory_uri().'/assets/css/style_1.css');  
  wp_enqueue_style( 'style.css', get_stylesheet_uri() );


  wp_enqueue_script('modernizr-3.5.0.min.js',get_stylesheet_directory_uri().'/assets/js/modernizr-3.5.0.min.js');
  wp_enqueue_script('jquery');
  wp_enqueue_script( 'jquery.min.js', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js' );
  wp_enqueue_script('owl.carousel.min.js',get_stylesheet_directory_uri().'/assets/js/owl.carousel.min.js');
  // wp_enqueue_script( 'jquery ', 'https://code.jquery.com/jquery-3.1.1.slim.min.js' );
  wp_enqueue_script( 'tether.min.js', 'https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js' );
  wp_enqueue_script( 'bootstrap.min.js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js' );
  wp_enqueue_script('jquery.waypoints.min.js', get_stylesheet_directory_uri().'/assets/js/jquery.waypoints.min.js');
  wp_enqueue_script('main.js',get_stylesheet_directory_uri().'/assets/js/main.js');
}



 
// add_filter( 'nav_menu_link_attributes', function($atts) {
//   $atts['class'] = "nav-link";
//   return $atts;
// }, 100, 1 );

add_filter( 'nav_menu_link_attributes', 'menu_add_class', 10, 3 );

function menu_add_class( $atts, $item, $args ) {
    $class = 'nav-link'; // or something based on $item
    $atts['class'] = $class;
    return $atts;
}



/*
 * Set post views count using post meta
 */
function wpb_set_post_views($postID) {
  $count_key = 'wpb_post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
      $count = 0;
      delete_post_meta($postID, $count_key);
      add_post_meta($postID, $count_key, '0');
  }else{
      $count++;
      update_post_meta($postID, $count_key, $count);
  }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


function wpb_track_post_views ($post_id) {
  if ( !is_single() ) return;
  if ( empty ( $post_id) ) {
    global $post;
    $post_id = $post->ID;    
  }
  wpb_set_post_views($post_id);
}


add_action( 'wp_head', 'wpb_track_post_views');

function wpb_get_post_views($postID){
  $count_key = 'wpb_post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
      delete_post_meta($postID, $count_key);
      add_post_meta($postID, $count_key, '0');
      return "0 View";
  }
  return  $count;
}

function my_post_queries( $query ) {
  // do not alter the query on wp-admin pages and only alter it if it's the main query
  if (!is_admin() && $query->is_main_query()){

    // alter the query for the home and category pages 

    if(is_home()){
      $query->set('posts_per_page', 3);
    }

    if(is_category()){
      $query->set('posts_per_page', 3);
    }

  }
}
add_action( 'pre_get_posts', 'my_post_queries' );


function comicpress_copyright() {
  global $wpdb;
  $copyright_dates = $wpdb->get_results("
  SELECT
  YEAR(min(post_date_gmt)) AS firstdate,
  YEAR(max(post_date_gmt)) AS lastdate
  FROM
  $wpdb->posts
  WHERE
  post_status = 'publish'
  ");
  $output = '';
  if($copyright_dates) {
  $copyright = "&copy; " . $copyright_dates[0]->firstdate;
  if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
  $copyright .= '-' . $copyright_dates[0]->lastdate;
  }
  $output = $copyright;
  }
  return $output;
  }
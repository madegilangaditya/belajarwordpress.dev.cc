<?php

// Add Theme Support
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails', [ 'post', 'page' ] );
add_theme_support( 'post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'] );
add_theme_support( 'html5' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'customize-selective-refresh-widgets' );

// Load in our CSS
function wptags_enqueue_styles() {

  wp_enqueue_style( 'varela-font-css', 'https://fonts.googleapis.com/css?family=Varela+Round', [], '', 'all' );
  wp_enqueue_style( 'main-css', get_stylesheet_directory_uri() . '/style.css', ['varela-font-css'], time(), 'all' );
  wp_enqueue_style( 'custom-css', get_stylesheet_directory_uri() . '/assets/css/custom.css', [ 'main-css' ], time(), 'all' );

}
add_action( 'wp_enqueue_scripts', 'wptags_enqueue_styles' );

// Load in our JS
function wptags_enqueue_scripts() {

  // wp_enqueue_script( 'theme-js', get_stylesheet_directory_uri() . '/assets/js/theme.js', [], time(), true );
  wp_enqueue_script( 'jquery-theme-js', get_stylesheet_directory_uri() . '/assets/js/jquery.theme.js', [ 'jquery' ], time(), true );


}
add_action( 'wp_enqueue_scripts', 'wptags_enqueue_scripts' );

// Control header for the_title
function wptags_title_markup( $title, $id = null ) {

    if ( !is_singular() && in_the_loop() ) {

      $title = '<h2><a href="' . get_permalink( $id ) . '">' . $title . '</a></h2>';

    } else if ( is_singular() && in_the_loop() ) {

      $title = '<h1>' . $title . '</h1>';

    }

    return $title;
}
// add_filter( 'the_title', 'wptags_title_markup', 10, 2 );

// Register Menu Locations
register_nav_menus( [
  'main-menu' => esc_html__( 'Main Menu', 'wptags' ),
  'footer-menu' => esc_html__( 'Footer Menu', 'wptags' )
]);


// Setup Widget Areas
function wptags_widgets_init() {
  register_sidebar([
    'name'          => esc_html__( 'Main Sidebar', 'wptags' ),
    'id'            => 'main-sidebar',
    'description'   => esc_html__( 'Add widgets for main sidebar here', 'wptags' ),
    'before_widget' => '<section class="widget">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ]);
}
add_action( 'widgets_init', 'wptags_widgets_init' );

// Comment custom callbacks template
function wptags_comment(){
  get_template_part( 'comment' ); //Name your php file as custom comment template
}

// Before footer hook
function wphooks_before_footer_message(){
  locate_template( 'template-parts/before-footer.php', true );
}
add_action( 'wphooks_before_footer', 'wphooks_before_footer_message', 10 );
// remove_action( 'wphooks_before_footer', 'wphooks_before_footer_message', 10 );

// Loop end hooks
function wphooks_marketing_before_end(){

  if(!in_the_loop(  )) return;

  locate_template( 'template-parts/marketing.php', true );
}
add_action( 'loop_end', 'wphooks_marketing_before_end', 10 );

// Template redirect hook
function wphooks_redirect_training(){
  if(is_page( 'about' ) && is_user_logged_in(  )){
    wp_redirect( home_url( '/amazon-store/' ) );
    die;
  }

  if(is_page( 'amazon-store' ) && !is_user_logged_in(  )){
    wp_redirect( home_url( '/about/' ) );
    die;
  }
}
add_action( 'template_redirect', 'wphooks_redirect_training' );

// Add draft in the title and slug when save or edit posts as draft
function wphooks_add_draft_to_title( $post_id ){

  // If post revision dont proceed
  if( wp_is_post_revision( $post_id ) ){
    return;
  }

  $post = get_post($post_id);
  
  // Add DRAFT: from title depending on status
  if('draft' === $post->post_status && 'DRAFT: ' !== substr($post->post_title, 0 , 7)){

    // Add Draft to title
    $post -> post_title = 'DRAFT: ' . $post -> post_title;
  } elseif ('publish' === $post -> post_status && 'DRAFT: ' === substr($post->post_title, 0, 7)){

    // Remove draft from title
    $post->post_title = substr($post->post_title, 7);
  }

  // If slug start with draft- remove it
  if('draft-' === substr( $post->post_name, 0,6 )){
    $post->post_name = substr($post->post_name, 6);
  }

  // Unhook save_post so it not loop infinitely
  remove_action( 'save_post', 'wphooks_add_draft_to_title' );

  // Update the post
  wp_update_post( $post );

  // Re-Hook again to save_post
  add_action( 'save_post', 'wphooks_add_draft_to_title' );

}
add_action( 'save_post', 'wphooks_add_draft_to_title' );

?>

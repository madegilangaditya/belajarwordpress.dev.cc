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
// function wptags_title_markup( $title, $id = null ) {

//     if ( !is_singular() && in_the_loop() ) {

//       $title = '<h2><a href="' . get_permalink( $id ) . '">' . $title . '</a></h2>';

//     } else if ( is_singular() && in_the_loop() ) {

//       $title = '<h1>' . $title . '</h1>';

//     }

//     return $title;
// }
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

// Practice 1 Hook - Load Admin stylesheet when edit draft post
function wphooks_draft_mode_styles(){
  global $post;

  if( !$post ) return;

  if( 'draft' === $post->post_status ){
    wp_enqueue_style( 'wphooks-admin-css', get_stylesheet_directory_uri() . 'assests/css/admin.css', [], time(), 'all' );
    add_editor_style( 'assets/css/visual-editor.css' );
  }
}
add_action( 'admin_enqueue_scripts', 'wphooks_draft_mode_styles' );

// Practice apply filter to wphooks_footer_message
function wphooks_make_uppercase($message){
  $new_message = strtoupper($message);
  return $new_message;
}
add_filter( 'wphooks_footer_message', 'wphooks_make_uppercase', 15 );
// remove_filter( 'wphooks_footer_message', 'wphooks_make_uppercase', 15 );

// Control markup for the_title using add_filter
function wptags_title_markup( $title, $id ){
  if( is_singular(  ) && in_the_loop(  ) ){
    $title = '<h1>' . $title . '</h1>';
  } else if ( !is_singular( ) && in_the_loop(  ) ){
    $title = '<h2><a href="' . get_permalink( $id ) . '">' . $title . '</a></h2>'; 
  }

  return $title;
}
add_filter( 'the_title', 'wptags_title_markup', 10, 2 );

// Add an ads after middle paragraph in single post using the_content filter
function wptags_content_ads($content){
  if( !in_the_loop(  ) ){
    return;
  }

  $paragraphs;

  // Search for any text wrapped in paragraph tags
  $pattern = "/<p>.*?<\/p>/m";
  $p_count = preg_match_all( $pattern, $content, $paragraphs );
  $paragraphs = $paragraphs[0];

  // Find The middle paragraph
  $ad_p_number = floor( $p_count / 2 );
  if(0 == $ad_p_number) $ad_p_number = 1;
  $ad_p = $paragraphs[$ad_p_number - 1];

  // Create The ads
  $post_ad = '<div class="post-ad" style="background:yellow;text-align:center;"><h2>Post Ads</h2></div>';
  $ad_p_w_ad = '<p>' . $ad_p . '</p>' . $post_ad;

  // Replace the original Paragraph
  // With The paragraph with the ads
  $content_w_ad = str_replace( $ad_p, $ad_p_w_ad, $content );

  // Return New content with ads
  return $content_w_ad;
}
add_filter( 'the_content', 'wptags_content_ads', 10 );

// Change the read more link for excerpts with excerpt_more filter
function wphooks_read_more_link($read_more_text){
  global $post;
  $new_read_more = '... <a class="more-link" href="'
                    . get_permalink( $post-> ID )
                    . '">'
                    . esc_html__( 'Read More &gt;', 'wphooks' )
                    . '</a>';
  
  return $new_read_more;
}
add_filter( 'excerpt_more', 'wphooks_read_more_link', 20 );

// Add custom class in body using filter in body_class
function wphooks_custom_body_classes( $classes ){
  if ('page' === get_post_type(  )){
    $classes[] = 'wphooks-page';
  }

  return $classes;
}
add_filter( 'body_class', 'wphooks_custom_body_classes' );

// Remove unwanted columns from post listing using manage_posts_columns filter
function wphooks_customize_post_columns($columns){
  unset( $columns['author'] );
  unset( $columns['categories'] );
  unset( $columns['tags'] );
  unset( $columns['comments'] );
  return $columns;
}
add_filter( 'manage_posts_columns', 'wphooks_customize_post_columns', 100 );

// ADD Post ID to column section in admin area using filter

// POST ID column header
function wphooks_post_id_columns_head($defaults){
  $defaults['ID'] = esc_html__( 'POST ID', 'wphooks' );
  return $defaults;
}
add_filter( 'manage_posts_columns', 'wphooks_post_id_columns_head' );

// ADD Post ID to column content using add action hook
function wphooks_post_id_columns_content($column_name, $post_id){
  if($column_name == 'ID'){
    echo $post_id;
  }
}
add_action( 'manage_posts_custom_column', 'wphooks_post_id_columns_content', 10, 2 );

// Practice 1 Filter - Change the length of post excerpts using excerpt_length filter
function wphooks_excerpt_length($length_in_words){
  $new_length_in_words = 35;
  return $new_length_in_words;
}
add_filter( 'excerpt_length', 'wphooks_excerpt_length', 20, 1 );

// Practice 2 Filter - Login Redirect
// function wphooks_member_login_redirect( $redirect_to, $request, $user ){
//   if(isset( $user->roles ) && is_array( $user->roles )){
//     if( !in_array('administrator', $user->roles) ){
//       return home_url( '/about/' );
//     } else{
//       return $redirect_to;
//     }
//   }
//   return;
// }
// add_filter( 'login_redirect', 'wphooks_member_login_redirect', 10 );




?>

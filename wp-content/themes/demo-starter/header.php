<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Demo_Starter_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'demo-starter' ); ?></a>

	<header id="masthead" class="site-header main-header fixed-top">
		<div class="container">
			<nav class="navbar navbar-light navbar-expand-lg stroke px-0 py-lg-0">
				<div class="site-branding navbar-brand">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						<?php
					endif;
					
					 ?>
				</div><!-- .site-branding -->
						
				<button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon "></span>
					<!-- <span class="navbar-toggler-icon fa icon-close fa-times"></span> -->
				</button>
				<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
					<ul id="primary-menu" class="nav navbar-nav navbar-nav-scroll mx-lg-auto">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'container'		 => '%3$s',
								// 'menu_id'        => 'primary-menu ',
								// 'menu_class'	 => 'nav navbar-nav navbar-nav-scroll mx-lg-auto',
								// 'container_class' => 'collapse navbar-collapse',
								// 'container_id'	 => 'navbarTogglerDemo02',
								'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
								'walker'          => new WP_Bootstrap_Navwalker(),
								'items_wrap'	=> '%3$s',
								
							)
						);
						?>
					</ul>
					<ul class="navbar-nav mx-lg-auto">
						<li class="nav-item search-right ml-lg-3">
							<i class="bi bi-search"></i>
						</li>
					</ul>
					<div class="top-righthny-buttton HeaderButton">
						<a class="btn btn-style btn-white mr-lg-5" href="contact">
							Get In Touch &nbsp; <i class="bi bi-arrow-right"></i></a>
					</div>
				</div>
				
			</nav><!-- #site-navigation -->
		</div>
		
	</header><!-- #masthead -->

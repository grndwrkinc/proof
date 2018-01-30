<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package environics
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/css?family=Vidaloka" rel="stylesheet">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'environics' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<?php $site_logo = get_field('site_logo', 'option'); ?>
			<a class="nav-item" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo $site_logo['url']; ?>" alt="<?php echo $site_logo['alt']; ?>"/></a>
		<?php if ( !is_front_page() ) : ?>
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<?php global $post;
					if(is_page()) {
						// If the page is a landing page, return the page slug
						if($post->post_name == 'about') {
							$nav_title = 'Who We Are';
						} elseif ($post->post_name == 'work') {
							$nav_title = 'Our Work';
						} elseif ($post->post_name == 'capabilities') {
							$nav_title = 'Strengths'; 
						} elseif ($post->post_name == 'work-with-us') {
							$nav_title = 'Work With Us'; 
						} elseif ($post->post_name == 'contact') {
							$nav_title = 'Contact Us'; 
						} elseif ($post->post_name == 'privacy-policy') {
							$nav_title = 'Privacy Policy'; 
						} else {
							$nav_title = $post->post_name; 
						}
					} elseif (is_single()) {
						// If the page is a single page, return the parent page slug
						if (get_post_type() == 'work') {
							$nav_title = '';
						} elseif (get_post_type() == 'jobs') {
							$nav_title = 'Work with us';
						} else {
							$nav_title = get_post_type(); 
						}
					} else { 
						$nav_title = 'thinking';
					} ?>
				<div class="page-title"><?php echo $nav_title; ?></div>
				<?php endwhile; ?>
			<?php endif; ?>
		<?php endif; ?>
			<div class="hamburger" tabindex="0" role="button" aria-label="Site menu">
				<div class="patty"></div>
			</div>
		</div><!-- .site-branding -->
		
		<nav id="site-navigation" class="main-navigation nav-container hide" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'environics' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu' => 'Primary', 'container_class' => 'menu-primary-container'  ) ); ?>
		</nav>

	</header><!-- #masthead -->

	<div class="site-content">
		

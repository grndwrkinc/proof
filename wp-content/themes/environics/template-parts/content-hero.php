<?php
/**
 * Template part for displaying the hero image, title and subhead found on top-level pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package environics
 */
?>

<?php 
	$hero = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	//Home Page Hero (Background video)
	if ( is_front_page() ) : 
?>
	<div class="hero" style="background-image: url('<?php echo $hero; ?>')">
		<!-- svg content goes here -->
		<img src="/wp-content/themes/environics/assets/images/Environics_Communications_logo_white.svg" alt="">
	</div>

	<!-- Mobile version -->
	<div class="hero hero-mobile" style="background-image: url( <?php echo $hero; ?> )">
		<div class="text">
			<div class="container">
				<svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					 width="296px" height="180px" viewBox="0 0 296 355" enable-background="new 0 0 296 355" xml:space="preserve">
				<!-- <title>E</title>
				<desc>Created with Sketch.</desc> -->
				<g id="Page-2">
					<g id="Mobile" transform="translate(-265.000000, -448.000000)">
						<path id="mobile-E" fill="#FFFFFF" d="M343.5,517H561v-69H265v49.5v257V803h296v-68H343.5v-76H561v-67H343.5V517z"/>
					</g>
				</g>
				</svg>
				<h1><?php the_title(); ?></h1>
				<p><?php the_content(); ?></p>
			</div>
		</div>
	</div>
<?php 

	//Default Hero (No video)
	else :
		$hero = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		if(!strlen($hero)) $classes = " no-image";
?>
	<div class="hero" style="background-image:url(<?php echo $hero; ?>)">
		<h1><?php the_title(); ?></h1>
	</div>
<?php 
	endif;
?>

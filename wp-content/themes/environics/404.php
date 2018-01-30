<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package environics
 */

include "redirect.php";

get_header();
?>
	<div class="block hero bg-pattern-teal-inverted">
		<div class="container">
			<h1>Page not found</h1>

			<h4>Please try one of the following pages</h4>
<?php 
			$args = array(
			    'depth'       => 0,
				'sort_column' => 'menu_order, post_title',
				'menu_class'  => 'block menu',
				'include'     => '',
				'exclude'     => '',
				'echo'        => true,
				'show_home'   => true,
				'link_before' => '',
				'link_after'  => '' );

			wp_page_menu( $args ); 
?> 
		</div>
	</div>
<?php
get_footer();
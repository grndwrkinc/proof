<?php
get_header('author');

$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
$author_ID = $curauth->ID;
$args = array(
	'posts_per_page' => '9',
	'post_type' => 'thinking',
	'author' => $author_ID
);
query_posts( $args );

?>
	<div id="primary" class="content-area page-author">
		<div class="bg-solid-darkpurple">
			<div class="featured-team container">
<?php
			// Retrieve the post's author ID
			$user_id = $curauth->ID;
			// Get the full size image URL using the author ID
			$imgURL = get_cupp_meta($user_id, 'full');
			$classes = 'no-image';
			if(strlen($imgURL)) :
				$classes = '';
?>
				<div class="featured-image"><img src="<?php echo $imgURL; ?>" alt=""></div>
<?php						
			endif;
?>
					
				<div class="featured-info <?php echo $classes; ?>">
					<div class="featured-info-wrap">
						<h2><?php echo $curauth->display_name; ?></h2>
<?php 		
			if ( get_the_author_meta('description', $author_ID)) : 
?>
						<p><?php the_author_meta( 'description', $author_ID ); ?></p>
<?php 		
			endif; 
?>
					</div>
				</div>
			</div>
		</div>
		
<?php 
		if ( have_posts() ) :
?>
		<div class="block archive-gallery container gradient">
			<a href="javascript:window.history.back();" class="back-button"><img src="/wp-content/themes/environics/assets/images/banner-arrow-left.svg">Back to article</a>
			<!-- Gallery of Posts -->
			<div class="tiles-container">
<?php 
			echo do_shortcode('[ajax_load_more repeater="template_5" preloaded="true" post_type="thinking, news" author="' . $author_ID . '" scroll="false" posts_per_page="4" destroy_after="99" button_label="See More"]');
?>
			</div>
		</div>
<?php
		else:
?>
		<div class="block archive-gallery container no-posts">
			<a href="javascript:window.history.back();" class="back-button"><img src="/wp-content/themes/environics/assets/images/banner-arrow-left.svg">Back to article</a>
			<div class="tiles-container">
				<div class="tiles-item">
					<p><?php echo $curauth->display_name; ?> has not written any articles yet.</p>
				</div>
			</div>
		</div>

<?php 
		endif;
?>

	</div><!-- #primary -->

<?php
get_footer();

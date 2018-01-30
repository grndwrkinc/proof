<?php
get_header();
?>
	<div id="primary" class="content-area">
<?php
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content', 'singlehero' );
?>
		<div class="post-overview news-page-details container <?php the_ID(); ?>">
			<p><span><?php the_author_posts_link(); ?></span><span><?php echo the_date(); ?></span></p>
		</div>

<?php 
		get_template_part( 'template-parts/content', 'socialbuttons' );
		get_template_part( 'template-parts/content', get_post_format() );

		//Turn on if you want the next post link to be displayed.
		// the_post_navigation(); 

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	endwhile; // End of the loop.

	$current = array( $post->ID );
	$args = array( 'post_type' => 'news', 'posts_per_page' => 3, 'post__not_in' => $current);
	$related_posts = new WP_Query( $args );
		
	include(locate_template('related-posts.php'));
?>
	</div><!-- #primary -->
<?php
get_footer();
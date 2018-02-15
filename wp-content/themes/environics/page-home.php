<?php
get_header();

	/*Get all the News Posts plus the Thinking Posts the are NOT in the categories Report or Whitepaper */
	$args = array( 
		'post_type' => array('thinking', 'news'),
		'posts_per_page' => 6,
		'tax_query' => array(
			array(
				'taxonomy' => 'thinking_categories',
				'field'    => 'slug',
				'terms'    => array('reports', 'whitepapers'),
				'operator' => 'NOT IN',
			),
		),
	);

	$newsfeed = new WP_Query( $args );

	//Get the list of capabilities
	$capabilities = "";
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content', 'hero' ); 

		$terms = get_terms( array(
			'taxonomy' => 'case_categories',
			'hide_empty' => false,
		) ); 

		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
			foreach ( $terms as $term ) {
				$capability = str_replace(" ", "&nbsp;", $term->name); //Replace spaces with non breaking space
				$capabilities .= '<span class="' . $term->slug . '"><a href="/capabilities#' . $term->slug . '">&nbsp;' . $capability . '&nbsp;</a></span>';
			}
		}
?>
	<div class="text-container">
		<h2 class="span_5"><?php the_title(); ?></h2>
		<div class="span_11"><?php the_content(); ?></div>
	</div>
	<div class="capabilities-container">
		<div class="span_11">
			<h2><?php the_field('capabilities_subheading'); ?></h2>
			<p><?php the_field('capabilities_text'); ?></p>
		</div>
		<div class="capabilities-wrapper">
	<?php
		// Capabilities - grab fields from Capabilities page
		$capPage = get_page_by_path( 'capabilities' );
		if( have_rows('capability_repeater_content', $capPage->ID) ):
	    	
	    	while ( have_rows('capability_repeater_content', $capPage->ID) ) : the_row(); 
	    		$image = get_sub_field('capability_image'); ?>
		
				<div class="featured span_5">
					<?php $hash = preg_replace("/[^a-zA-Z]+/", "", get_sub_field('capability_title'));
						  $hash = strtolower($hash);
					 ?>
					<a href="capabilities#<?php echo $hash; ?>">
						<div class="featured-img square" style="background-image: url('<?php echo $image['url']; ?>');">
							<h3 class="barr"><?php the_sub_field('capability_title'); ?></h3>
						</div>
						<div class="featured-text">
							<p class="item-text"><?php the_sub_field('capability_description'); ?></p>
						</div>
					</a>
				</div>
		
	<?php 
			endwhile; // End of the loop.
		endif; 
	?>
		</div>
	</div>
	<div class="featured-container">
		<h2>Latest Work</h2>
		<div class="featured-wrapper">
<?php
	// Featured case studies
	if( have_rows('homepage_featured') ):
    	
    	while ( have_rows('homepage_featured') ) : the_row();
    		$post_object = get_sub_field('featured_project');
			$subtitle = get_field('post_subheader', $post_object->ID);
			$featuredImg = wp_get_attachment_url( get_post_thumbnail_id($post_object->ID) );
?>
	
			<div class="featured span_5">
				<div class="img-container">
					<a href="<?php echo get_permalink($post_object->ID); ?>" class="">
						<div class="featured-img square" style="background-image: url('<?php echo $featuredImg; ?>')">
						</div>
					</a>
				</div>
				<div class="featured-text">
					<h4><a href="<?php echo get_permalink($post_object->ID); ?>"><?php echo $post_object->post_title; ?></a></h4>
					<p class="item-text"><?php echo $subtitle; ?></p>
					<p class="read-more barr"><a href="<?php echo get_permalink($post_object->ID); ?>">See Work</a></p>
				</div>
			</div>
	
<?php 
		endwhile; // End of the loop.
	endif; 
?>
		</div>
	</div>
	<?php $post_object = get_field('cantrust_selector');
		// Get the Cantrust Report post object
		if( $post_object ): 
		$post = $post_object;
		setup_postdata( $post ); 
		$featuredImg = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
	    <div class="cantrust-container">
	    	<div class="cantrust-text">
	    		<h2 class="span_5"><?php echo the_title(); ?></h2>
	    		<p class="span_6"><?php the_field('post_subheader'); ?></p>
	    	</div>
	    	<div class="cantrust-img" style="background-image: url('<?php echo $featuredImg; ?>');">
	    		<h3><a class="barr" href="<?php echo get_permalink($post->ID); ?>">Cantrust Report <?php echo get_the_date('Y', $post); ?></a></h3>
	    	</div>
	    </div>
	    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
	<?php endif; ?>


<?php 
	endwhile;
?>
	
<?php
get_footer();

<?php
get_header(); 
?>
	<div id="primary" class="content-area">
<?php 
	if ( have_posts() ) : ?>
		
		<div class="block hero bg-pattern-teal">
			<div class="container">
				<h1><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?></h1>
				<h4>See what else we have to say about <?php echo $term->name; ?></h4>
			</div>
		</div>
	</div><!-- end #primary -->

	<div class="block archive-gallery container gradient">
		<a href="javascript:window.history.back();" class="back-button"><img src="/wp-content/themes/environics/assets/images/banner-arrow-left.svg">Back to article</a>
		<!-- Gallery of Posts -->
		<div class="tiles-container">
<?php 
		echo do_shortcode('[ajax_load_more repeater="template_5" preloaded="true" preloaded_amount="20" post_type="thinking" taxonomy="tags" taxonomy_terms="'.$term->name.'" taxonomy_operator="IN" scroll="false" posts_per_page="10" destroy_after="99" button_label="See More"]');
?>
		</div>
<?php 
	endif;
?>
	</div><!-- .container -->

<?php
get_footer();

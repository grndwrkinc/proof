<?php
get_header(); 
?>
<div id="primary" class="content-area">
<?php 
	if(have_posts()) : while (have_posts()) : the_post();
		get_template_part( 'template-parts/content', 'hero' );
?>
	<div class="text-container">
		<h2 class="span_6"><?php the_field('post_subheader'); ?></h2>
		<div class="span_10"><?php the_content(); ?></div>
	</div>
	
	<div class="sectors-container">
		<?php $image = get_field('sector_hero'); ?>
		<div class="sub-hero" style="background-image: url('<?php echo $image['url']; ?>');">
			<h2>Sectors</h2>
		</div>
		<div class="span_10">
			<?php the_field('sector_blurb'); ?>
		</div>
		<div class="accordion">
			<?php
				if( have_rows('sector_dropdowns') ):
			    	while ( have_rows('sector_dropdowns') ) : the_row();
			    		$director = get_sub_field('director');
						$directorTitle = get_the_title($director->ID);
						$directorPos = get_field('team_member_role', $director->ID);
						$directorImg = get_field('photo_professional', $director->ID);
			?>
			<div class="accordion-item span_4">
				<h5><?php the_sub_field('title'); ?></h5>
				<div class="hide">
					<h4><?php echo $directorTitle; ?></h4>
					<p><?php echo $directorPos; ?></p>
					<img src="<?php echo $directorImg['url']; ?>">
					<div><?php the_sub_field('director_statement'); ?></div>
				</div>
			</div>
			<?php 
				endwhile; // End of sector_dropdowns loop
				endif; 
			?>
		</div>
	</div>
	
	<?php
		if( have_rows('capability_repeater_content') ):
	    	while ( have_rows('capability_repeater_content') ) : the_row();
	    		$title = get_sub_field('capability_title');
				$directorTitle = get_the_title($director->ID);
				$directorPos = get_field('team_member_role', $director->ID);
				$directorImg = get_field('photo_professional', $director->ID);
	?>
	<div class="capabilities-container">
		<?php $image = get_sub_field('capability_image'); ?>
		<div class="hero-container">
			<div class="sub-hero span_10" style="background-image: url('<?php echo $image['url']; ?>');">
				<h3><?php the_sub_field('capability_title'); ?></h3>
			</div>
			<p class="span_5">
				<?php the_sub_field('capability_description'); ?>
			</p>
		</div>
		
	<?php $terms = get_sub_field('capability_category');
		if( $terms ): ?>
		<div class="accordion">

		<?php foreach( $terms as $term ): ?>
			<div class="accordion-item span_4">
				<h5><?php echo $term->name; ?></h5>
			</div>
		<?php endforeach; ?>
		</div>
	<?php endif; ?>

	</div>
	<?php 
		endwhile; // End of capabilities repeater loop
		endif; 
	?>

<?php 
	endwhile; 
	endif; // End of the loop.
?>
	</div><!-- #primary -->

<?php
get_footer();

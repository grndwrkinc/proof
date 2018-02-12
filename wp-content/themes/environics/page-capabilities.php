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
		<div class="dropdown-gallery">
			<?php
				if( have_rows('sector_dropdowns') ):
			    	while ( have_rows('sector_dropdowns') ) : the_row();
			    		$director = get_sub_field('director');
						$directorTitle = get_the_title($director->ID);
						$directorPos = get_field('team_member_role', $director->ID);
						$directorImg = get_field('photo_professional', $director->ID);
			?>
			<div class="dropdown-item span_4">
				<h5><?php the_sub_field('title'); ?></h5>
				<div class="dropdown-content">
					<h2 class="span_7"><?php the_sub_field('title'); ?></h2>
					<div class="span_5">
						<img src="<?php echo $directorImg['url']; ?>">
						<div class="deets">
							<h4><?php echo $directorTitle; ?></h4>
							<p><?php echo $directorPos; ?></p>
						</div>
						<div><?php the_sub_field('director_statement'); ?></div>
					</div>
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
	<?php $image = get_sub_field('capability_image');
		  $hash = preg_replace("/[^a-zA-Z]+/", "", get_sub_field('capability_title'));
		  $hash = strtolower($hash);
	 ?>
	<div id="<?php echo $hash; ?>" class="capabilities-container">
		<div class="hero-container">
			<div class="sub-hero span_10" style="background-image: url('<?php echo $image['url']; ?>');">
				<h3><?php the_sub_field('capability_title'); ?></h3>
			</div>
			<p class="span_5">
				<?php the_sub_field('capability_description'); ?>
			</p>
		</div>
		
		<div class="dropdown-gallery">
	<?php if( have_rows('capability_category') ):
	    	while ( have_rows('capability_category') ) : the_row(); ?>

			<div class="dropdown-item span_4">
				<h5><?php if( get_sub_field('title') ){ the_sub_field('title'); } ?></h5>
				<div class="dropdown-content">	
					<p><?php if( get_sub_field('description') ){ the_sub_field('description'); } ?></p>
				</div>
			</div>
	<?php endwhile; //End of capability category loop
		endif; ?>
		</div>
		<p class="linkout"><?php the_sub_field('external_link'); ?></p>
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

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
		<div class="dropdown-gallery">
			<?php
				if( have_rows('sector_dropdowns') ):
					$count = 0;
			    	while ( have_rows('sector_dropdowns') ) : the_row();
			    		$director = get_sub_field('director');
			    		$bgImage = get_sub_field('image');
						$directorTitle = get_the_title($director->ID);
						$directorPos = get_field('team_member_role', $director->ID);
						$directorImg = get_field('photo_professional', $director->ID);
						$countclass = '';
						if ($count % 2 == 0) {
							$countclass = 'even';
						} else {
							$countclass = 'odd';
						};
			?>
			<div class="dropdown-item span_8">
				<div class="sectors-img" style="background-image: url('<?php echo $bgImage['url']; ?>');">	
					<h3 class="barr"><?php the_sub_field('title'); ?></h3>
				</div>
				<div class="dropdown-content">
					<div class="span_6 <?php echo $countclass; ?>">
						<img src="<?php echo $directorImg['url']; ?>" alt="<?php echo $directorImg['url']; ?>">
						<div class="deets">
							<h4><?php echo $directorTitle; ?></h4>
							<p><?php echo $directorPos; ?></p>
						</div>
						<div><?php the_sub_field('director_statement'); ?></div>
					</div>
				</div>
			</div>
			<?php 
				$count ++;
				endwhile; // End of sector_dropdowns loop
				endif; 
			?>
		</div>
	</div>
	
	<?php
		if( have_rows('capability_repeater_content') ):
			$capcount = 0;
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
		<?php if($capcount == 0): ?>
			<h2><?php the_field('capabilities_header'); ?></h2>
		<?php endif; ?>
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
			$count = 0;
	    	while ( have_rows('capability_category') ) : the_row(); 
	    		$countclass = '';
				if ($count % 3 == 2) {
					$countclass = 'three';
				} elseif ($count % 3 == 1) {
					$countclass = 'two';
				} else {
					$countclass = 'one';
				};
	?>

			<div class="dropdown-item span_4">
				<h5><?php if( get_sub_field('title') ){ the_sub_field('title'); } ?></h5>
				<div class="dropdown-content">	
					<p class="<?php 
					echo $countclass; ?>"><?php if( get_sub_field('description') ){ the_sub_field('description'); } ?></p>
				</div>
			</div>
	<?php 
		$count ++;
		endwhile; //End of capability category loop
	endif; ?>
		</div>
		<p class="linkout"><?php the_sub_field('external_link'); ?></p>
	</div>
	<?php 
	$capcount ++;
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

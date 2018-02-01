<?php
get_header();
	/*Loop to get all the Team Members */
	$args = array( 'post_type' => 'team_members',
				   'order' => 'ASC',
				   'posts_per_page'=> -1,
				   'orderby' => 'menu_order');
	$loop = new WP_Query( $args );

	/* Loop to find out if any job postings exist */
	$args2 = array( 
		'post_type' => 'jobs',
		'posts_per_page' => 1 
		);

	$jobsloop = new WP_Query( $args2 ); 
?>

	<div id="primary" class="content-area">
<?php 
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content', 'hero' );
?>

	<div class="text-container">
		<div class="span_6"><?php the_content(); ?></div>
	</div>

	<!-- LEADERSHIP TEAM -->
	<div class="team-container">
	<?php $ceo_photo = get_field('ceo_image'); ?>
		<div class="ceo-container">
			<div class="featured-image span_5">
				<img src="<?php echo $ceo_photo['url']; ?>" alt="<?php echo $ceo_photo['alt']; ?>">
			</div>
			<div class="featured-info span_6">
				<h2><?php the_field('ceo_header'); ?></h2>
				<p><?php the_field('ceo_message'); ?></p>
			</div>
		</div>
		<div class="dropdown-gallery">
<?php 
		// Loop to find all team members
		$loop_count = 0;
		while ( $loop->have_posts() ) : $loop->the_post();
			
			$main_photo = get_field('photo_professional');
?>
			<div class="dropdown-item span_5" tabindex="0" role="button" aria-label="A team member">
				<img src="<?php echo $main_photo['url']; ?>" alt="<?php echo $main_photo['alt']; ?>">
				<h5><?php the_title(); ?></h5>
				<p class="role barr"><?php the_field('team_member_role'); ?></p>

				<article class="dropdown-content span_10">
					<span class="close"></span>
					<div class="bio">
						<?php the_content(); ?>
					</div>
				</article>
			</div><!-- // .team-member  -->
<?php 
		$loop_count ++;
		endwhile; 
		wp_reset_postdata();
?>

		</div><!-- // .team-gallery  -->
	</div><!-- // .team-container  -->


	<!-- Corporate Social Responsibility -->
	<div class="csr-container">
		<?php $image = get_field('section_image'); ?>
		<div class="sub-hero" style="background-image: url('<?php echo $image['url']; ?>');">
			<h2><?php the_field('section_title'); ?></h2>
		</div>
		<div class="text-container">
			<p class="span_6"><?php the_field('section_blurb'); ?></p>
		</div>
		<div class="dropdown-gallery">
			<?php
				if( have_rows('section_accordion') ):
			    	while ( have_rows('section_accordion') ) : the_row();
			?>
			<div class="dropdown-item span_4">
				<h5><?php the_sub_field('accordion_title'); ?></h5>
				<div class="dropdown-content">
					<h4><?php the_sub_field('accordion_title'); ?></h4>
					<p><?php the_sub_field('accordion_content'); ?></p>
					<div class="purple-block"></div>
				</div>
			</div>
			<?php 
				endwhile; // End of sector_dropdowns loop
				endif; 
			?>
		</div>
		<div class="text-container">
			<div class="span_7"><?php the_field('latest_report_text'); ?></p>
		</div>
	</div> <!-- // .csr-container  -->

			
<?php endwhile; // End of the page loop. ?>
	</div>
</div>

<?php
get_footer();

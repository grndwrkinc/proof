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

	<div class="text-container span_8">
		<?php the_content(); ?>
	</div>

	<!-- LEADERSHIP TEAM -->
	<div class="team-container">
		<div class="text-container">
			<h2 class="span_5"><?php the_field('ceo_header'); ?></h2>
			<div class="span_10"><?php the_field('ceo_message'); ?></div>
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
				<p class="role"><?php the_field('team_member_role'); ?></p>

				<article class="dropdown-content">
					<div class="dropdown-inner">
						<div class="social-share span_5">
<?php 
						// Check if each social media link exists. If yes, add list item w href and icon.
						$linkedin = get_field('linkedin_link');
						$twitter = get_field('twitter_link');
						$medium = get_field('medium_link');
						$instagram = get_field('instagram_link');
						$spotify = get_field('spotify_link');
?>
							<ul> 
<?php 				
						if( !empty($linkedin) ) { ?>
								<li><a href="<?php echo $linkedin; ?>" target="_blank" alt="Linkedin Link" aria-label="Link to Linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li> 	<?php 				
						}
						if( !empty($twitter) ) { ?>
								<li><a href="<?php echo $twitter; ?>" target="_blank" alt="Twitter link" aria-label="Link to twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li> 	<?php 				
						}
						if( !empty($medium) ) { ?>
								<li><a href="<?php echo $medium; ?>" target="_blank" alt="Medium link" aria-label="Link to Medium"><i class="fa  fa-medium" aria-hidden="true"></i></a></li> 		<?php 				
						}
						if( !empty($instagram) ) { ?>
								<li><a href="<?php echo $instagram; ?>" target="_blank" alt="Instagram link" aria-label="Link to Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li><?php 				
						}
						if( !empty($spotify) ) { ?>
								<li><a href="<?php echo $spotify; ?>" target="_blank" alt="Spotify link" aria-label="Link to Spotify"><i class="fa fa-spotify" aria-hidden="true"></i></a></li> 	<?php 				
						}
?>	
							</ul>						
						</div>
						<div class="bio span_10">
							<?php the_content(); ?>
						</div>
					</div>
				</article>
			</div><!-- // .team-member  -->
<?php 
		$loop_count ++;
		endwhile; 
		wp_reset_postdata();
?>

<?php 
		$loop_modulo = $loop_count % 3; 
			if ($loop_modulo == 2) {
				$filler_class = 'filler-span-one square';
			} else if ($loop_modulo == 1) {
				$filler_class = 'filler-span-two';
			} else if ($loop_modulo == 0) {
				$filler_class = 'filler-span-none';
			}; 
?>
						
			<div class="dropdown-item filler-span <?php echo $filler_class; ?>" style="background-image: url(/wp-content/themes/environics/assets/images/wwu_square.jpg)">
				<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Work With Us' ) ) ); ?>">
					<div class="tile-inner">
						<h3 class="barr">Work with us!</h3>
					</div>
				</a>
			</div>

		</div><!-- // .team-gallery  -->
	</div><!-- // .team-wrapper  -->

	

	<!-- Corporate Social Responsibility -->
	<div class="csr-container">
		<?php $image = get_field('section_image'); ?>
		<div class="sub-hero" style="background-image: url('<?php echo $image['url']; ?>');">
			<h2><?php the_field('section_title'); ?></h2>
		</div>
		<div class="text-container">
			<p class="span_6"><?php the_field('section_blurb'); ?></p>
		</div>
		<?php 			
			//DROPDOWN GALLERY
			if( have_rows('section_accordion') ):
				get_template_part('template-parts/component', 'dropdown');
			endif;
		?>	
		<div class="text-container">
			<div class="span_7"><?php the_field('latest_report_text'); ?></p>
		</div>
	</div> <!-- // .csr-container  -->

			
<?php endwhile; // End of the page loop. ?>
	</div>
</div>

<?php
get_footer();

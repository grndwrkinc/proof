<div id="primary" class="content-area">
<?php
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content', 'cantrusthero' );
		get_template_part( 'template-parts/content', 'socialbuttons' );

		?>

		<div class="block">
			<div class="video-block">
				<?php get_template_part('template-parts/component', 'video') ?>
			</div>
			<div class="container lead">
				<?php the_content(); ?>
			</div>
		</div>

		<div class="bg-pattern-purple block">
			
<?php 
			if(have_rows('infographic_images')):
				//get a count of the number of info graphics provided
				$count = 0; while ( have_rows('infographic_images') ) : the_row(); $count++; endwhile;

				if($count == 1) :
					while ( have_rows('infographic_images') ) : the_row();
					$infographic = get_sub_field('image');
?>
					<div class="container clearfix">
						<div class="half-left">
							<h2>Key Findings</h2>
							<?php the_field('key_findings'); ?>
							<a href="<?php echo $infographic['url']; ?>" class="cantrust-btn" download>Download infographic</a>
							<a href="<?php echo $infographic['url']; ?>" class="embed-infographic">Embed infographic</a>
							<div class="copy-box">
								<div class="close" tabindex="0" role="button"></div>
								<textarea class="embed-link"><iframe src="<?php echo $infographic['url']; ?>" width="512px" height="288px" frameborder="0"></iframe></textarea>
								<button class="embed-success"><p class="copy-inside">copy</p><i class="fa fa-check" aria-hidden="true"></i></button>
							</div>
						</div>

						<div class="half-right">
							<div class="infographic-block">
								<?php get_template_part('template-parts/component', 'infographic') ?>
							</div>
						</div>
					</div>

<?php
					endwhile;
				else :
?>
					<div class="container clearfix">
						<h2>Key Findings</h2>
					</div>
					<div class="container clearfix">
						<?php the_field('key_findings'); ?>
						<br />
					</div>
					<div class="container clearfix two-column">
<?php
						$count = 1;
						while ( have_rows('infographic_images') ) : the_row();

							($count == 1) ? $position = 'half-left' : $position = 'half-right';
							$infographic = get_sub_field('image');
?>
							<div class="<?php echo $position; ?>">
								<div class="infographic-block">
									<?php get_template_part('template-parts/component', 'infographic') ?>
								</div>
								<a href="<?php echo $infographic['url']; ?>" class="cantrust-btn" download>Download infographic</a>
								<a href="<?php echo $infographic['url']; ?>" class="embed-infographic">Embed infographic</a>
							</div>
<?php
							$count++;
						endwhile;
?>
					</div>
<?php

					
				endif;
			endif;
?>
			
		</div>

		<div class="block container center report">
			<h2>The <?php the_field('report_year'); ?> Report</h2>
			<?php the_field('cantrust_index'); ?>
		
			<div class="container">
				<?php $fullReport = get_field('full_report');
					if( $fullReport ): ?>
					<a href="<?php echo $fullReport['url']; ?>" class="cantrust-btn" download>Download the full report</a>
				<?php endif; ?>

				<?php $clipSlides = get_field('clip_slides_url');
					if( $clipSlides ): ?>
					<a href="<?php echo $clipSlides; ?>" class="cantrust-btn" target="_blank">Clip Slides on LinkedIn</a>
				<?php endif; ?>
			</div>
		</div>

		<div class="container block more-info">
<?php
			$relatedPosts = get_field('related_posts');

			if( have_rows('findings_buttons') ):
?>
			<div class="left-two-thirds">
				<h2>Detailed Findings</h2>
				<p>Want to get all the details from the study, or are you interested in one aspect in particular?</p>
				<p>Download any of the whitepapers below to get the full picture.</p>
				<div class="four-buttons">
					<?php
				    while ( have_rows('findings_buttons') ) : the_row();
						?><a class="purple-download-btn" href="<?php the_sub_field('download_content'); ?>" target="blank"><?php the_sub_field('findings_title'); ?> <i class="fa fa-download" aria-hidden="true"></i></a> 
						<?php 
				    endwhile;
					?>
				</div>
			</div>

<?php
				if($relatedPosts) : foreach ($relatedPosts as $relatedPost) :
					$postType = get_post_type($relatedPost);
					($postType == "news") ? $label = "Announcement" : $label = "Thinking";
?>
			<div class="right-one-third">
				<a href="<?php echo get_permalink($relatedPost->ID); ?>">
					<div class="masonry-tile source-thinking animate" style="background-image:url(<?php echo get_the_post_thumbnail_url($relatedPost->ID); ?>)">
						<div class="tile-inner">
							<h5><?php echo $label; ?></h5>
							<p><?php echo get_the_title($relatedPost->ID); ?></p>
						</div>
					</div>
				</a>
			</div>
<?php
					endforeach;
				endif;
			else :
				if($relatedPosts) : foreach ($relatedPosts as $relatedPost) : 
					$postType = get_post_type($relatedPost);
					($postType == "news") ? $label = "Announcement" : $label = "Thinking";
?>
			<a href="<?php echo get_permalink($relatedPost->ID); ?>">
				<div class="masonry-tile source-thinking animate" style="background-image:url(<?php echo get_the_post_thumbnail_url($relatedPost->ID); ?>)">
					<div class="tile-inner">
						<h5><?php echo $label; ?></h5>
						<p><?php echo get_the_title($relatedPost->ID); ?></p>
					</div>
				</div>
			</a>
			
<?php
				endforeach; endif;
			endif;
?>
		</div>
	<?php

	endwhile;
?>		
</div><!-- #primary -->

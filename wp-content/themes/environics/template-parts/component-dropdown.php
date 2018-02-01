<?php
	if( have_rows('section_accordion') ) :
?>

	<div class="dropdown-gallery">

<?php while ( have_rows('section_accordion') ) : the_row();
		$accordion_image = get_sub_field('accordion_image');
?>
		<div class="dropdown-item span_4">
			<h5><?php the_sub_field('accordion_title'); ?></h5>
			<div class="dropdown-content">
				<h2 class="span_7"><?php the_sub_field('accordion_title'); ?></h2>
				<div class="dropdown-flex">
					<div class="span_4">
						<img src="<?php echo $accordion_image['url']; ?>" alt="<?php echo $accordion_image['alt']; ?>">
					</div>
					<div class="span_5">
						<div><?php the_sub_field('accordion_content'); ?></div>
					</div>
				</div>
			</div>
		</div>
<?php 
	endwhile; 
?>
	</div>
<?php
	endif;
?>
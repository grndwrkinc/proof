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
				<h4><?php the_sub_field('accordion_title'); ?></h4>
				<img src="<?php echo $accordion_image['url']; ?>" alt="<?php echo $accordion_image['alt']; ?>">
				<div><?php the_sub_field('accordion_content'); ?></div>
			</div>
		</div>
<?php 
	endwhile; 
?>
	</div>
<?php
	endif;
?>
<?php
get_header();
?>
	
	<div class="block hero bg-pattern-purple">
		<div class="container">
			<h1 id="content"><?php the_title(); ?></h1>
		</div>
	</div>

	<div class="single-entry container">
		<div class="text">

			<?php the_content(); ?>

		</div>
	</div>

<?php
get_footer();

<?php
get_header();
?>

<?php 
	$tags = get_the_terms($post->ID, 'tags');
	$tagMatched = false;
	foreach ($tags as $tag) {
		if(strcmp(strtolower($tag->name),"cantrust") == 0) {
			$tagMatched = true;
		}
	}

	if(has_term('Report', 'thinking_categories', $post->ID) && $tagMatched) {
		if(get_the_date('Y-m', $post) != "2017-04") {
			get_template_part('template-parts/content', 'cantrust'); 
		}
		else {
			get_template_part('template-parts/content', 'cantrust-2017'); 
		}
	}
	else {
		get_template_part('template-parts/content', 'thinking');
	}
?>

	
<?php
get_footer();

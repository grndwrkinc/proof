<?php
				global $post; 
				$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				$post_type = get_post_type();
				$page_taxonomy = get_object_taxonomies( $post_type );
				$taxonomy_name = $page_taxonomy[0];
				$page_category = get_the_terms( $post->ID, $taxonomy_name );
				$author = get_the_author_posts_link();
				$post_date = get_the_date();
				$excerpt = get_the_excerpt();
			?>	
				<div class="tiles-item">
					<div class="post-meta">
						<h4><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h4>
						<p><?php echo $post_date; ?><span class="author"><?php echo $author; ?></span></p>
					</div>
					<div class="post-sample">
						<p><?php echo $excerpt; ?></p>
					</div>
					
				</div>
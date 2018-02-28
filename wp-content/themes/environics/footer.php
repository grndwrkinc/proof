<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package environics
 */

?>
	</div><!-- .site-content -->

	<footer class="site-footer">
		<div class="footer-container">
			<div class="footer-links"><?php wp_nav_menu( array( 'menu' => 'Footer Menu', ) ); ?></div>
			<p class="copyright">©<?php echo date('Y');?> Proof</p>
			<div class="social-icons">
				<?php if(get_field('twitter_account', 'option')): ?>
					<a href="<?php the_field('twitter_account', 'option'); ?>" target="_blank" alt="Twitter link" aria-label="Link to Environics Twitter account"><i class="fa fa-twitter" aria-hidden="true"></i></a>
				<?php endif; ?>
				<?php if(get_field('facebook_account', 'option')): ?>
					<a href="<?php the_field('facebook_account', 'option'); ?>" target="_blank" alt="Facebook link" aria-label="Link to Environics Facebook account"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				<?php endif; ?>
				<?php if(get_field('instagram_account', 'option')): ?>
					<a href="<?php the_field('instagram_account', 'option'); ?>" target="_blank" alt="Instagram link" aria-label="Link to Environics Instagram account"><i class="fa fa-instagram" aria-hidden="true"></i></a>
				<?php endif; ?>
				<?php if(get_field('youtube_account', 'option')): ?>
					<a href="<?php the_field('youtube_account', 'option'); ?>" target="_blank" alt="Youtube link" aria-label="Link to Environics Youtube account"><i class="fa fa-youtube" aria-hidden="true"></i></a>
				<?php endif; ?>
				<?php if(get_field('linkedin_account', 'option')): ?>
					<a href="<?php the_field('linkedin_account', 'option'); ?>" target="_blank" alt="LinkedIn link" aria-label="Link to Environics LinkedIn account"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
				<?php endif; ?>
			</div>
		</div>
	</footer>
</div> <!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

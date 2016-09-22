<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Champagne
 */
?>
		</div><!-- .site-content -->

		<footer class="site-footer" role="contentinfo">
			<div class="copyright">
				<?php if ( get_theme_mod( 'footer_contact_info' ) ) : ?>
					<p><?php echo get_theme_mod( 'footer_contact_info' ); ?></p>
				<?php endif; ?>
				<div class="footer-navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer' ) ); ?>
				</div>
				<?php if ( get_theme_mod( 'copyright_notice' ) ) : ?>
					<span><?php echo get_theme_mod( 'copyright_notice' ); ?></span>
				<?php endif; ?>
			</div>
		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>

<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Lepbase_Dot_Org
 * @since Lepbase Dot Org 1.0
 */
?>

		</div><!-- #main -->
		<footer class="site-footer" role="contentinfo">
			<?php get_sidebar( 'main' ); ?>

			<!--div class="site-info">
				<?php do_action( 'lepbasedotorg_credits' ); ?>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'lepbasedotorg' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'lepbasedotorg' ); ?>"><?php printf( __( 'Proudly powered by %s', 'lepbasedotorg' ), 'WordPress' ); ?></a>
			</div--><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>
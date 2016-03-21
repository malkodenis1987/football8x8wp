<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Football8x8
 * @since Football8x8 1.0
 */
?>

	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php
				/**
				 * Fires before the Football8x8 footer text for footer customization.
				 *
				 * @since Football8x8 1.0
				 */
				do_action( 'football8x8_credits' );
			?>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'football8x8' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'football8x8' ), 'WordPress' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->

</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>

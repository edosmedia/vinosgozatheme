<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vinosgoza
 */

?>


	<footer id="colophon" class="site-footer vg-footer">

		<div class="site-info container">
		<aside id="secondary" class="widget-area">
		<?php dynamic_sidebar( 'footer' ); ?>
		</aside>
			<a href="<?php echo esc_url( __( 'https://vinosgoza', 'vinoszona' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Derechos Reservados %s', 'vinoszona' ), 'Gonzalez Zapiain Ltda' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Diseño y Desarrollo de %2$s.', 'vinoszona' ), 'vinoszona', '<a href="http://edosmedia.com">EDOS MEDIA</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

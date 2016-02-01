<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package fortunato
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info smallPart">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'fortunato' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'fortunato' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'fortunato' ), 'Fortunato', '<a target="_blank" href="http://crestaproject.com/" rel="designer">CrestaProject</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<a href="#top" id="toTop"><i class="fa fa-angle-up fa-lg"></i></a>
<?php if (is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div class="openSidebar"><i class="fa fa-bars"></i></div>
<?php endif; ?>
<?php wp_footer(); ?>

</body>
</html>

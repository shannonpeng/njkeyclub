<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>

 *
 * @package fortunato
 */

/**
 * Set up the WordPress core custom header feature.
 */
function fortunato_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'fortunato_custom_header_args', array(
		'default-image'          => get_template_directory_uri() . '/images/fortunato-main-image-example.jpg',
		'width'                  => 1920,
		'height'                 => 1080,
		'flex-height'            => true,
		'header-text'            => false,
	) ) );
}
add_action( 'after_setup_theme', 'fortunato_custom_header_setup' );
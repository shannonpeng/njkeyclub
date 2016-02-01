<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package fortunato
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.min.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'fortunato' ); ?></a>
	<?php 
		global $fortunato_theme_options;
		$se_options = get_option( 'fortunato_theme_options', $fortunato_theme_options );
	?>
	<?php if (is_singular() && '' != get_the_post_thumbnail() ) : ?>
	<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'fortunato-the-post'); ?>
	<header id="masthead" class="site-header" role="banner" style="background: url(<?php echo $src[0] ?>) 50% 50% / cover no-repeat;">
	<?php else: ?>
	<header id="masthead" class="site-header" role="banner" style="background: url(<?php header_image(); ?>) 50% 50% / cover no-repeat;">
	<?php endif; ?>	
		<div class="site-social">
			<div class="socialLine">
				<?php if ( $se_options['facebookurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['facebookurl']); ?>" title="<?php esc_attr_e( 'Facebook', 'fortunato' ); ?>"><i class="fa fa-facebook spaceLeftRight"><span class="screen-reader-text"><?php esc_attr_e( 'Facebook', 'fortunato' ); ?></span></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['twitterurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['twitterurl']); ?>" title="<?php esc_attr_e( 'Twitter', 'fortunato' ); ?>"><i class="fa fa-twitter spaceLeftRight"><span class="screen-reader-text"><?php esc_attr_e( 'Twitter', 'fortunato' ); ?></span></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['googleplusurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['googleplusurl']); ?>" title="<?php esc_attr_e( 'Google Plus', 'fortunato' ); ?>"><i class="fa fa-google-plus spaceLeftRight"><span class="screen-reader-text"><?php esc_attr_e( 'Google Plus', 'fortunato' ); ?></span></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['linkedinurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['linkedinurl']); ?>" title="<?php esc_attr_e( 'Linkedin', 'fortunato' ); ?>"><i class="fa fa-linkedin spaceLeftRight"><span class="screen-reader-text"><?php esc_attr_e( 'Linkedin', 'fortunato' ); ?></span></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['instagramurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['instagramurl']); ?>" title="<?php esc_attr_e( 'Instagram', 'fortunato' ); ?>"><i class="fa fa-instagram spaceLeftRight"><span class="screen-reader-text"><?php esc_attr_e( 'Instagram', 'fortunato' ); ?></span></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['youtubeurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['youtubeurl']); ?>" title="<?php esc_attr_e( 'YouTube', 'fortunato' ); ?>"><i class="fa fa-youtube spaceLeftRight"><span class="screen-reader-text"><?php esc_attr_e( 'YouTube', 'fortunato' ); ?></span></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['pinteresturl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['pinteresturl']); ?>" title="<?php esc_attr_e( 'Pinterest', 'fortunato' ); ?>"><i class="fa fa-pinterest spaceLeftRight"><span class="screen-reader-text"><?php esc_attr_e( 'Pinterest', 'fortunato' ); ?></span></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['tumblrurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['tumblrurl']); ?>" title="<?php esc_attr_e( 'Tumblr', 'fortunato' ); ?>"><i class="fa fa-tumblr spaceLeftRight"><span class="screen-reader-text"><?php esc_attr_e( 'Tumblr', 'fortunato' ); ?></span></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['vkurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['vkurl']); ?>" title="<?php esc_attr_e( 'VK', 'fortunato' ); ?>"><i class="fa fa-vk spaceLeftRight"><span class="screen-reader-text"><?php esc_attr_e( 'VK', 'fortunato' ); ?></span></i></a>
				<?php endif; ?>
				
				<?php if ( ! $se_options['hidesearch'] ) : ?>
					<div class="openSearch"><i class="fa fa-search"></i></div>
				<?php endif; ?>
			</div>
		</div>
		
		<?php if ( ! $se_options['hidesearch'] ) : ?>
		<!-- Start: Search Form -->
		<div id="search-full">
			<div class="search-container">
				<form role="search" method="get" id="search-form" action="<?php echo home_url( '/' ); ?>">
					<label>
						<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'fortunato' ); ?></span>
						<input type="search" name="s" id="search-field" placeholder="<?php esc_html_e('Type here and hit enter...', 'fortunato'); ?>">
					</label>
				</form>
				<span class="closeSearch"><i class="fa fa-close spaceRight"></i><?php esc_html_e('Close', 'fortunato'); ?></span>
			</div>
		</div>
		<!-- End: Search Form -->
		<?php endif; ?>
		
		<?php if ( ! $se_options['hideoverlay'] ) : ?>
			<div class="site-brand-main" style=" background-image: url(<?php echo get_template_directory_uri() . '/images/overlay.png'; ?>);">
		<?php else: ?>
			<div class="site-brand-main">
		<?php endif; ?>
			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<p class="site-description"><?php bloginfo( 'description' ); ?></p>
			</div><!-- .site-branding -->
		</div>
		
		<div class="theNavigationBar">
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Main Menu', 'fortunato' ); ?><i class="fa fa-bars"></i></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">

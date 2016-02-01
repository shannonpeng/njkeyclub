<?php 
/**
 * fortunato functions and dynamic template
 *
 * @package fortunato
 */
 
/**
 * Replace Excerpt More
 */
function fortunato_new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'fortunato_new_excerpt_more');

 /**
 * Delete font size style from tag cloud widget
 */
function fortunato_fix_tag_cloud($tag_string){
   return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
}
add_filter('wp_generate_tag_cloud', 'fortunato_fix_tag_cloud',10,3);

 /**
 * Register All Colors and Section
 */
function fortunato_color_primary_register( $wp_customize ) {
	$colors = array();
	
	$colors[] = array(
	'slug'=>'fortunato_box_background_color', 
	'default' => '#ffffff',
	'label' => __('Background Color', 'fortunato')
	);
	
	$colors[] = array(
	'slug'=>'fortunato_box_text_color', 
	'default' => '#6c6c6c',
	'label' => __('Text Color', 'fortunato')
	);
	
	$colors[] = array(
	'slug'=>'fortunato_box_second_text_color', 
	'default' => '#cecece',
	'label' => __('Secondary Text Color', 'fortunato')
	);
	
	$colors[] = array(
	'slug'=>'fortunato_special_color', 
	'default' => '#cea525',
	'label' => __('Special Color', 'fortunato')
	);
	
	foreach( $colors as $fortunato_theme_options_colors ) {
	// SETTINGS
		$wp_customize->add_setting(
			'fortunato_theme_options_colors[' . $fortunato_theme_options_colors['slug'] . ']', array(
			'default' => $fortunato_theme_options_colors['default'],
			'type' => 'option', 
			'sanitize_callback' => 'sanitize_hex_color',
			'capability' => 'edit_theme_options'
		)
	);
	// CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$fortunato_theme_options_colors['slug'], 
			array('label' => $fortunato_theme_options_colors['label'], 
			'section' => 'colors',
			'settings' =>'fortunato_theme_options_colors[' . $fortunato_theme_options_colors['slug'] . ']',
			)
		)
	);
	
	}
}
add_action( 'customize_register', 'fortunato_color_primary_register' );

/**
 * Add Custom CSS to Header 
 */
function fortunato_custom_css_styles() { 
	global $fortunato_theme_options_colors;
	$color_options = get_option( 'fortunato_theme_options_colors', $fortunato_theme_options_colors );	
	if( isset( $color_options[ 'fortunato_box_background_color' ] ) ) {
		$fortunato_box_background_color = $color_options['fortunato_box_background_color'];
	}
	if( isset( $color_options[ 'fortunato_box_text_color' ] ) ) {
		$fortunato_box_text_color = $color_options['fortunato_box_text_color'];
	}
	if( isset( $color_options[ 'fortunato_box_second_text_color' ] ) ) {
		$fortunato_box_second_text_color = $color_options['fortunato_box_second_text_color'];
	}
	if( isset( $color_options[ 'fortunato_special_color' ] ) ) {
		$fortunato_special_color = $color_options['fortunato_special_color'];
	}
?>
	<style type="text/css">
		<?php if (!empty($fortunato_box_background_color) && $fortunato_box_background_color != '#ffffff' ) : ?>
			<?php list($r, $g, $b) = sscanf($fortunato_box_background_color, '#%02x%02x%02x'); ?>
			body,
			.widget-area,
			input[type="text"],
			input[type="email"],
			input[type="url"],
			input[type="password"],
			input[type="search"],
			textarea {
				background: <?php echo esc_attr($fortunato_box_background_color); ?>;
			}
			button,
			input[type="button"],
			input[type="reset"],
			input[type="submit"],
			.site-header a, .read-link a,
			#wp-calendar > caption,
			.openSidebar, .openSearch,
			.main-navigation ul ul a:hover,
			.site-title a:hover,
			.site-title a:focus {
				color: <?php echo esc_attr($fortunato_box_background_color); ?>;
			}
			.cat-links a,
			.tagcloud a,
			.read-link a,
			.site-main .pagination .nav-links a,
			.page-links > a {
				color: <?php echo esc_attr($fortunato_box_background_color); ?> !important;
			}
			#search-full {
				background: rgba(<?php echo esc_attr($r).', '.esc_attr($g).', '.esc_attr($b); ?>, 0.9);
			}
			@media screen and (max-width: 768px) {
				.menu-toggle,
				.main-navigation.toggled .nav-menu,
				.menu-toggle:hover, .menu-toggle:focus {
					background: <?php echo esc_attr($fortunato_box_background_color); ?>;
				}
				.main-navigation.toggled .menu-toggle {
					color: <?php echo esc_attr($fortunato_box_background_color); ?>;
				}
			}
		<?php endif; ?>
		
		<?php if (!empty($fortunato_box_text_color) && $fortunato_box_text_color != '#6c6c6c' ) : ?>
			<?php list($r, $g, $b) = sscanf($fortunato_box_text_color, '#%02x%02x%02x'); ?>
			body,
			button,
			input,
			select,
			textarea,
			button:hover,
			input[type="button"]:hover,
			input[type="reset"]:hover,
			input[type="submit"]:hover,
			button:focus,
			input[type="button"]:focus,
			input[type="reset"]:focus,
			input[type="submit"]:focus,
			button:active,
			input[type="button"]:active,
			input[type="reset"]:active,
			input[type="submit"]:active,
			a:hover,
			a:focus,
			a:active,
			.openSidebar.sidebarColor,
			.openSearch.sidebarColor,
			#toTop {
				color: <?php echo esc_attr($fortunato_box_text_color); ?>;
			}
			.cat-links a:hover,
			.cat-links a:focus,
			.tagcloud a:hover,
			.tagcloud a:focus,
			.read-link a:hover,
			.read-link a:focus,
			.site-main .pagination .nav-links a:hover,
			.site-main .pagination .nav-links a:focus,
			.page-links > a:hover,
			.page-links > a:focus {
				color: <?php echo esc_attr($fortunato_box_text_color); ?> !important;
			}
			.main-navigation ul ul {
				background: <?php echo esc_attr($fortunato_box_text_color); ?>;
			}
			.site-brand-main {
				background-color: rgba(<?php echo esc_attr($r).', '.esc_attr($g).', '.esc_attr($b); ?>, 0.4);
			}
			@media screen and (max-width: 768px) {
				.menu-toggle,
				.menu-toggle:hover, .menu-toggle:focus {
					color: <?php echo esc_attr($fortunato_box_text_color); ?>;
				}
				.main-navigation a {
					color: <?php echo esc_attr($fortunato_box_text_color); ?> !important;
				}
			}
		<?php endif; ?>
		
		<?php if (!empty($fortunato_box_second_text_color) && $fortunato_box_second_text_color != '#cecece' ) : ?>
			select,
			input[type="text"],
			input[type="email"],
			input[type="url"],
			input[type="password"],
			input[type="search"],
			textarea {
				border: 1px solid <?php echo esc_attr($fortunato_box_second_text_color); ?>;
			}
			.sepHentry:before, .sepHentry:after {
				border-bottom: 1px solid <?php echo esc_attr($fortunato_box_second_text_color); ?>;
			}
			.sepHentry2 {
				border-top: 1px solid <?php echo esc_attr($fortunato_box_second_text_color); ?>;
			}
			.widget-area {
				border-right: 1px solid <?php echo esc_attr($fortunato_box_second_text_color); ?>;
			}
			.smallPart,
			input[type="text"],
			input[type="email"],
			input[type="url"],
			input[type="password"],
			input[type="search"],
			textarea,
			.smallPart a,
			.smallPart a:hover,
			.smallPart a:focus,
			.smallPart a:active,
			.sepHentry {
				color: <?php echo esc_attr($fortunato_box_second_text_color); ?>;
			}
			button:hover,
			input[type="button"]:hover,
			input[type="reset"]:hover,
			input[type="submit"]:hover,
			button:focus,
			input[type="button"]:focus,
			input[type="reset"]:focus,
			input[type="submit"]:focus,
			button:active,
			input[type="button"]:active,
			input[type="reset"]:active,
			input[type="submit"]:active,
			.site-main .pagination .nav-links > span,
			.page-links > span.page-links-number,
			.cat-links a:hover, .cat-links a:focus,
			.tagcloud a:hover, .tagcloud a:focus,
			.read-link a:hover, .read-link a:focus,
			.site-main .pagination .nav-links a:hover,
			.site-main .pagination .nav-links a:focus,
			.page-links > a:hover, .page-links > a:hover {
				background: <?php echo esc_attr($fortunato_box_second_text_color); ?>;
			}
		<?php endif; ?>
		
		<?php if (!empty($fortunato_special_color) && $fortunato_special_color != '#cea525' ) : ?>
			.site-header,
			blockquote::before,
			a,
			.site-social a:hover,
			.comment-reply-title {
				color: <?php echo esc_attr($fortunato_special_color); ?>;
			}
			button,
			input[type="button"],
			input[type="reset"],
			input[type="submit"],
			#wp-calendar > caption,
			.cat-links a, .tagcloud a,
			.read-link a, .site-main .pagination .nav-links a,
			.page-links > a {
				background: <?php echo esc_attr($fortunato_special_color); ?>;
			}
			blockquote {
				border-left: 3px solid <?php echo esc_attr($fortunato_special_color); ?>;
				border-right: 1px solid <?php echo esc_attr($fortunato_special_color); ?>;
			}
			input[type="text"]:focus,
			input[type="email"]:focus,
			input[type="url"]:focus,
			input[type="password"]:focus,
			input[type="search"]:focus,
			textarea:focus,
			#wp-calendar tbody td#today {
				border: 1px solid <?php echo esc_attr($fortunato_special_color); ?>;
			}
			.main-navigation ul li:hover > a, 
			.main-navigation ul li.focus > a, 
			.main-navigation li.current-menu-item > a, 
			.main-navigation li.current-menu-parent > a, 
			.main-navigation li.current-page-ancestor > a,
			.main-navigation .current_page_item > a, 
			.main-navigation .current_page_parent > a {
				border-top: 2px solid <?php echo esc_attr($fortunato_special_color); ?>;
			}
			@media screen and (max-width: 768px) {
				.main-navigation.toggled .menu-toggle {
					background: <?php echo esc_attr($fortunato_special_color); ?>;
				}
			}
		<?php endif; ?>
	</style>
	<?php
}
add_action('wp_head', 'fortunato_custom_css_styles');
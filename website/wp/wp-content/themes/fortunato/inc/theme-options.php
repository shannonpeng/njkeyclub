<?php
/**
 * Default Options
 */
$fortunato_theme_options = array( 
	'hidesearch' => '0',
	'hideoverlay' => '0',
	'facebookurl' => '#', 
	'twitterurl' => '#', 
	'googleplusurl' => '#', 
	'linkedinurl' => '#', 
	'instagramurl' => '#', 
	'youtubeurl' => '#', 
	'pinteresturl' => '#', 
	'tumblrurl' => '#',
	'vkurl' => '#'
);

if ( current_user_can('manage_options') ) {
	function fortunato_toolbar_link_to_mypage( $wp_admin_bar ) {
		$args = array(
			'id'    => 'fortunato_theme_options',
			'title' => __('Fortunato Theme Options', 'fortunato' ),
			'href'  => admin_url('themes.php?page=theme_options')
		);
		$wp_admin_bar->add_node( $args );
	}
	add_action( 'admin_bar_menu', 'fortunato_toolbar_link_to_mypage', 999 );
}

if ( is_admin() ) : // Load only if we are viewing an admin page

add_action( 'admin_init', 'fortunato_options_init' );
add_action( 'admin_menu', 'fortunato_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function fortunato_options_init(){
	register_setting( 'fortunato_options_add_page', 'fortunato_theme_options', 'fortunato_options_validate' );
}

/**
 * Load up the menu page
 */
function fortunato_options_add_page() {
	add_theme_page( __( 'Fortunato Theme Options', 'fortunato' ), __( 'Fortunato Theme Options', 'fortunato' ), 'edit_theme_options', 'theme_options', 'fortunato_options_do_page' );
}

/**
 * Create the options page
 */
function fortunato_options_do_page() {
	global $fortunato_theme_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;
	?>
	<div class="wrap">
		<?php echo "<h2>" . wp_get_theme() . __( ' Free Theme Options', 'fortunato' ) . "</h2>"; ?>
			
		<div class="updated" style="background:#E9F7DF;clear: both;display: table;width: 100%;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;border-left: 4px solid #1fa67a;">
			<h3><div class="dashicons dashicons-megaphone"></div> <?php esc_html_e( 'Need more features and options? Upgrade to PRO!', 'fortunato' ); ?></h3>
			<p><?php esc_html_e( 'Get', 'fortunato' ); ?> <b><?php esc_html_e( 'Fortunato PRO', 'fortunato' ); ?></b> <?php esc_html_e( 'WordPress Theme for only', 'fortunato' ); ?> <b>29,90&euro;</b></p>
			<div class="fortunatoLeft" style="float:left; width: 30%; text-align: center;">
				<a style="display: inline-block;padding: 20px;background: #1fa67a;border-radius: 5px;color: #ffffff;font-size: 125%;-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);margin: 40px 0 20px;" href="http://crestaproject.com/demo/fortunato-pro/" target="_blank"><div class="dashicons dashicons-visibility"></div> <?php esc_html_e( 'Demo (Fortunato PRO)', 'fortunato' ); ?></a>
				<br />
				<a style="display: inline-block;padding: 20px;background: #1fa67a;border-radius: 5px;color: #ffffff;font-size: 125%;-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);" href=" http://crestaproject.com/downloads/fortunato/" target="_blank"><div class="dashicons dashicons-heart"></div> <?php esc_html_e( 'Get The Pro Version', 'fortunato' ); ?></a></a>
			</div>
			<div class="fortunatoRight" style="float:right; width: 70%;">
			<ul>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Advanced Theme Options', 'fortunato' ); ?></b> <?php esc_html_e( '(Manage Loading Page, Additional Custom Code, Font switcher and much more...)', 'fortunato' ); ?></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Logo Upload', 'fortunato' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Unlimited Colors and Skin', 'fortunato' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Choose header height (100% - 75% - 50%)', 'fortunato' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Breadcrumb', 'fortunato' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( '8 Shortcodes', 'fortunato' ); ?></b> <?php esc_html_e( '(Parallax Image, Toggle, Tabs, Boxes, Columns, Highlights, Buttons and Drop Cap)', 'fortunato' ); ?></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( '11 Exclusive Widgets', 'fortunato' ); ?></b> <?php esc_html_e( '(Latest Tweet, Instagram, Social Buttons, Recent Posts with Thumbnail and Most Commented Posts...)', 'fortunato' ); ?></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Related Posts Box', 'fortunato' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Information About Author Box', 'fortunato' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Advertising System', 'fortunato' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'Custom image for 404 page and search page', 'fortunato' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e( 'And much more...', 'fortunato' ); ?></b></li>
			<ul>
			</div>
		</div>	
		
		<p><?php _e( 'These options will let you setup the the social icons at the top of the theme, the main image and choose whether to show the search button.', 'fortunato' ); ?></p>
		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php esc_html_e( 'Options saved', 'fortunato' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
		<?php $se_options = get_option( 'fortunato_theme_options', $fortunato_theme_options ); ?>
		
		<?php settings_fields( 'fortunato_options_add_page' ); ?>
			
			<table class="form-table">
				
				<?php
				/**
				 * Search Button
				 */
				?>
				<tr valign="top"><th scope="row"><?php esc_html_e( 'Hide Search Button?', 'fortunato' ); ?></th>
					<td>
						<input id="fortunato_theme_options[hidesearch]" name="fortunato_theme_options[hidesearch]" type="checkbox" value="1" <?php checked( '1', $se_options['hidesearch'] ); ?> />
						<label class="description" for="fortunato_theme_options[hidesearch]"><?php esc_html_e( 'Check it if you want to hide the Search button', 'fortunato' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Overlay
				 */
				?>
				<tr valign="top"><th scope="row"><?php esc_html_e( 'Hide Overlay on main image?', 'fortunato' ); ?></th>
					<td>
						<input id="fortunato_theme_options[hideoverlay]" name="fortunato_theme_options[hideoverlay]" type="checkbox" value="1" <?php checked( '1', $se_options['hideoverlay'] ); ?> />
						<label class="description" for="fortunato_theme_options[hideoverlay]"><?php esc_html_e( 'Check it if you want to hide the overlay on main image', 'fortunato' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Facebook Icon
				 */
				?>
				<tr valign="top"><th scope="row"><?php esc_html_e( 'Enter your Facebook URL', 'fortunato' ); ?></th>
					<td>
						<input id="fortunato_theme_options[facebookurl]" class="regular-text" type="text" name="fortunato_theme_options[facebookurl]" value="<?php if( isset( $se_options[ 'facebookurl' ] ) ) echo esc_url( $se_options[ 'facebookurl' ] ); ?>" />
						<label class="description" for="fortunato_theme_options[facebookurl]"><?php esc_html_e( 'Leave blank to hide Facebook Icon', 'fortunato' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Twitter URL
				 */
				?>
				<tr valign="top"><th scope="row"><?php esc_html_e( 'Enter your Twitter URL', 'fortunato' ); ?></th>
					<td>
						<input id="fortunato_theme_options[twitterurl]" class="regular-text" type="text" name="fortunato_theme_options[twitterurl]" value="<?php if( isset( $se_options[ 'twitterurl' ] ) ) echo esc_url( $se_options[ 'twitterurl' ] ); ?>" />
						<label class="description" for="fortunato_theme_options[twitterurl]"><?php esc_html_e( 'Leave blank to hide Twitter Icon', 'fortunato' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Google +
				 */
				?>
				<tr valign="top"><th scope="row"><?php esc_html_e( 'Enter your Google + URL', 'fortunato' ); ?></th>
					<td>
						<input id="fortunato_theme_options[googleplusurl]" class="regular-text" type="text" name="fortunato_theme_options[googleplusurl]" value="<?php if( isset( $se_options[ 'googleplusurl' ] ) ) echo esc_url( $se_options[ 'googleplusurl' ] ); ?>" />
						<label class="description" for="fortunato_theme_options[googleplusurl]"><?php esc_html_e( 'Leave blank to hide Google + Icon', 'fortunato' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Linkedin
				 */
				?>
				<tr valign="top"><th scope="row"><?php esc_html_e( 'Enter your Linkedin URL', 'fortunato' ); ?></th>
					<td>
						<input id="fortunato_theme_options[linkedinurl]" class="regular-text" type="text" name="fortunato_theme_options[linkedinurl]" value="<?php if( isset( $se_options[ 'linkedinurl' ] ) ) echo esc_url( $se_options[ 'linkedinurl' ] ); ?>" />
						<label class="description" for="fortunato_theme_options[linkedinurl]"><?php esc_html_e( 'Leave blank to hide Linkedin Icon', 'fortunato' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Instagram
				 */
				?>
				<tr valign="top"><th scope="row"><?php esc_html_e( 'Enter your Instagram URL', 'fortunato' ); ?></th>
					<td>
						<input id="fortunato_theme_options[instagramurl]" class="regular-text" type="text" name="fortunato_theme_options[instagramurl]" value="<?php if( isset( $se_options[ 'instagramurl' ] ) ) echo esc_url( $se_options[ 'instagramurl' ] ); ?>" />
						<label class="description" for="fortunato_theme_options[instagramurl]"><?php esc_html_e( 'Leave blank to hide Instagram Icon', 'fortunato' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * YouTube
				 */
				?>
				<tr valign="top"><th scope="row"><?php esc_html_e( 'Enter your YouTube URL', 'fortunato' ); ?></th>
					<td>
						<input id="fortunato_theme_options[youtubeurl]" class="regular-text" type="text" name="fortunato_theme_options[youtubeurl]" value="<?php if( isset( $se_options[ 'youtubeurl' ] ) ) echo esc_url( $se_options[ 'youtubeurl' ] ); ?>" />
						<label class="description" for="fortunato_theme_options[youtubeurl]"><?php esc_html_e( 'Leave blank to hide YouTube Icon', 'fortunato' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Pinterest
				 */
				?>
				<tr valign="top"><th scope="row"><?php esc_html_e( 'Enter your Pinterest URL', 'fortunato' ); ?></th>
					<td>
						<input id="fortunato_theme_options[pinteresturl]" class="regular-text" type="text" name="fortunato_theme_options[pinteresturl]" value="<?php if( isset( $se_options[ 'pinteresturl' ] ) ) echo esc_url( $se_options[ 'pinteresturl' ] ); ?>" />
						<label class="description" for="fortunato_theme_options[pinteresturl]"><?php esc_html_e( 'Leave blank to hide Pinterest Icon', 'fortunato' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Tumblr
				 */
				?>
				<tr valign="top"><th scope="row"><?php esc_html_e( 'Enter your Tumblr URL', 'fortunato' ); ?></th>
					<td>
						<input id="fortunato_theme_options[tumblrurl]" class="regular-text" type="text" name="fortunato_theme_options[tumblrurl]" value="<?php if( isset( $se_options[ 'tumblrurl' ] ) ) echo esc_url( $se_options[ 'tumblrurl' ] ); ?>" />
						<label class="description" for="fortunato_theme_options[tumblrurl]"><?php esc_html_e( 'Leave blank to hide Tumblr Icon', 'fortunato' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * VK
				 */
				?>
				<tr valign="top"><th scope="row"><?php esc_html_e( 'Enter your VK URL', 'fortunato' ); ?></th>
					<td>
						<input id="fortunato_theme_options[vkurl]" class="regular-text" type="text" name="fortunato_theme_options[vkurl]" value="<?php if( isset( $se_options[ 'vkurl' ] ) ) echo esc_url( $se_options[ 'vkurl' ] ); ?>" />
						<label class="description" for="fortunato_theme_options[vkurl]"><?php esc_html_e( 'Leave blank to hide VK Icon', 'fortunato' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Customize Link
				 */
				?>
				<tr valign="top"><th scope="row"><?php esc_html_e( 'Colors and Main Image', 'fortunato' ); ?></th>
					<td>
						<a href="<?php echo admin_url( 'customize.php' ); ?>" target="_blank"><?php esc_html_e( 'Click here to customize colors and main image', 'fortunato' ); ?></a>
					</td>
				</tr>
	
			</table>
			
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php esc_html_e( 'Save Options', 'fortunato' ); ?>" />
			</p>
			
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function fortunato_options_validate( $input ) {
	global $fortunato_theme_options;
	
	$se_options = get_option( 'fortunato_theme_options', $fortunato_theme_options );

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['hidesearch'] ) )
		$input['hidesearch'] = null;
		$input['hidesearch'] = ( $input['hidesearch'] == 1 ? 1 : 0 );
	if ( ! isset( $input['hideoverlay'] ) )
		$input['hideoverlay'] = null;
		$input['hideoverlay'] = ( $input['hideoverlay'] == 1 ? 1 : 0 );
		
	// Encode URLs
	if( isset( $se_options[ 'twitterurl' ] ) )
		$input['twitterurl'] = esc_url_raw( $input['twitterurl'] );
	if( isset( $se_options[ 'facebookurl' ] ) )
		$input['facebookurl'] = esc_url_raw( $input['facebookurl'] );
	if( isset( $se_options[ 'googleplusurl' ] ) )
		$input['googleplusurl'] = esc_url_raw( $input['googleplusurl'] );
	if( isset( $se_options[ 'linkedinurl' ] ) )
		$input['linkedinurl'] = esc_url_raw( $input['linkedinurl'] );
	if( isset( $se_options[ 'instagramurl' ] ) )
		$input['instagramurl'] = esc_url_raw( $input['instagramurl'] );
	if( isset( $se_options[ 'youtubeurl' ] ) )
		$input['youtubeurl'] = esc_url_raw( $input['youtubeurl'] );
	if( isset( $se_options[ 'pinteresturl' ] ) )
		$input['pinteresturl'] = esc_url_raw( $input['pinteresturl'] );
	if( isset( $se_options[ 'tumblrurl' ] ) )
		$input['tumblrurl'] = esc_url_raw( $input['tumblrurl'] );
	if( isset( $se_options[ 'vkurl' ] ) )
		$input['vkurl'] = esc_url_raw( $input['vkurl'] );

	return $input;
}

endif;  // EndIf is_admin()
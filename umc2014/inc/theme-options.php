<?php
if ( !class_exists('UtahThemeOptions') )
{
	/** unews options */
	class UtahThemeOptions
	{


		/**
		 * Outputs IE (old/weak browser) styles to admin header
		 */
		public function theme_ie_styles()
		{
			// nothing here
		}
		/**
		 * Return theme options
		 */
		public function getOptions()
		{
			$options = get_option('utah_theme_options');

			if (!is_array($options))
			{
				// general options
				$options['template_width'] = '';
				$options['author_showcat'] = 'Yes';
				$options['author_showpost'] = 'Yes';

				// social / feeds
				$options['facebook_url'] = 'http://www.facebook.com/universityofutah';
				$options['twitter_url'] = 'http://twitter.com/uutah';
				$options['youtube_url'] = 'http://youtube.com/theuniversityofutah';
				
				// header options
				$options['header_background_image'] = '';
				
				// footer options
				$options['department_logo'] = '/wp-content/themes/umc2014/images/global/imagine_u.png';
				$options['department_address'] = '201 Presidents Circle Room 201';
				$options['department_address2'] = 'SLC UT 84112';
				$options['department_phone'] = '801.581.7200';
				$options['google_analytics'] = '';

				update_option('utah_theme_options', $options);
			}
			else
			{
				$defaults = array (
					'template_width' => '',
					'author_showcat' => 'Yes',
					'author_showpost' => 'Yes',

					'facebook_url' => 'http://www.facebook.com/universityofutah',
					'twitter_url' => 'http://twitter.com/uutah',
					'youtube_url' => 'http://youtube.com/theuniversityofutah',
					
					// header options
					'header_background_image' => '',
					
					// footer options
					'department_logo' => '/wp-content/themes/umc2014/images/global/imagine_u.png',
					'department_address' => '201 Presidents Circle Room 201',
					'department_address2' => 'SLC UT 84112',
					'department_phone' => '801.581.7200',
					'google_analytics' => '',

				);
				$options = array_merge($defaults, $options);
			}

			return $options;
		}

		/**
		 * Add theme options to the DB, and the menu to admin screen
		 */
		public function add()
		{
			if(isset($_POST['utah_theme_save']))
			{
				$options = UtahThemeOptions::getOptions();

				// general options
				$options['template_width'] = filter_var(stripslashes($_POST['template_width']), FILTER_SANITIZE_URL);
				$options['author_showcat'] = filter_var(stripslashes($_POST['author_showcat']), FILTER_SANITIZE_STRING);
				$options['author_showpost'] = filter_var(stripslashes($_POST['author_showpost']), FILTER_SANITIZE_STRING);

				// social / feeds
				$options['facebook_url'] = filter_var(stripslashes($_POST['facebook_url']), FILTER_SANITIZE_URL);
				$options['twitter_url'] = filter_var(stripslashes($_POST['twitter_url']), FILTER_SANITIZE_URL);
				$options['youtube_url'] = filter_var(stripslashes($_POST['youtube_url']), FILTER_SANITIZE_URL);
				
				// header options
				$options['header_background_image'] = filter_var(stripslashes($_POST['header_background_image']), FILTER_SANITIZE_STRING);
				
				// footer options
				$options['department_logo'] = filter_var(stripslashes($_POST['department_logo']), FILTER_SANITIZE_STRING);
				$options['department_address'] = filter_var(stripslashes($_POST['department_address']), FILTER_SANITIZE_STRING);
				$options['department_address2'] = filter_var(stripslashes($_POST['department_address2']), FILTER_SANITIZE_STRING);
				$options['department_phone'] = filter_var(stripslashes($_POST['department_phone']), FILTER_SANITIZE_STRING);
				$options['google_analytics'] = filter_var(stripslashes($_POST['google_analytics']), FILTER_SANITIZE_STRING);

				// save
				update_option('utah_theme_options', $options);

			}
			else
			{
				UtahThemeOptions::getOptions();
			}

			add_theme_page(__('Current Theme Options', THEME_L10N_NAME),
										 __('Current Theme Options', THEME_L10N_NAME),
										 'edit_themes',
										 basename(__FILE__),
										 array('UtahThemeOptions', 'display'));
		}

		/**
		 * Show the theme options form
		 */
		public function display()
		{
			$options = UtahThemeOptions::getOptions();
			//echo '<pre>'.print_r($options,true).'</pre>';
			//$cpt = get_post_types(array('_builtin'=>false), 'objects');
			//echo '<pre>types: '.print_r($cpt,true).'</pre>';
?>
	<form action="#" method="post" enctype="multipart/form-data" name="utah_theme_form" id="utah_theme_form">
		<?php wp_nonce_field(basename(__FILE__), 'utah_theme_options_noncename'); ?>
		<div class="wrap">
			<h2><?php _e('Theme Options', THEME_L10N_NAME); ?></h2>
			<div id="theme_option_tabs">
				<ul>
					<li><a href="#utah_general_options"><?php _e('General Options', THEME_L10N_NAME); ?></a></li>
					<li><a href="#utah_university_header"><?php _e('University Header', THEME_L10N_NAME); ?></a></li>
					<li><a href="#utah_university_footer"><?php _e('University Footer', THEME_L10N_NAME); ?></a></li>
					<li><a href="#utah_social"><?php _e('Social and Feeds', THEME_L10N_NAME); ?></a></li>
				</ul>

				<div id="utah_general_options">
					<h3><?php _e('General Options', THEME_L10N_NAME); ?></h3>
					<table class="form-table">
						<tbody>
							<tr>
								<td width="20%" valign="top">
									<?php _e('Template Width:', THEME_L10N_NAME); ?>
								</td>
								<td valign="top">

									<input type="radio" name="template_width" value="full-width" <?php if ($options['template_width'] == 'full-width') { echo 'checked'; } ?> /> Full browser width (recommended)<br />
									<input type="radio" name="template_width" value="ten-twenty-four" <?php if ($options['template_width'] == 'ten-twenty-four') { echo 'checked'; } ?> /> 1024 pixel width <br />
									
									
									<!--<input type="text" name="template_width" id="template_width"
												 class="code" size="5" value="<?php echo($options['template_width']); ?>" />
									<?php _e('pixels', THEME_L10N_NAME); ?>-->
								</td>
							</tr>
							<tr>
								<td width="20%" valign="top">
									<?php _e('Show author name in category:', THEME_L10N_NAME); ?>
								</td>
								<td valign="top">
									<select name="author_showcat">
									  <option value="Yes" <?php if ($options['author_showcat'] == 'Yes') { echo 'selected'; } ?>>Yes</option>
									  <option value="No" <?php if ($options['author_showcat'] == 'No') { echo 'selected'; } ?>>No</option>
									</select>
								</td>
							</tr>

							<tr>
								<td width="20%" valign="top">
									<?php _e('Show author name in post:', THEME_L10N_NAME); ?>
								</td>
								<td valign="top">
									<select name="author_showpost">
									  <option value="Yes" <?php if ($options['author_showpost'] == 'Yes') { echo 'selected'; } ?>>Yes</option>
									  <option value="No" <?php if ($options['author_showpost'] == 'No') { echo 'selected'; } ?>>No</option>
									</select>
								</td>
							</tr>
						</tbody>
					</table>
				</div><!-- end #utah_general_options -->

				<div id="utah_university_header">
					<h3><?php _e('University Header', THEME_L10N_NAME); ?></h3>
					<table class="form-table">
						<tbody>
							<tr>
								<td valign="top">
									<?php _e('Select Background:', THEME_L10N_NAME); ?>
								</td>
								<td valign="top">

<?php
									// loop over headers directory
									$uri = get_stylesheet_directory_uri().'/images/headers/';
									$dir = get_theme_root().'/'.get_template().'/images/headers/';
									echo 'URI = ' . $uri;
									echo '<br />DIR = ' . $dir;
									if ( $dh = opendir($dir) )
									{
										while ( ($file = readdir($dh)) !== false )
										{
											if ( preg_match('/^(\w+)_background.jpg$/', $file, $matches) )
											{
												$sel = '';
												$color = $matches[1];
												if ( (empty($options['header_background_image']) && $color=='red')
														|| ($color==$options['header_background_image']) )
												{
													$sel = ' checked="checked"';
												}
												echo '<div class="headerBackgroundSelector">'
													.'<input type="radio" id="hbcr'.$color.'" name="header_background_image" '
														.'value="'.$color.'" '.$sel.'/>'
													.'<label for="hbcr'.$color.'">'
														.'<img src="'.$uri.$color.'_background.jpg" alt="'.ucwords($color).' Background" width="800" />'
													.'</label>'
												."</div>\n";
											}
										}
									}
?>
								</td>
							</tr>
							<tr><td colspan="2">&nbsp;</td></tr>


						</tbody>
					</table>
				</div><!-- end #utah_university_footer -->

				<div id="utah_university_footer">
					<h3><?php _e('University Footer', THEME_L10N_NAME); ?></h3>
					<table class="form-table">
						<tbody>
							<tr>
								<td valign="top" width="20%">
									<?php _e('Department Logo:', THEME_L10N_NAME); ?>
								</td>
								<td valign="top">
									<input type="text" name="department_logo" id="department_logo" class="code" style="width:98%;" value="<?php echo($options['department_logo']); ?>" />
								</td>
							</tr>

							<tr>
								<td valign="top" width="20%">
									<?php _e('Department Address Line 1:', THEME_L10N_NAME); ?>
								</td>
								<td valign="top">
									<input type="text" name="department_address" id="department_address" class="code" style="width:98%;" value="<?php echo($options['department_address']); ?>" />
								</td>
							</tr>

							<tr>
								<td valign="top">
									<?php _e('Department Address Line 2:', THEME_L10N_NAME); ?>
								</td>
								<td valign="top">
									<input type="text" name="department_address2" id="department_address2" class="code" style="width:98%;" value="<?php echo($options['department_address2']); ?>" />
								</td>
							</tr>

							<tr>
								<td valign="top">
									<?php _e('Department Phone:', THEME_L10N_NAME); ?>
								</td>
								<td valign="top">
									<input type="text" name="department_phone" id="department_phone" class="code" size="30" maxlength="30" value="<?php echo($options['department_phone']); ?>" />
								</td>
							</tr>

							<tr>
								<td valign="top">
									<?php _e('Google Analytics UA Code:', THEME_L10N_NAME); ?>
								</td>
								<td valign="top">
									<input type="text" name="google_analytics" id="google_analytics" class="code" size="30" maxlength="30" value="<?php echo($options['google_analytics']); ?>" />
								</td>
							</tr>
						</tbody>
					</table>
				</div><!-- end #utah_university_footer -->

				<div id="utah_social">
					<h3><?php _e('Social and Feeds', THEME_L10N_NAME); ?></h3>
					<table class="form-table">
						<tbody>
							<tr>
								<td width="20%" valign="top">
									<?php _e('Your Facebook Page URL:', THEME_L10N_NAME); ?>
								</td>
								<td valign="top">
									<input type="text" name="facebook_url" id="facebook_url"
												 class="code" style="width:98%;" value="<?php echo($options['facebook_url']); ?>" />
								</td>
							</tr>

							<tr>
								<td width="20%" valign="top">
									<?php _e('Your Twitter URL:', THEME_L10N_NAME); ?>
								</td>
								<td valign="top">
									<input type="text" name="twitter_url" id="twitter_url"
												 class="code" style="width:98%;" value="<?php echo($options['twitter_url']); ?>" />
								</td>
							</tr>

							<tr>
								<td width="20%" valign="top">
									<?php _e('Youtube Channel URL:', THEME_L10N_NAME); ?>
								</td>
								<td valign="top">
									<input type="text" name="youtube_url" id="youtube_url"
												 class="code" style="width:98%;" value="<?php echo($options['youtube_url']); ?>" />
								</td>
							</tr>

							
						</tbody>
					</table>
				</div><!-- end #utah_social -->

			</div><!-- end tabs -->

			<p class="submit">
				<input class="button-primary" type="submit" name="utah_theme_save" value="<?php _e('Save Changes', THEME_L10N_NAME); ?>" />
			</p>
		</div>
	</form>
	<?php
		}

		/**
		 * Respond to ajax call to clear SimplePie cache
		 */
		public function utah_ajax_clear_simplepie_cache()
		{
			$themeOptions = UtahThemeOptions::getOptions();
			$cachedir = $themeOptions['simplepie_cache_dir'];
			$errMsgs = array();
			$dh = opendir($cachedir);
			while ( ($file = readdir($dh)) !== false )
			{
				if ( substr($file, -4) == '.spc' )
				{
					$retVal = @unlink($cachedir.'/'.$file);
					if ( !$retVal )
						$errMsgs[] = sprintf(__('Could not delete file: %s', THEME_L10N_NAME), $file);
				}
				//else
				//	echo $file.' - '.substr($file, -4).'<br/>';
			}

			// done
			$resp = array
			(
				'code' => (count($errMsgs)?__LINE__:0),
				'msg' => (count($errMsgs)?$errMsgs:__('Success!', THEME_L10N_NAME)),
			);

			die(json_encode($resp));

		}// end function function utah_ajax_add_custom_type

	}// end class UtahThemeOptions
}// end if !exists
add_action('admin_menu', array('UtahThemeOptions', 'add'));
add_action('admin_head', array('UtahThemeOptions', 'theme_ie_styles'));
add_action('wp_ajax_utah_ajax_clear_simplepie_cache', array('UtahThemeOptions', 'utah_ajax_clear_simplepie_cache'));

?>
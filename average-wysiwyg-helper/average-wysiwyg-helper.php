<?php
/*
    Plugin Name: Average WYSIWYG Helper
    Plugin URI: 
    Description: Reveals the prominent HTML elements in the default WYSIWYG editor (TinyMCE) comprehensively, while maintaining edibility as well as any theme styles (in most cases). In effect, you have a WYSIWYG and a WYSIWYM (What You See Is What You Mean) combined. Can also cancel out certain default WordPress styling in the WYSIWYG such as the captions box/border.
    Version: 1.0
    Author: Joe Rhoney
    Author URI: http://joerhoney.com/
    @since 3.8
        ___                                 
       /   |_   _____  _________ _____ ____
      / /| | | / / _ \/ ___/ __ `/ __ `/ _ \
     / ___ | |/ /  __/ /  / /_/ / /_/ /  __/
    /_/  |_|___/\___/_/   \__,_/\__, /\___/
                               /____/     ™
                               by Joe Rhoney
*/



/*
  SETTINGS PAGE
	=============
*/

if(!class_exists('avrgwysiwyg_class')) :
  define('avrgwysiwyg_ID', 'avrgwysiwyg');
  define('avrgwysiwyg_NICK', 'WYSIWYG Helper');
  class avrgwysiwyg_class
  {
		public static function file_path($file)
		{
			return ABSPATH.'wp-content/plugins/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)).$file;
		}
		public static function register()
		{
			register_setting(avrgwysiwyg_ID.'_options', 'wysiwym_display');
			register_setting(avrgwysiwyg_ID.'_options', 'cancel_mce_defaults');
		}
		public static function menu()
		{
			add_options_page(avrgwysiwyg_NICK.' Plugin Options', avrgwysiwyg_NICK, 'manage_options', avrgwysiwyg_ID.'_options', array('avrgwysiwyg_class', 'options_page'));
		}
		public static function options_page()
		{ 
			if (!current_user_can('manage_options')) 
			{
				wp_die(__('You do not have sufficient permissions to access this page.'));
			}
			$avrgwysiwygID = avrgwysiwyg_ID;
			include(self::file_path('options.php'));
		}
		public static function css( $mce_css ) {
			$wysiwym_display = get_option('wysiwym_display');
			if ($wysiwym_display == 1) {
        if (!empty($mce_css)) $mce_css .= ',';
        $mce_css .= plugins_url( 'wysiwym.css', __FILE__ );
			}
			$cancel_mce_defaults = get_option('cancel_mce_defaults');
			if ($cancel_mce_defaults == 1) {
        if (!empty($mce_css)) $mce_css .= ',';
        $mce_css .= plugins_url( 'overrides.css', __FILE__ );
			}
      return $mce_css;
    }
  }
	if (is_admin())
	{
		add_action('admin_init', array('avrgwysiwyg_class', 'register'));
		add_action('admin_menu', array('avrgwysiwyg_class', 'menu'));
	}
  add_filter( 'mce_css', array('avrgwysiwyg_class', 'css'));

endif;


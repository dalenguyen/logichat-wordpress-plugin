<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Logichat
 * @subpackage Logichat/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Logichat
 * @subpackage Logichat/public
 * @author     Your Name <email@example.com>
 */
class Logichat_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Logichat settings
	 * 
	 * @since 1.0.0
	 * @access private
	 * @var array	$options the current settings of the plugin
	 */
	private $options;


	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->options = get_option($this->plugin_name . '-settings');

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Logichat_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Logichat_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		if ($this->options && isset($this->options['app-id'])) {

			$logichat_app_id = $this->options['app-id'];
			wp_register_script($this->plugin_name . '-widget', 'https://sdk.logichat.io/js/widget.js?appId=' . $logichat_app_id, array(), $this->version, true);
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/logichat-public.js', array($this->plugin_name . '-widget'), $this->version, true );

		} else {
			error_log('Logichat APP_ID is undefined!');
		}

	}

}

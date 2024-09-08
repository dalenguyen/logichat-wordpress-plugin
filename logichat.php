<?php
/**
 * Plugin Name:     Logichat
 * Plugin URI:      https://logichat.io
 * Description:     AI knowledge chat for your WordPress website.
 * Author:          Dale Nguyen
 * Author URI:      https://dalenguyen.me
 * Text Domain:     logichat
 * License:         GPL-2.0+
 * Domain Path:     /languages
 * Version:         1.0.1
 *
 * @package         Logichat
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'LOGICHAT_VERSION', '1.0.1' );


/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-logichat.php';

/**
 * Begins execution of the logichat plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_logichat() {
	$plugin = new Logichat();
	$plugin->run();
}

run_logichat();



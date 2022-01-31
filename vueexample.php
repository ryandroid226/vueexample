<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://ryanholt.dev
 * @since             1.0.0
 * @package           Vueexample
 *
 * @wordpress-plugin
 * Plugin Name:       VueExample
 * Plugin URI:        https://ryanholt.dev
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Ryan Holt
 * Author URI:        https://ryanholt.dev
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       vueexample
 * Domain Path:       /languages
 */
require_once __DIR__ . '/vendor/autoload.php';

use VueExample\Lib\Activator;
use VueExample\Lib\Deactivator;
use VueExample\Lib\Bootstrap;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'VUEEXAMPLE_VERSION', '1.0.0' );

class VueExample
{
	public function run(): void
	{
		$plugin = new Bootstrap();
		$plugin->run();
	}

	public function activate(): void
	{
		Activator::activate();
	}

	public function deactivate(): void
	{
		Deactivator::deactivate();
	}
}

$vueExample = new VueExample();

register_activation_hook( __FILE__, array($vueExample, 'activate') );
register_deactivation_hook( __FILE__, array($vueExample, 'deactivate') );


$vueExample->run();

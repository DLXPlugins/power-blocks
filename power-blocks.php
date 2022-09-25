<?php
/**
 * Plugin Name:       Power Blocks (sample plugin)
 * Plugin URI:        https://github.com/DLXPlugins/power-blocks
 * Description:       A plugin demonstrating a PSR-4 structure.
 * Version:           1.0.0
 * Requires at least: 5.9
 * Requires PHP:      7.2
 * Author:            DLX Plugins
 * Author URI:        https://dlxplugins.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       power-blocks
 * Domain Path:       /languages
 *
 * @package PowerBlocks
 */

namespace DLXPlugins\PowerBlocks;

define( 'POWER_BLOCKS_VERSION', '1.0.0' );
define( 'POWER_BLOCKS_FILE', __FILE__ );

// Support for site-level autoloading.
if ( file_exists( __DIR__ . '/lib/autoload.php' ) ) {
	require_once __DIR__ . '/lib/autoload.php';
}

/**
 * PowerBlocks class.
 */
class PowerBlocks {

	/**
	 * Holds the class instance.
	 *
	 * @var PowerBlocks $instance
	 */
	private static $instance = null;

	/**
	 * Return an instance of the class
	 *
	 * Return an instance of the PowerBlocks Class.
	 *
	 * @since 1.0.0
	 *
	 * @return PowerBlocks class instance.
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Class initializer.
	 */
	public function plugins_loaded() {
		load_plugin_textdomain(
			'power-blocks',
			false,
			basename( dirname( __FILE__ ) ) . '/languages'
		);

		// Register the admin menu.
		Admin\Register_Menu::run();
		Admin\Settings_Links::run();

		// Run plugin setup code here.

		add_action( 'init', array( $this, 'init' ) );
	}

	/**
	 * Init all the things.
	 */
	public function init() {
		// Run plugin init code here.
	}
}

add_action(
	'plugins_loaded',
	function() {
		$power_blocks = PowerBlocks::get_instance();
		$power_blocks->plugins_loaded();
	}
);

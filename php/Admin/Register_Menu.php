<?php
/**
 * Initialize the admin menu.
 *
 * @package PowerBlocks
 */

namespace DLXPlugins\PowerBlocks\Admin;

use DLXPlugins\PowerBlocks\Functions as Functions;

/**
 * Create the admin menu.
 */
class Register_Menu {

	/**
	 * Main class runner.
	 */
	public static function run() {
		add_action( 'admin_menu', array( static::class, 'init_menu' ) );
	}

	/**
	 * Register the plugin menu.
	 */
	public static function init_menu() {

		add_options_page(
			__( 'Power Blocks', 'power-blocks' ),
			__( 'Power Blocks', 'power-blocks' ),
			'manage_options',
			Functions::get_plugin_slug(),
			array( '\DLXPlugins\PowerBlocks\Admin\Settings', 'settings_page' ),
			100
		);
	}
}

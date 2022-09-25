<?php
/**
 * Add settings links to the plugin screen.
 *
 * @package PowerBlocks
 */

namespace DLXPlugins\PowerBlocks\Admin;

use DLXPlugins\PowerBlocks\Functions as Functions;

/**
 * Add settings links to the plugin screen.
 */
class Settings_Links {

	/**
	 * Main class runner.
	 */
	public static function run() {
		add_filter(
			'plugin_action_links_' . Functions::get_plugin_file(),
			array( static::class, 'add_settings_link' )
		);
	}

	/**
	 * Add a settings link to the plugin's options.
	 *
	 * Add a settings link on the WordPress plugin's page.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @see run
	 *
	 * @param array $links Array of plugin options.
	 * @return array $links Array of plugin options
	 */
	public static function add_settings_link( $links ) {
		$settings_url = admin_url( 'options-general.php?page=power-blocks' );
		$docs_url     = 'https://docs.dlxplugins.com/';
		$site_url     = 'https://dlxplugins.com';
		if ( current_user_can( 'manage_options' ) ) {
			$options_link = sprintf( '<a href="%s">%s</a>', esc_url( $settings_url ), _x( 'Settings', 'Options link', 'power-blocks' ) );
			array_unshift( $links, $options_link );
			$docs_link = sprintf( '<a href="%s">%s</a>', esc_url( $docs_url ), _x( 'Docs', 'Plugin documentation', 'power-blocks' ) );
			$site_link = sprintf( '<a href="%s">%s</a>', esc_url( $site_url ), _x( 'DLXPlugins', 'Plugin site', 'power-blocks' ) );
			$links[]   = $docs_link;
			$links[]   = $site_link;
		}
		return $links;
	}
}

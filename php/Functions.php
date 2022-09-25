<?php
/**
 * Helper functions for the plugin.
 *
 * @package PowerBlocks
 */

namespace DLXPlugins\PowerBlocks;

/**
 * Class Functions
 */
class Functions {

	/**
	 * Return the plugin slug.
	 *
	 * @return string plugin slug.
	 */
	public static function get_plugin_slug() {
		return dirname( plugin_basename( POWER_BLOCKS_FILE ) );
	}

	/**
	 * Return the basefile for the plugin.
	 *
	 * @return string base file for the plugin.
	 */
	public static function get_plugin_file() {
		return plugin_basename( POWER_BLOCKS_FILE );
	}

	/**
	 * Return the version for the plugin.
	 *
	 * @return float version for the plugin.
	 */
	public static function get_plugin_version() {
		return POWER_BLOCKS_VERSION;
	}
}


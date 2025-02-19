<?php
/*
 * Plugin Name: Seriously Simple Stats (ICTU WP corrections)
 * Version: 1.3.1-beta
 * Plugin URI: https://wordpress.org/plugins/seriously-simple-stats
 * Description: Integrated analytics and stats tracking for Seriously Simple Podcasting.
 * Author: Castos
 * Author URI: https://www.castos.com/
 * Requires at least: 4.4
 * Tested up to: 5.5
 *
 * Text Domain: seriously-simple-stats
 * Domain Path: /languages
 *
 * @package WordPress
 * @author Hugh Lashbrooke
 * @since 1.0.0
 *
 * @author Castos
 * @since 1.2.0
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use SeriouslySimpleStats\Classes\Stats;

// ICTU [1/2]: Applied fix from 
// https://github.com/CastosHQ/Seriously-Simple-Stats/pull/57
// require_once 'vendor/autoload.php';

define( 'SSP_STATS_VERSION', '1.3.0' );
define( 'SSP_STATS_DIR_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );

// ICTU [2/2]: Applied fix from 
// https://github.com/CastosHQ/Seriously-Simple-Stats/pull/57
require_once SSP_STATS_DIR_PATH . 'vendor/autoload.php';

if ( ! function_exists( 'is_ssp_active' ) ) {
	// ICTU: Applied fix from 
	// https://github.com/CastosHQ/Seriously-Simple-Stats/pull/91
	// require_once 'ssp-includes/ssp-functions.php';
	require_once SSP_STATS_DIR_PATH . 'ssp-includes/ssp-functions.php';
}

if ( is_ssp_active( '1.13.1' ) ) {

	/**
	 * Returns the main instance of SSP_Stats to prevent the need to use globals.
	 *
	 * @return Object Stats
	 * @since  1.0.0
	 */
	function SSP_Stats() {
		$ssp_stats = Stats::instance( __FILE__, SSP_STATS_VERSION, '1.0.0' );

		return $ssp_stats;
	}

	SSP_Stats();

}

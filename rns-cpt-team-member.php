<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           RNS_CPT_Team_Member
 *
 * @wordpress-plugin
 * Plugin Name:       RNS Team Member
 * Plugin URI:        http://example.com/rns-cpt-team-member/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Anurag Singh
 * Author URI:        http://anuragsingh.me/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rns-cpt-team-member
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-rns-cpt-team-member-activator.php
 */
function activate_rns_cpt_team_member() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rns-cpt-team-member-activator.php';
	RNS_CPT_Team_Member_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-rns-cpt-team-member-deactivator.php
 */
function deactivate_rns_cpt_team_member() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rns-cpt-team-member-deactivator.php';
	RNS_CPT_Team_Member_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_rns_cpt_team_member' );
register_deactivation_hook( __FILE__, 'deactivate_rns_cpt_team_member' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-rns-cpt-team-member.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_rns_cpt_team_member() {

	$plugin = new RNS_CPT_Team_Member();
	$plugin->run();

}
run_rns_cpt_team_member();

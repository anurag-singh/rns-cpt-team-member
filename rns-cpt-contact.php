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
 * @package           RNS_CPT_Contact
 *
 * @wordpress-plugin
 * Plugin Name:       RNS CPT Contact
 * Plugin URI:        http://example.com/rns-cpt-contact/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Anurag Singh
 * Author URI:        http://anuragsingh.me/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rns-cpt-contact
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-rns-cpt-contact-activator.php
 */
function activate_rns_cpt_contact() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rns-cpt-contact-activator.php';
	RNS_CPT_Contact_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-rns-cpt-contact-deactivator.php
 */
function deactivate_rns_cpt_contact() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rns-cpt-contact-deactivator.php';
	RNS_CPT_Contact_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_rns_cpt_contact' );
register_deactivation_hook( __FILE__, 'deactivate_rns_cpt_contact' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-rns-cpt-contact.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_rns_cpt_contact() {

	$plugin = new RNS_CPT_Contact();
	$plugin->run();

}
run_rns_cpt_contact();

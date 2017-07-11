<?php
/*
Plugin Name: Sales Representatives
Description: This plugin lets you add Sales Rep information into a database. All data is then shown on the sales represenatives page on the website.
Version: 2.0
Author: Calum O'Donnell
Author URI: http://www.calumodonnell.co.uk
*/

$siteurl = get_option('siteurl');
define('SR_FOLDER', dirname(plugin_basename(__FILE__)));
define('SR_URL', $siteurl.'/wp-content/plugins/' . SR_FOLDER);
define('SR_FILE_PATH', dirname(__FILE__));
define('SR_DIR_NAME', basename(SR_FILE_PATH));

global $wpdb;

include('admin/includes/functions.php');

$sr_table_prefix = 'wp_sr_';

define('SR_TABLE_PREFIX', $sr_table_prefix);

register_activation_hook(__FILE__, 'sr_install');
register_deactivation_hook(__FILE__, 'sr_uninstall');

add_action('admin_menu', 'sr_admin_menu');
add_action('admin_init', 'sr_admin_load');
add_shortcode('sr-show-sales-reps', 'sr_show_reps');


function sr_install () {
	global $wpdb;

	// create new table for new locations
	$table_locations = SR_TABLE_PREFIX . "locations";
	$structure = "CREATE TABLE $table_locations (
		id INT (11) NOT NULL AUTO_INCREMENT
		name VARCHAR (255) NOT NULL,
		address_one VARCHAR (255) NOT NULL,
		address_two VARCHAR (255) NULL,
		address_three VARCHAR (255) NULL,
		city VARCHAR (255) NOT NULL,
		state VARCHAR (255) NULL,
		postcode VARCHAR (10) NULL,
		country VARCHAR (255) NOT NULL,
		phone VARCHAR (30) NULL,
		fax VARCHAR (30) NULL,
		mobile VARCHAR (30) NULL,
		email VARCHAR (130) NULL,
		website VARCHAR (130) NULL,
		contact_name VARCHAR (130) NULL,
		UNIQUE KEY id (id)
	);";
	$wpdb->query($structure);

	// create new table for additonal countries rep is based in
	$table_countries = SR_TABLE_PREFIX . "additional_countries";
	$structure = "CREATE TABLE $table_countries (
		id INT(11) NOT NULL AUTO_INCREMENT,
		location_id INT(11) NULL,
		country VARCHAR(130) NULL,
		UNIQUE KEY id (id)
	);";
	$wpdb->query($structure);

	// create new table for additional states rep is based in
	$table_states = SR_TABLE_PREFIX . "additional_states";
	$structure = "CREATE TABLE $table_states (
		id INT(11) NOT NULL AUTO_INCREMENT,
		location_id INT(11) NULL,
		state VARCHAR(130) NULL,
		UNIQUE KEY id (id)
	);";
	$wpdb->query($structure);
}


// Plugin uninstall
function sr_uninstall () {
	global $wpdb;

	$sql = "DROP TABLE " . SR_TABLE_PREFIX . "additional_countries";
	$wpdb->query($sql);

	$sql = "DROP TABLE " . SR_TABLE_PREFIX . "additional_states";
	$wpdb->query($sql);

	$sql = "DROP TABLE " . SR_TABLE_PREFIX . "locations";
	$wpdb->query($sql);
}


// create admin menu for wp admin
function sr_admin_menu() {
	$parent_slug = 'sales-representatives';

	add_menu_page("", "Sales Reps", 'read', $parent_slug, "sr_location_list", "dashicons-screenoptions", 81);
	add_submenu_page($parent_slug, 'Add New Rep', 'Add New Rep', 'read', 'add-location', 'sr_add_location');
}


// add custom css and javascript files
function sr_admin_load(){
	wp_enqueue_style( 'sr-styles',  SR_URL . '/admin/css/styles.css', '' );
	wp_enqueue_script( 'sr-custom',  SR_URL . '/admin/js/custom.js', '' );
}


function sr_show_reps(){
	sr_show_sales_representatives();
}


function sr_location_list(){
	include('admin/views/sales_rep_list.php');
}


function sr_add_location() {
	global $wpdb;

	if (!isset($_REQUEST['action'])) :
		include('admin/views/add_location.php');
	endif;

	if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'add') :
		sr_add_new_location();
	endif;

	if (isset($_REQUEST['edit']) && $_REQUEST['action'] == 'edit') :
		sr_edit_location();
	endif;

	if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit' && $_REQUEST['rep_id']) :
		include('admin/views/edit_location.php');
	endif;

	if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete' && $_REQUEST['action'] != 'edit') :
		sr_delete_location();
	endif;
}
?>

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
global $cw_db_version;

$cw_db_version = '1.0';

include('admin/includes/functions.php');

add_shortcode('sr-show-sales-reps', 'sr_show_reps');


function sr_admin_menu() {
	$parent_slug = 'sales-representatives';

	add_menu_page("", "Sales Reps", 'read', $parent_slug, "sr_location_list", "dashicons-screenoptions", 81);
	add_submenu_page($parent_slug, 'Add New Rep', 'Add New Rep', 'read', 'add-location', 'sr_add_location');
}
add_action('admin_menu', 'sr_admin_menu');


function sr_admin_load(){
	wp_enqueue_style( 'sr-styles',  SR_URL . '/admin/css/styles.css', '' );
	wp_enqueue_script( 'sr-custom',  SR_URL . '/admin/js/custom.js', '' );
}
add_action('admin_init', 'sr_admin_load');


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

<?php
    /*
    Plugin Name: MailPoet-SMS
    Plugin URI: http://egautier.eu/MPsms
    Description: Plugin to send sms from wordpress to your contacts throught MailPoet list
    Author: E. Gautier	
    Version: 1.0
    Author URI: http://www.egautier.fr
    */
?>


<?php 

/*Plugin Activation
-----------------------*/
register_activation_hook( __FILE__, 'MPsms_install' );

//creation of "tables" needed by the plugins
function MPsms_install() {
	global $wpdb;
 
  
// Because most of the wordpress installation has a different prefix, we have to concatene our table name with the prefix of the actual wordpress
$table_contacts= $wpdb->prefix . "MPsms_contacts";
$table_settings= $wpdb->prefix . "MPsms_settings";


$sql="
CREATE TABLE $table_settings (
	`id_s` int(11) NOT NULL,
	`settings` varchar(100) NOT NULL,
	`ID_Num` varchar(4) NOT NULL,
	PRIMARY KEY (`id_s`)
);

INSERT INTO $table_settings (`id_s`, `settings`,`ID_Num`) 
VALUES (1, 'http://192.168.0.102:9090/sendsms?phone=0', 'cf_1');

";

// Tables creation over


require_once( ABSPATH . 'wp-admin/includes/upgrade.php' ); dbDelta( $sql );
 }

//Set-up the position of our plugin menu in wordpress admin panel

add_action( 'admin_menu', 'MPsms_menu' );

function MPsms_menu() {
// $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position  
	add_menu_page( 'MP SMS', 'MP SMS', 'edit_published_posts', 'MPsms', 'MPsms_index' );
// $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function 
	add_submenu_page( 'MPsms', 'Contacts', 'Contacts', 'manage_options', 'MPsms_contacts', 'MPsms_contacts');
	add_submenu_page( 'MPsms', 'Settings', 'Settings', 'manage_options', 'MPsms_settings', 'MPsms_settings');
	add_submenu_page( 'MPsms', 'Sending page', 'Sending page', 'edit_published_posts', 'MPsms_send', 'MPsms_send');
}

function MPsms_index()
{
	require('MPsms_index.php');
}

function MPsms_contacts()
{
	require('MPsms_contacts.php');
}

function MPsms_send()
{
	require('MPsms_send.php');
}

function MPsms_settings()
{
	require('MPsms_settings.php');
}
?>






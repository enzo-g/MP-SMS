<div class="wrap">

<h2> SMS News </h2><br />
<h4>SMS sending</h4>

<a href="?page=MPsms">Go back to the writing sms page</a><br /><br />
<?php
global $wpdb;
$table_contacts= $wpdb->prefix . "wysija_user";
$table_candl= $wpdb->prefix . "wysija_user_list";
$table_settings= $wpdb->prefix . "MPsms_settings";
$idcolumnum= $wpdb->get_var( "SELECT $table_settings.`ID_Num` FROM $table_settings WHERE $table_settings.`id_s`=1");

// Get the IP set in the database
$url_ipPhone=$wpdb->get_var( "SELECT $table_settings.`settings` FROM $table_settings WHERE $table_settings.`id_s` =1");

if(isset($_POST['send'])){

$listselected=$_POST['idlist'];
// Get the numbers in the list selected
$resultlist = $wpdb->get_results("SELECT DISTINCT $table_contacts.$idcolumnum FROM $table_candl
LEFT JOIN $table_contacts ON $table_candl.`user_id` = $table_contacts.`user_id` 
WHERE $table_candl.`list_id`= $listselected AND $table_contacts.`status`=1  AND $table_contacts.$idcolumnum REGEXP '^[06|07]' AND $table_contacts.$idcolumnum REGEXP '^[0-9]+$'");

// Loop to send the message writed to the selected list
foreach ( $resultlist as $print )   {


$url_num=$print->$idcolumnum;
$url_t='&text=';
$url_text=$_POST['smstext'];
$url_text_str=str_replace(" ","%20",$url_text);
$url=$url_ipPhone.$url_num.$url_t.$url_text_str;
// getTheApp = request content of a webpage present on the phone > For the app on the phone its generating a message
$getTheApp = wp_remote_retrieve_body( wp_remote_get($url) );
$msg=$url_num.$getTheApp;
//Displaying msg => send the message
echo $msg;
}
}
?>

</div>

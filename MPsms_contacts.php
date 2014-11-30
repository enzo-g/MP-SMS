<?php
	global $wpdb;

	$table_contacts= $wpdb->prefix . "wysija_user";
	$table_lists= $wpdb->prefix . "wysija_list";
	$table_settings= $wpdb->prefix . "MPsms_settings";
	$idcolumnum= $wpdb->get_var( "SELECT $table_settings.`ID_Num` FROM $table_settings WHERE $table_settings.`id_s`=1");
	$contactswithnumber = $wpdb->get_results( "SELECT * FROM $table_contacts WHERE $table_contacts.$idcolumnum IS NOT NULL AND $table_contacts.`status`=1 AND $table_contacts.$idcolumnum REGEXP '^[06|07]' AND $table_contacts.$idcolumnum REGEXP '^[0-9]+$' ORDER BY `email` ASC ");
	$howmanynumber= $wpdb->get_var( "SELECT COUNT(*) FROM $table_contacts WHERE $table_contacts.$idcolumnum IS NOT NULL AND $table_contacts.`status`=1 AND $table_contacts.$idcolumnum REGEXP '^[06|07]' AND $table_contacts.$idcolumnum REGEXP '^[0-9]+$'");
?>


<div class="wrap">


 <?php    echo "<h2>" . __( 'SMS News' ) . "</h2>"; ?>
 <?php    echo "<h4>" . __( 'Contact List' ) . "</h4>"; ?>

<p><?php echo $howmanynumber;?> num&eacute;ros de t&eacute;l&eacute;phones ont &eacute;t&eacute; correctement renseign&eacute;s.</p>
	<table border=1>
	<tr>
	 
		<th>Email</td>
		<th>Number</td>
	</tr>
<?php 
foreach ( $contactswithnumber as $print )   {
?>
	<tr>
		<td><?php echo $print->email;?></td>
		<td><?php echo $print->cf_5;?></td>
	</tr>
<?php 
}
?>   
	</table>
<br />


</div>


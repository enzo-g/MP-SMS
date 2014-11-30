<div class="wrap">

<h2> SMS News </h2><br />
<h4>SMS sending</h4>
<?php
global $wpdb;

$table_settings= $wpdb->prefix . "MPsms_settings";
// get current IP present in the database
$ipphonec=$wpdb->get_var( "SELECT $table_settings.`settings` FROM $table_settings WHERE $table_settings.`id_s`=1");
$idnumberp=$wpdb->get_var( "SELECT $table_settings.`ID_Num` FROM $table_settings WHERE $table_settings.`id_s`=1");
$table_name = $wpdb->prefix . 'wysija_user';

?>



<?php    echo ("<h4>Set the url of the phone</h4>"); ?>
	<form name="ipphone_form" method="post" action="">
	<p><?php _e("URL: " ); ?><input type="text" name="ipphone" size="45" value="<?php echo $ipphonec; ?>" size="20"><?php _e(" ex: http://192.168.0.102:9090/sendsms?phone=0 " ); ?></p>
	<input type="submit" name="valider" value="Update" />
	</form>
<?php

$urlp=$_POST['ipphone'];

if(isset($_POST['valider'])){
// Update the ip of the phone in the database		
$wpdb->query($wpdb->prepare("UPDATE $table_settings SET settings=%s WHERE id_s=%s", $urlp, 1));
echo '<META HTTP-EQUIV="REFRESH" CONTENT="1">';
}
?>

<?php    echo ("<h4>Set the ID of the phone number column in the DB</h4>"); ?>
	<form name="IDnumber_form" method="post" action="">
	<p><?php _e("ID: " ); ?><input type="text" name="idnumber" size="45" value="<?php echo $idnumberp; ?>" size="20"><?php _e(" ex: cf_1 " ); ?></p>
	<input type="submit" name="ok" value="Update" />
	</form>
<?php

$idnumberphone=$_POST['idnumber'];

if(isset($_POST['ok'])){
// Update the ip of the phone in the database		
$wpdb->query($wpdb->prepare("UPDATE $table_settings SET ID_Num=%s WHERE id_s=%s", $idnumberphone, 1));
echo '<META HTTP-EQUIV="REFRESH" CONTENT="1">';
}
?>
<br />

<h4>To help you to find the ID of your phone number column, which should corredpond to cf_X, if the phone number column is the last cutom field created, X will be the higher number in the following list. </h4><br />

<table border=1>
	<tr>
		<th>wysija_user</td>
	</tr>
<?php
foreach ( $wpdb->get_col( "DESC " . $table_name, 0 ) as $column_name ) {
?>
	<tr>
		<td><?php echo $column_name ;?></td>
	</tr>
<?php } ?>
</table>

</div>

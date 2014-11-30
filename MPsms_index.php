<?php
	global $wpdb;

	$table_contacts= $wpdb->prefix . "wysija_user";
	$table_lists= $wpdb->prefix . "wysija_list";
	$result = $wpdb->get_results( "SELECT * FROM $table_lists ORDER BY $table_lists.list_id ASC");
?>

<div class="wrap">
	<h2>SMS News</h2>
	<h4>Send a message</h4>
	<br />
	<h4>Write a sms</h4>
	<form name="send" method="post" action="?page=MPsms_send">
	<?php _e("Liste: " ); ?><select name="idlist">
<?php foreach ( $result as $print )   { ?>
		  <option value="<?php echo $print->list_id;?>"><?php echo $print->name;?></option>
<?php }	?>
        </select></p>
	<p>Text:</p>
	<p><textarea maxlength=140 rows="10" name="smstext" value=""></textarea></p>
	<p><?php _e(" ex: Swimming-Pool closed today" ); ?></p>
	<input type="submit" name="send" value="Submit" />
</div>

<?php include 'header.php';?>


<style>
td {
	text-align: center;
}

th {
	background-color: #ccc;
}
</style>
<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "customer") {
	header ( "Location: index.php" );
}
?>

<?php
// get all information for the notifications
$notifications_query = "SELECT * FROM notifications WHERE user_id = $_SESSION[user_id]";
$notifications_result = mysql_query ( $notifications_query ) or die ( 'error : ' . mysql_error () );
?>

<h2>Your Notifications</h2>

<?php
// if there is no notification for the student
if (mysql_num_rows ( $notifications_result ) != 0) {
	?>
<table width="100%" align="center" cellpadding=5 cellspacing=5>
	<tr>
		<th>Content</th>
		<th>Date</th>
		<th>Action</th>
	</tr>
	<?php while ($notification_row = mysql_fetch_array($notifications_result)) { 
	// if the readed status == 1; change the bgcolor to
	if ($notification_row['readed'] == 0) {
		?>
	<tr style="font-weight: bold;">
		<td><?php echo $notification_row['content']?></td>
		<td><?php echo $notification_row['date']?></td>
		<td><a href="delete_notification.php?id=<?php echo $notification_row['id']?>">Delete</a>
		</td>
	</tr>
	<?php } else {?>
	<tr>
		<td><?php echo $notification_row['content']?></td>
		<td><?php echo $notification_row['date']?></td>
		<td><a href="delete_notification.php?id=<?php echo $notification_row['id']?>">Delete</a>
		</td>
	</tr>
	<?php }?>
	
	<?php }?>
</table>
<?php }?>

<?php 
// update the notification status to readed
mysql_query("UPDATE notifications SET readed = 1 WHERE user_id = $_SESSION[user_id]");

?>
<?php include 'footer.php';?>
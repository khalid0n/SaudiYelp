<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "customer") {
	header ( "Location: index.php" );
}
?>

<?php
// delete the notification
mysql_query ( "DELETE FROM notifications WHERE id = $_GET[id]" ) or die ( 'error ' . mysql_error () );

// if there is affected rows in the database;
if (mysql_affected_rows () == 1) {
	echo "<h3>Notification Has been deleted successfuly ....</h3>";
	
	// redirect to the details page for the added book with the last inserted id
	header ( "REFRESH:3; url=show_notifications.php" );
} else {
	echo "<h2>There is an error in deleting notification</h2>";
	header ( "REFRESH:3; url=show_notifications.php" );
}
?>

<?php include 'footer.php';?>
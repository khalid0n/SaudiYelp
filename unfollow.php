<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "customer") {
	header ( "Location: index.php" );
}
?>

<?php
// delete the notification
mysql_query ( "DELETE FROM follow WHERE user_id = $_GET[id] AND follow_id = $_SESSION[user_id]" ) or die ( 'error ' . mysql_error () );

// if there is affected rows in the database;
if (mysql_affected_rows () == 1) {
	echo "<script>alert('Susscffully unfollow .... ');</script>";
	
	// redirect to the details page for the added book with the last inserted id
	header ( "REFRESH:3; url=show_following.php" );
} else {
	echo "<script>alert('Error in unfollow .... ');</script>";
	header ( "REFRESH:3; url=show_following.php" );
}
?>

<?php include 'footer.php';?>
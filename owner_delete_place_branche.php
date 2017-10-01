<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "owner") {
	header ( "Location: index.php" );
}
?>

<?php
// delete the branche
mysql_query ( "DELETE FROM branche WHERE id = $_GET[id]" ) or die ( 'error ' . mysql_error () );

// if there is affected rows in the database;
if (mysql_affected_rows () == 1) {
	echo "<script>alert('successfully deleted ');</script>";
	
	// redirect to the details page for the added book with the last inserted id
	header ( "REFRESH:0; url=owner_manage_place_branches.php?id=$_GET[place_id]" );
} else {
	echo "<script>alert('Error While Delete');</script>";
	header ( "REFRESH:0; url=owner_manage_place_branches.php?id=$_GET[place_id]" );
}
?>

<?php include 'footer.php';?>
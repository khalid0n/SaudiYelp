<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "admin") {
	header ( "Location: index.php" );
}
?>

<?php
// delete the compliant
mysql_query ( "DELETE FROM compliant WHERE id = $_GET[id]" ) or die ( 'error ' . mysql_error () );

// if there is affected rows in the database;
if (mysql_affected_rows () == 1) {
	echo "<script>alert('successfully deleted ');</script>";
	
	// redirect to the details page for the added book with the last inserted id
	header ( "REFRESH:0; url=admin_manage_compliants.php" );
} else {
	echo "<script>alert('Error While Delete');</script>";
	header ( "REFRESH:0; url=admin_manage_compliants.php" );
}
?>

<?php include 'footer.php';?>
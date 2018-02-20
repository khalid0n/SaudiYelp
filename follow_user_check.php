<?php include 'header.php'; ?>
<?php

if (isset ( $_GET ['user_id'] )) {
	$user_id = $_GET ['user_id'];
	$follow_id = $_SESSION ['user_id'];
	
	// print_r($_POST);die ();
	
	$query = "INSERT INTO follow (user_id, follow_id) VALUES ($user_id, $follow_id)";
	
	$follow_result = mysql_query ( $query ) or die ( "Can't add this following " . mysql_error () );
	
	// if there is affected rows in the database;
	if ($follow_result) {
		echo "<script>alert('Thank you for following .... ');</script>";
		
		// redirect to the details page for the user
		header ( "REFRESH:0; url=show_user_details.php?id=" . $user_id );
	} else {
		echo "<script>alert('Error in rating.... ');</script>";
		
		// redirect to the details page for the user
		header ( "REFRESH:0; url=show_user_details.php?id=" . $user_id );
	}
}
?>

<?php include 'footer.php'; ?>
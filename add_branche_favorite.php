<?php include 'header.php'; ?>
<?php

if (isset ( $_GET ['branche'] )) {
	$branche_id = $_GET ['branche'];
	$user_id = $_SESSION ['user_id'];
	
	// print_r($_POST);die ();
	
	$query = "INSERT INTO favorite (branche_id, user_id) VALUES ($branche_id, $user_id)";
	
	$favorite_result = mysql_query ( $query ) or die ( "Can't add this favorite " . mysql_error () );
	
	// if there is affected rows in the database;
	if ($favorite_result) {
		echo "<script>alert('Thank you for adding to favorite .... ');</script>";
		
		// redirect to the details page for the branche
		header ( "REFRESH:0; url=show_branche_details.php?id=" . $branche_id );
	} else {
		echo "<script>alert('Error in adding to favorite .... ');</script>";
		
		// redirect to the details page for the branche
		header ( "REFRESH:0; url=show_branche_details.php?id=" . $branche_id );
	}
}
?>

<?php include 'footer.php'; ?>
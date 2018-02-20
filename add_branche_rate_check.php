<?php include 'header.php'; ?>
<?php

if (isset ( $_POST ['phprating'] )) {
	$branche_id = $_GET ['branche'];
	$result = $_POST ['phprating'];
	$user_id = $_SESSION['user_id'];
	
	// print_r($_POST);die ();
	
	$query = "INSERT INTO rating (branche_id, result, user_id) VALUES ($branche_id, $result, $user_id)";
	
	$vote_result = mysql_query ( $query ) or die ( "Can't add this rating " . mysql_error () );
	
	// if there is affected rows in the database;
	if ($vote_result) {
		echo "<script>alert('Thank you for rating .... ');</script>";
		
		// redirect to the details page for the branche
		header ( "REFRESH:0; url=show_branche_details.php?id=" . $branche_id );
	} else {
		echo "<script>alert('Error in rating.... ');</script>";
		
		// redirect to the details page for the branche
		header ( "REFRESH:0; url=show_branche_details.php?id=" . $branche_id );
	}
}
?>

<?php include 'footer.php'; ?>
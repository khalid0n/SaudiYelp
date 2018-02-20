<?php include 'header.php'; ?>
<?php

if (isset ( $_GET ['rate'] )) {
	$branche_id = $_GET ['branche'];
	$review_id = $_GET ['id'];
	$rate = $_GET ['rate'];
	$user_id = $_SESSION['user_id'];
	
// 	print_r($_GET);die ();
	
	if ($rate == "like") {
		$query = "INSERT INTO review_rating (review_id, likes, user_id) VALUES ($review_id, 1, $user_id)";
	} else {
		$query = "INSERT INTO review_rating (review_id, dislikes, user_id) VALUES ($review_id, 1, $user_id)";
	}
	
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
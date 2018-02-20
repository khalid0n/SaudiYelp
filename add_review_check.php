<?php include 'header.php';?>

<?php
if (isset ( $_POST ['submit'] )) {
	
	// echo "<pre>";
	// print_r ( $_POST );
	// echo "</pre>";
	
	// review vars
	$content = $_POST ['content'];
	$created = date ( 'Y-m-d' );
	$user_id = $_SESSION ['user_id'];
	$branche_id = $_GET ['branche'];

	// insert query for review
	$query = "INSERT INTO  review
		(content, created, user_id, branche_id)
		VALUES
		('$content', '$created', $user_id, $branche_id)";
	// echo $query;
	$review_result = mysql_query ( $query ) or die ( "Can't add this review" . mysql_error () );
	
	// if there is affected rows in the database;
	if ($review_result) {
		echo "<script>alert('Thank you for review .... ');</script>";
		
		// get all followers of this user to send notifications
		$followers = mysql_query ("SELECT * FROM follow WHERE user_id = $user_id") or die ("error " . mysql_error());
		
		while ($follow = mysql_fetch_array ($followers)) {
			$name = $_SESSION['user_name'];
			$branch_link = "<a href='show_branche_details.php?id=$branche_id'> Show Branche</a>";
			$follow_id =  $follow['follow_id'];
			
			mysql_query ('INSERT INTO notifications (content, user_id) VALUES ("new Comment has been added from your friend : ' . $name . ' on branche : ' . $branch_link . '",' . $follow_id . ')') or die ("error notifications " . mysql_error());
		}
		// redirect to the details page for the branche
		header ( "REFRESH:0; url=show_branche_details.php?id=" . $branche_id );
	} else {
		echo "<script>alert('Error in reviewing .... ');</script>";
		
		// redirect to the details page for the branche
		header ( "REFRESH:0; url=show_branche_details.php?id=" . $branche_id );
	}
}
?>
<?php include 'footer.php';?>
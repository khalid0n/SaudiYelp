<?php include 'header.php';?>

<?php
if (isset ( $_POST ['email'] )) {
	$email = mysql_real_escape_string ( $_POST ['email'] );
	$upass = mysql_real_escape_string ( $_POST ['password'] );
	$res = mysql_query ( "SELECT * FROM owners WHERE email='$email' AND password = '$upass'" );
	$row = mysql_fetch_array ( $res );
	
	if (mysql_num_rows ( $res ) == 1) {
		$_SESSION ['user_type'] = "owner";
		$_SESSION ['user_name'] = $row ['username'];
		$_SESSION ['user_id'] = $row ['id'];
		header ( "Location: index.php" );
	} else {
		$res = mysql_query ( "SELECT * FROM customers WHERE email='$email' AND password = '$upass'" );
		$row = mysql_fetch_array ( $res );
		
		if (mysql_num_rows ( $res ) == 1) {
			$_SESSION ['user_type'] = "customer";
			$_SESSION ['user_name'] = $row ['username'];
			$_SESSION ['user_id'] = $row ['id'];
			header ( "Location: index.php" );
		} else {
			$res = mysql_query ( "SELECT * FROM admin WHERE email='$email' AND password = '$upass'" );
			$row = mysql_fetch_array ( $res );
			
			if (mysql_num_rows ( $res ) == 1) {
				$_SESSION ['user_type'] = "admin";
				$_SESSION ['user_name'] = $row ['username'];
				$_SESSION ['user_id'] = $row ['id'];
				header ( "Location: index.php" );
			} else {
				?>
<script>alert('wrong details');</script>
<?php
				header ( "REFRESH:0; url=index.php" );
			}
		}
	}
}
?>
<?php include 'footer.php';?>
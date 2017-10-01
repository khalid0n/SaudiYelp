<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] == "") {
	header ( "Location: index.php" );
}

if (isset ( $_POST ['btn-add'] )) {
	// compliant vars
	$content = $_POST ['content'];
	$branch_id = $_GET['id'];
	$customer_id = $_SESSION['user_id'];
	
	if (mysql_query ( "INSERT INTO reservation (content, branche_id, customer_id) VALUES ('$content', $branch_id, $customer_id)" )) {
		echo "<script>alert('successfully reserve this branch');</script>";
	} else {
		echo "<script>alert('error while reserve this branch ...');</script>";
	}
}
?>

<h2>Make Reservation</h2>
<center>
	<div id="login-form">
		<form method="post">
			<table align="center" width="70%" border="0" id="form_table">
				<tr>
					<th>Content</th>
					<td><textarea rows="10" cols="10" name="content" required="required" class="form-control"></textarea></td>
				</tr>
				<tr align="center">
					<td align="center" colspan="2"><input type="submit" name="btn-add"
						value="Add Reservation"></td>
				</tr>
			</table>
		</form>
	</div>
</center>

<?php include 'footer.php'; ?>
<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "owner") {
	header ( "Location: index.php" );
}

if (isset ( $_POST ['btn-add'] )) {
	
	// place vars
	$name = $_POST ['name'];
	$price = $_POST ['price'];
	$type = $_POST ['type'];
	$user_id = $_SESSION ['user_id'];
	if (mysql_query ( "INSERT INTO place (name, price, type, user_id) VALUES ('$name', '$price', '$type', $user_id)" )) {
		echo "<script>alert('successfully adding the place ');</script>";
	} else {
		echo "<script>alert('error while adding the place ...');</script>";
	}
}
?>

<h2>Add New place</h2>
<center>
	<div id="login-form">
		<form method="post">
			<table align="center" width="50%" border="0" id="form_table">
				<tr>
					<th>Name</th>
					<td><input type="text" name="name" required="required" class="form-control"></td>
				</tr>
				<tr>
					<th>price</th>
					<td><select name="price" class="form-control">
							<option value="$">$</option>
							<option value="$$">$$</option>
							<option value="$$$">$$$</option>
							<option value="$$$$">$$$$</option>
							<option value="$$$$$">$$$$$</option>
					</select></td>
				</tr>
				<tr>
					<th>Type</th>
					<td><select name="type" class="form-control">
							<option value="Coffee">Coffee</option>
							<option value="Restaurant">Restaurant</option>
					</select></td>
				</tr>
				<tr align="center">
					<td align="center" colspan="2"><input type="submit" name="btn-add"
						value="Add place" class="btn btn-primary"></td>
				</tr>
			</table>
		</form>
	</div>
</center>

<?php include 'footer.php'; ?>
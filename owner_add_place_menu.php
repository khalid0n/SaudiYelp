<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "owner") {
	header ( "Location: index.php" );
}

if (isset ( $_POST ['btn-add'] )) {
	
	// menu vars
	$name = $_POST ['name'];
	$place_id = $_GET ['id'];
	if (mysql_query ( "INSERT INTO menu (name, place_id) VALUES ('$name', $place_id)" )) {
		echo "<script>alert('successfully adding the menu ');</script>";
	} else {
		echo "<script>alert('error while adding the menu ...');</script>";
	}
}
?>

<h2>Add New menu</h2>
<center>
	<div id="login-form">
		<form method="post">
			<table align="center" width="50%" border="0" id="form_table">
				<tr>
					<th>Name</th>
					<td><input type="text" name="name" required="required" class="form-control"></td>
				</tr>
				<tr align="center">
					<td align="center" colspan="2"><input type="submit" name="btn-add"
						value="Add menu" class="btn btn-primary"></td>
				</tr>
			</table>
		</form>
	</div>
</center>

<?php include 'footer.php'; ?>
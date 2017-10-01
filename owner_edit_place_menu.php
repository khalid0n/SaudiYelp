<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "owner") {
	header ( "Location: index.php" );
}
?>

<?php

if (isset ( $_POST ['btn-edit'] )) {
	// menu vars
	$name = $_POST ['name'];
	$id = $_POST ['id'];
	
	if (mysql_query ( "UPDATE menu SET name='$name'  WHERE id = $id" )) {
		echo "<script>alert('successfully update the menu');</script>";
	} else {
		echo "<script>alert('error while adding the menu ...');</script>";
	}
}

?>

<?php
// get menu information
$menu_query = mysql_query ( "SELECT * FROM menu WHERE id = $_GET[id]" );
$menu = mysql_fetch_array ( $menu_query );
?>


<h2>Edit menu</h2>
<center>
	<div id="login-form">
		<form method="post">
			<table align="center" width="50%" border="0" id="form_table">
				<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
				<tr>
					<th>Name</th>
					<td><input type="text" name="name" required="required"
						value="<?php echo $menu['name'];?>" class="form-control"></td>
				</tr>
				<tr align="center">
					<td align="center" colspan="2"><input type="submit" name="btn-edit"
						value="Edit menu" class="btn btn-primary"></td>
				</tr>
			</table>
		</form>
	</div>
</center>

<?php include 'footer.php'; ?>
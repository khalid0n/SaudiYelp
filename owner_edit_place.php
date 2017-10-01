<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "owner") {
	header ( "Location: index.php" );
}
?>

<?php

if (isset ( $_POST ['btn-edit'] )) {
	
	// place vars
	$name = $_POST ['name'];
	$price = $_POST ['price'];
	$type = $_POST ['type'];
	
	$id = $_POST ['id'];
	
	if (mysql_query ( "UPDATE place SET name='$name',type='$type',price='$price' WHERE id = $id" )) {
		echo "<script>alert('successfully update the place');</script>";
	} else {
		echo "<script>alert('error while adding the place ...');</script>";
	}
}

?>

<?php
// get place information
$place_query = mysql_query ( "SELECT * FROM place WHERE id = $_GET[id]" );
$place = mysql_fetch_array ( $place_query );
?>


<h2>Edit place</h2>
<center>
	<div id="login-form">
		<form method="post">
			<table align="center" width="50%" border="0" id="form_table">
				<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">

				<tr>
					<th>Name</th>
					<td><input type="text" name="name" required="required"
						value="<?php echo $place['name'];?>" class="form-control"></td>
				</tr>
				<tr>
					<th>price</th>
					<td><select name="price" class="form-control">
							<option value="$"
								<?php if($place['price'] == "$") echo "selected";?>>$</option>
							<option value="$$"
								<?php if($place['price'] == "$$") echo "selected";?>>$$</option>
							<option value="$$$"
								<?php if($place['price'] == "$$$") echo "selected";?>>$$$</option>
							<option value="$$$$"
								<?php if($place['price'] == "$$$$") echo "selected";?>>$$$$</option>
							<option value="$$$$$"
								<?php if($place['price'] == "$$$$$") echo "selected";?>>$$$$$</option>
					</select></td>
				</tr>
				<tr>
					<th>type</th>
					<td><select name="type" class="form-control">
							<option value="Coffee"
								<?php if ($place['type'] == "Coffee") echo "selected"?>>Coffee</option>
							<option value="Restaurant"
								<?php if ($place['type'] == "Restaurant") echo "selected"?>>Restaurant</option>
					</select></td>
				</tr>
				<tr align="center">
					<td align="center" colspan="2"><input type="submit" name="btn-edit"
						value="Edit place" class="btn btn-primary"></td>
				</tr>
			</table>
		</form>
	</div>
</center>

<?php include 'footer.php'; ?>
<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "owner") {
	header ( "Location: index.php" );
}

if (isset ( $_POST ['btn-add'] )) {
	
	// menu vars
	$name = $_POST ['name'];
	$price = $_POST ['price'];
	$calories = $_POST ['calories'];
	$ingredients = $_POST ['ingredients'];
	$menu_id = $_GET ['id'];
	$img = $_FILES ["img"] ["name"];
	
	// check for img type ( gif, jpg, jpeg, png )
	// and size less than 1 mb
	if ((($_FILES ["img"] ["type"] == "image/gif") || ($_FILES ["img"] ["type"] == "image/jpeg") || ($_FILES ["img"] ["type"] == "image/jpg") || ($_FILES ["img"] ["type"] == "image/png")) && ($_FILES ["img"] ["size"] < 1000000)) {
		// if there is an error in upload files
		if ($_FILES ["img"] ["error"] > 0) {
			echo "Error: " . $_FILES ["img"] ["error"] . "<br>";
		} else // there is no errors in uploading files
{
			// save the file in the img folder
			move_uploaded_file ( $_FILES ["img"] ["tmp_name"], "items/" . $_FILES ["img"] ["name"] );
			
			if (mysql_query ( "INSERT INTO item (name, price, calories, ingredients, img, menu_id) VALUES ('$name', $price, $calories, '$ingredients', '$img', $menu_id)" )) {
				echo "<script>alert('successfully adding the item ');</script>";
			} else {
				echo "<script>alert('error while adding the item ...');</script>";
			}
		}
	} else {
		echo "<script>alert('invalid file type ... try ( jpg, png, gif )');</script>";
	}
}
?>

<h2>Add New Item</h2>
<center>
	<div id="login-form">
		<form enctype="multipart/form-data" method="post">
			<table align="center" width="50%" border="0" id="form_table">
				<tr>
					<th>Name</th>
					<td><input type="text" name="name" required="required" class="form-control"></td>
				</tr>
				<tr>
					<th>price</th>
					<td><input type="number" name="price" required="required" min="1" class="form-control"></td>
				</tr>
				<tr>
					<th>Calories</th>
					<td><input type="number" name="calories" required="required"
						min="1" class="form-control"></td>
				</tr>
				<tr>
					<th>Ingredients</th>
					<td><input type="text" name="ingredients" required="required" class="form-control"></td>
				</tr>
				<tr>
					<th>Img</th>
					<td><input type="file" name="img" required="required"  class="form-control"/></td>
				</tr>
				<tr align="center">
					<td align="center" colspan="2"><input type="submit" name="btn-add"
						value="Add Item" class="btn btn-primary"></td>
				</tr>
			</table>
		</form>
	</div>
</center>

<?php include 'footer.php'; ?>
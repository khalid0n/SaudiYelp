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
	$price = $_POST ['price'];
	$calories = $_POST ['calories'];
	$ingredients = $_POST ['ingredients'];
	$img = $_FILES ["img"] ["name"];
	
	$id = $_POST ['id'];
	
	if ($img != "") {
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
				
				if (mysql_query ( "UPDATE item SET name='$name', price=$price, calories = $calories, ingredients = '$ingredients', img='$img' WHERE id = $id" )) {
					echo "<script>alert('successfully update the item');</script>";
				} else {
					echo "<script>alert('error while adding the item ...');</script>";
				}
			}
		} else {
			echo "<script>alert('invalid file type ... try ( jpg, png, gif )');</script>";
		}
	} else {
		if (mysql_query ( "UPDATE item SET name='$name', price=$price, calories = $calories, ingredients = '$ingredients' WHERE id = $id" )) {
			echo "<script>alert('successfully update the item');</script>";
		} else {
			echo "<script>alert('error while adding the item ...');</script>";
		}
	}
}

?>

<?php
// get menu information
$item_query = mysql_query ( "SELECT * FROM item WHERE id = $_GET[id]" );
$item = mysql_fetch_array ( $item_query );
?>


<h2>Edit Item</h2>
<center>
	<div id="login-form">
		<form enctype="multipart/form-data" method="post">
			<table align="center" width="50%" border="0" id="form_table">
				<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
				<tr>
					<td colspan="2" align="center"><img src="items/<?php echo $item['img'];?>"
						width="200" height="200"></td>
				</tr>
				<tr>
					<th>Name</th>
					<td><input type="text" name="name" required="required"
						value="<?php echo $item['name'];?>" class="form-control"></td>
				</tr>
				<tr>
					<th>price</th>
					<td><input type="number" name="price" required="required" min="1"
						value="<?php echo $item['price'];?>" class="form-control"></td>
				</tr>
				<tr>
					<th>Calories</th>
					<td><input type="number" name="calories" required="required"
						min="1" value="<?php echo $item['calories'];?>" class="form-control"></td>
				</tr>
				<tr>
					<th>Ingredients</th>
					<td><input type="text" name="ingredients" required="required"
						value="<?php echo $item['ingredients'];?>" class="form-control"></td>
				</tr>
				<tr>
					<th>Img</th>
					<td><input type="file" name="img"   class="form-control"/></td>
				</tr>
				<tr align="center">
					<td align="center" colspan="2"><input type="submit" name="btn-edit"
						value="Edit Item" class="btn btn-primary"></td>
				</tr>
			</table>
		</form>
	</div>
</center>

<?php include 'footer.php'; ?>
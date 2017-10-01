<?php include 'header.php';?>

<?php
// get areas names
$areas = mysql_query ( "SELECT * FROM area" );
?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "owner") {
	header ( "Location: index.php" );
}

if (isset ( $_POST ['btn-add'] )) {
	
	// branche vars
	$name = $_POST ['name'];
	$area_id = $_POST ['area_id'];
	$img = $_FILES ["img"] ["name"];
	$location = $_POST ['location'];
	$reservation = $_POST ['reservation'];
	$address = $_POST ['address'];
	$place_id = $_GET ['id'];
	
	// check for img type ( gif, jpg, jpeg, png )
	// and size less than 1 mb
	if ((($_FILES ["img"] ["type"] == "image/gif") || ($_FILES ["img"] ["type"] == "image/jpeg") || ($_FILES ["img"] ["type"] == "image/jpg") || ($_FILES ["img"] ["type"] == "image/png")) && ($_FILES ["img"] ["size"] < 1000000)) {
		// if there is an error in upload files
		if ($_FILES ["img"] ["error"] > 0) {
			echo "Error: " . $_FILES ["img"] ["error"] . "<br>";
		} else // there is no errors in uploading files
{
			// save the file in the img folder
			move_uploaded_file ( $_FILES ["img"] ["tmp_name"], "branches/" . $_FILES ["img"] ["name"] );
			
			if (mysql_query ( "INSERT INTO branche (name, img, location, address, reservation, area_id, place_id) VALUES ('$name', '$img', '$location', '$address', '$reservation', $area_id, $place_id)" )) {
				echo "<script>alert('successfully adding the branche ');</script>";
			} else {
				echo "<script>alert('error while adding the branche ...');</script>";
			}
		}
	} else {
		echo "<script>alert('invalid file type ... try ( jpg, png, gif )');</script>";
	}
}
?>

<h2>Add New branche</h2>
<center>
	<div id="login-form">
		<form enctype="multipart/form-data" method="post">
			<table align="center" width="50%" border="0" id="form_table">
				<tr>
					<th>Area</th>
					<td><select name="area_id" class="form-control">
						<?php while ($area = mysql_fetch_array($areas)) {?>
						<option value="<?php echo $area['id'];?>">
							<?php echo $area['name'];?>
						</option>
						<?php }?>
					</select></td>
				</tr>
				<tr>
					<th>Name</th>
					<td><input type="text" name="name" required="required" class="form-control"></td>
				</tr>
				<tr>
					<th>Reservation</th>
					<td><select name="reservation" class="form-control">
							<option value="Yes">Yes</option>
							<option value="No">No</option>
					</select></td>
				</tr>

				<tr>
					<th>Location</th>
					<td><input type="url" name="location" class="form-control"></td>
				</tr>
				<tr>
					<th>Address</th>
					<td><input type="text" name="address" class="form-control"></td>
				</tr>
				<tr>
					<th>Img</th>
					<td><input type="file" name="img" required="required"  class="form-control"/></td>
				</tr>
				<tr align="center">
					<td align="center" colspan="2"><input type="submit" name="btn-add"
						value="Add branche" class="btn btn-primary"></td>
				</tr>
			</table>
		</form>
	</div>
</center>

<?php include 'footer.php'; ?>
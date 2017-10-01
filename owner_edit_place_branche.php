<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "owner") {
	header ( "Location: index.php" );
}
?>

<?php

if (isset ( $_POST ['btn-edit'] )) {
	// branche vars
	$name = $_POST ['name'];
	$area_id = $_POST ['area_id'];
	$img = $_FILES ["img"] ["name"];
	$location = $_POST ['location'];
	$reservation = $_POST ['reservation'];
	$address = $_POST ['address'];
	$id = $_POST ['id'];
	
	if ($img == "") {
		if (mysql_query ( "UPDATE branche SET name='$name', location = '$location',  reservation = '$reservation', address='$address', area_id = $area_id WHERE id = $id" )) {
			echo "<script>alert('successfully update the branche');</script>";
		} else {
			echo "<script>alert('error while adding the branche ...');</script>";
		}
	} else {
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
				if (mysql_query ( "UPDATE branche SET name='$name', location = '$location',  reservation = '$reservation', address='$address', img = '$img', area_id = $area_id WHERE id = $id" )) {
					echo "<script>alert('successfully update the branche');</script>";
				} else {
					echo "<script>alert('error while adding the branche ...');</script>";
				}
			}
		} else {
			echo "<script>alert('invalid file type ... try ( jpg, png, gif )');</script>";
		}
	}
}

?>

<?php
// get areas names
$areas = mysql_query ( "SELECT * FROM area" );
?>

<?php
// get branche information
$branche_query = mysql_query ( "SELECT * FROM branche WHERE id = $_GET[id]" );
$branche = mysql_fetch_array ( $branche_query );
?>


<h2>Edit branche</h2>
<center>
	<div id="login-form">
		<form enctype="multipart/form-data" method="post">
			<table align="center" width="50%" border="0" id="form_table">
				<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
				<tr>
					<td colspan="2" align="center"><img src="branches/<?php echo $branche['img'];?>"
						width="200" height="200"></td>
				</tr>
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
					<td><input type="text" name="name" required="required"
						value="<?php echo $branche['name'];?>" class="form-control"></td>
				</tr>
				<tr>
					<th>Reservation</th>
					<td><select name="reservation" class="form-control">
							<option value="Yes"
								<?php if($branche['reservation']=="Yes") echo "selected";?>>Yes</option>
							<option value="No"
								<?php if($branche['reservation']=="No") echo "selected";?>>No</option>
					</select></td>
				</tr>

				<tr>
					<th>Location</th>
					<td><input type="url" name="location"
						value="<?php echo $branche['location'];?>" class="form-control"></td>
				</tr>
				<tr>
					<th>Address</th>
					<td><input type="text" name="address"
						value="<?php echo $branche['address'];?>" class="form-control"></td>
				</tr>
				<tr>
					<th>Img</th>
					<td><input type="file" name="img"  class="form-control"/></td>
				</tr>
				<tr align="center">
					<td align="center" colspan="2"><input type="submit" name="btn-edit"
						value="Edit branche" class="btn btn-primary"></td>
				</tr>
			</table>
		</form>
	</div>
</center>

<?php include 'footer.php'; ?>
<?php include 'header.php'; ?>

<?php
// get areas names
$areas = mysql_query ( "SELECT * FROM area" );
?>

<h2>Edit Your Profile</h2>
<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "customer") {
	header ( "Location: index.php" );
}

if (isset ( $_POST ['btn-update'] )) {
	$uname = mysql_real_escape_string ( $_POST ['uname'] );
	$email = mysql_real_escape_string ( $_POST ['email'] );
	$mobile = mysql_real_escape_string ( $_POST ['mobile'] );
	$upass = (mysql_real_escape_string ( $_POST ['pass'] ));
	$area_id = mysql_real_escape_string ( $_POST ['area_id'] );
	

		if (mysql_query ( "UPDATE customers SET username = '$uname', password = '$upass', email = '$email', mobile = '$mobile', area = $area_id WHERE id = $_SESSION[user_id]" )) {
			?>
<script>alert('successfully updated ');</script>
<?php
		} else {
			?>
<script>alert('error while updating user data ...');</script>
<?php
		}
}

?>

<?php
// if the user is loggedin
$query = "SELECT * FROM customers WHERE id = $_SESSION[user_id]";
$member_result = mysql_query ( $query ) or die ( "can't run query because " . mysql_error () );

$member_row = mysql_fetch_array ( $member_result );

if (mysql_num_rows ( $member_result ) == 1) {
	?>
<center>
	<form method="post">
		<table align="center" width="50%" border="0" id="form_table">
			<tr>
				<td>Username : </td><td><input type="text" name="uname"
					placeholder="User Name" required
					value="<?php echo $member_row['username'];?>" class="form-control"></td>
			</tr>
			<tr>
				<td>Email : </td><td><input type="email" name="email"
					placeholder="User Email" required
					value="<?php echo $member_row['email'];?>"  class="form-control"/></td>
			</tr>
			<tr>
				<td>Password : </td><td><input type="password" name="pass"
					placeholder="User Password" required
					value="<?php echo $member_row['password'];?>"  class="form-control"/></td>
			</tr>
			<tr>
				<td>Mobile : </td><td><input type="text" name="mobile"
					placeholder="User Mobile" required
					value="<?php echo $member_row['mobile'];?>" pattern="[0-9]{10}"  class="form-control"/></td>
			</tr>
			<tr>
				<td>Area : </td><td><select name="area_id" class="form-control"> 
						<?php while ($area = mysql_fetch_array($areas)) {?>
							<option value="<?php echo $area['id'];?>"
							<?php if ($area['id'] == $member_row['area']) echo "selected";?>><?php echo $area['name'];?></option>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr>
				<td align="center"><input type='submit' name='btn-update'
					value='Update' alt='update'  class="btn btn-primary"/></td>
			</tr>
		</table>
	</form>
</center>
<?php
} // end of else; the user didn't loggedin
?>

<?php include 'footer.php'; ?>
<?php include 'header.php'; ?>

<h2>Edit Your Profile</h2>
<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "owner") {
	header ( "Location: index.php" );
}

if (isset ( $_POST ['btn-update'] )) {
	$uname = mysql_real_escape_string ( $_POST ['uname'] );
	$email = mysql_real_escape_string ( $_POST ['email'] );
	$mobile = mysql_real_escape_string ( $_POST ['mobile'] );
	$upass = (mysql_real_escape_string ( $_POST ['pass'] ));
	
	$check = mysql_query ( "SELECT * FROM owners WHERE username = '$uname' OR email = '$email'" );
	
		if (mysql_query ( "UPDATE owners SET username = '$uname', password = '$upass', email = '$email', mobile = '$mobile' WHERE id = $_SESSION[user_id]" )) {
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
$query = "SELECT * FROM owners WHERE id = $_SESSION[user_id]";
$member_result = mysql_query ( $query ) or die ( "can't run query because " . mysql_error () );

$member_row = mysql_fetch_array ( $member_result );

if (mysql_num_rows ( $member_result ) == 1) {
	?>
<center>
	<form method="post">
		<table align="center" width="50%" border="0" id="form_table">
			<tr>
				<td>Username : <input type="text" name="uname"
					placeholder="User Name" required
					value="<?php echo $member_row['username'];?>" class="form-control"></td>
			</tr>
			<tr>
				<td>Email : <input type="email" name="email"
					placeholder="User Email" required
					value="<?php echo $member_row['email'];?>"  class="form-control"/></td>
			</tr>
			<tr>
				<td>Password : <input type="password" name="pass"
					placeholder="User Password" required
					value="<?php echo $member_row['password'];?>"  class="form-control"/></td>
			</tr>
			<tr>
				<td>Mobile : <input type="text" name="mobile"
					placeholder="User Mobile" required
					value="<?php echo $member_row['mobile'];?>" pattern="[0-9]{10}"  class="form-control"/></td>
			</tr>
			<tr>
				<td align="center"><input type='submit' name='btn-update'
					value='Update' alt='update'   class="btn btn-primary"/></td>
			</tr>
		</table>
	</form>
</center>
<?php
} // end of else; the user didn't loggedin
?>

<?php include 'footer.php'; ?>
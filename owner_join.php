<?php include 'header.php';?>

<?php
if (isset ( $_POST ['btn-signup'] )) {
	$uname = mysql_real_escape_string ( $_POST ['uname'] );
	$email = mysql_real_escape_string ( $_POST ['email'] );
	$mobile = mysql_real_escape_string ( $_POST ['mobile'] );
	$upass =  mysql_real_escape_string ( $_POST ['pass'] ) ;
	
	$check = mysql_query ( "SELECT * FROM owners WHERE username = '$uname' OR email = '$email'" );
	if (mysql_num_rows ( $check ) != 0) {
		?>
<script>alert('This username or email registerd before');</script>
<?php
	} else {
		if (mysql_query ( "INSERT INTO owners(username,email,password, mobile) VALUES('$uname','$email','$upass', '$mobile')" )) {
			$_SESSION ['user_type'] = "user";
			$_SESSION ['user_name'] = $uname;
			$_SESSION ['user_type'] = "owner";
			$_SESSION ['user_id'] = mysql_insert_id (); ?>
			
			<script>alert('successfully Signup');</script>
			<?php header ( "REFRESH:0; url=index.php" );?>
			
			?>
<?php
		} else {
			?>
<script>alert('error while Signup ...');</script>
<?php
		}
	}
}
?>

<h2>Owner Join</h2>

<center>
	<div id="login-form">
		<form method="post">
			<table align="center" width="50%" border="0" id="form_table">
				<tr>
					<td><input type="text" name="uname" placeholder="User Name"
						required  class="form-control"/></td>
				</tr>
				<tr>
					<td><input type="email" name="email" placeholder="User Email"
						required  class="form-control"/></td>
				</tr>
				<tr>
					<td><input type="password" name="pass" placeholder="User Password"
						required  class="form-control"/></td>
				</tr>
				<tr>
					<td><input type="text" name="mobile" placeholder="User Mobile"
						required pattern="[0-9]{10}"  class="form-control"/></td>
				</tr>
				<tr>
					<td align="center"><input type='submit' name='btn-signup'
						value='Join'   class="btn btn-primary"/></td>
				</tr>
			</table>
		</form>
	</div>
</center>
<?php include 'footer.php';?>
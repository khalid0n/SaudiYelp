<?php include 'header.php';?>

<?php
// get areas names
$areas = mysql_query ( "SELECT * FROM area" );
?>

<?php
if (isset ( $_POST ['btn-signup'] )) {
	$uname = mysql_real_escape_string ( $_POST ['uname'] );
	$email = mysql_real_escape_string ( $_POST ['email'] );
	$mobile = mysql_real_escape_string ( $_POST ['mobile'] );
	$upass =  mysql_real_escape_string ( $_POST ['pass'] ) ;
	$area_id =  mysql_real_escape_string ( $_POST ['area_id'] ) ;
	
	$check = mysql_query ( "SELECT * FROM customers WHERE username = '$uname' OR email = '$email'" );
	if (mysql_num_rows ( $check ) != 0) {
		?>
<script>alert('This username or email registerd before');</script>
<?php
	} else {	
		if (mysql_query ( "INSERT INTO customers(username,email,password, mobile, area) VALUES('$uname','$email','$upass', '$mobile', $area_id)" )) {
			$_SESSION ['user_type'] = "user";
			$_SESSION ['user_name'] = $uname;
			$_SESSION ['user_type'] = "customer";
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

<h2>Customer Join</h2>

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
						required pattern="[0-9]{10}" /></td>
				</tr>
				<tr>
					<td>Area
					<select name="area_id" class="form-control"> 
						<?php while ($area = mysql_fetch_array($areas)) {?>
							<option value="<?php echo $area['id'];?>"><?php echo $area['name'];?></option>
						<?php }?>
					</select>
					</td>
				</tr>
				<tr>
					<td align="center"><input type='submit' name='btn-signup'
						value='Join'  class="btn btn-primary"/></td>
				</tr>
			</table>
		</form>
	</div>
</center>
<?php include 'footer.php';?>
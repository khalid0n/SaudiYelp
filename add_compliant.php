<?php include 'header.php';?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] == "") {
	header ( "Location: index.php" );
}

if (isset ( $_POST ['btn-add'] )) {
	// compliant vars
	$content = $_POST ['content'];
	
	if (mysql_query ( "INSERT INTO compliant (content) VALUES ('$content')" )) {
		echo "<script>alert('successfully adding the compliant ');</script>";
	} else {
		echo "<script>alert('error while adding the compliant ...');</script>";
	}
}
?>

<h2>Add New Compliant</h2>
<center>
	<div id="login-form">
		<form method="post">
			<table align="center" width="70%" border="0" id="form_table">
				<tr>
					<th>Compliant Content</th>
					<td><textarea rows="10" cols="40" name="content" required="required" class="form-control"></textarea></td>
				</tr>
				<tr align="center">
					<td align="center" colspan="2"><input type="submit" name="btn-add"
						value="Add Compliant" class="btn btn-primary"></td>
				</tr>
			</table>
		</form>
	</div>
</center>

<?php include 'footer.php'; ?>
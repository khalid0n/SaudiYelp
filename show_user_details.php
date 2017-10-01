<?php include 'header.php'; ?>

<h2>User Profile</h2>

<?php
$query = "SELECT * FROM customers WHERE id = $_GET[id]";
$member_result = mysql_query ( $query ) or die ( "can't run query because " . mysql_error () );

$member_row = mysql_fetch_array ( $member_result );

if (mysql_num_rows ( $member_result ) == 1) {
	?>
<center>
	<table align="center" width="30%" border="0" id="form_table">
		<tr>
			<td>Username : <?php echo $member_row['username'];?></td>
		</tr>
		<tr>
			<td>Email : <?php echo $member_row['email'];?></td>
		</tr>
		<?php
	// get followers count
	$followers = mysql_query ( "SELECT count(*) AS followers FROM follow WHERE user_id = $_GET[id]" );
	$follow_row = mysql_fetch_array ( $followers );
	?>
		<tr>
			<td>Followers : ( <?php echo $follow_row['followers'];?> ) </td>
		</tr>
	</table>
</center>

<?php
	if ($_SESSION ['user_id'] != $_GET ['id']) {
		// check if the user follow or not before
		$follow = mysql_query ( "SELECT * FROM follow WHERE user_id = $_GET[id] AND follow_id = $_SESSION[user_id]" ) or die ( "error follow " . mysql_error () );
		
		if (mysql_num_rows ( $follow ) == 0) {
			?>
<p align="center">
	<a href="follow_user_check.php?user_id=<?php echo $_GET['id'];?>">Follow</a>
</p>
<?php } ?>

<?php
	}
}
?>

<?php include 'footer.php'; ?>
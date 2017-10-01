<?php include 'header.php'; ?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "customer") {
	header ( "Location: index.php" );
}
?>

<h2>Your Followers</h2>

<?php
$query = "SELECT follow.*, customers.*, customers.id AS customer_id FROM follow LEFT JOIN customers ON customers.id = follow.user_id WHERE follow.user_id = $_SESSION[user_id]";
$member_result = mysql_query ( $query ) or die ( "can't run query because " . mysql_error () );
?>
<center>
	<table align="center" width="100%" border="0" id="form_table">
		<tr bgcolor="#ccc">
			<th>Username</th>
			<th>Email</th>
			<th>Followers</th>
		</tr>
		<?php while ($member_row = mysql_fetch_array ( $member_result )) { ?>
		<tr align="center">
			<td><?php echo $member_row['username'];?></td>
			<td><?php echo $member_row['email'];?></td>
		<?php
			// get followers count
			$followers = mysql_query ( "SELECT count(*) AS followers FROM follow WHERE user_id = $member_row[customer_id]" );
			$follow_row = mysql_fetch_array ( $followers );
			?>
			<td> <?php echo $follow_row['followers'];?> </td>
		</tr>
			<?php }?>
	</table>
</center>

<?php include 'footer.php'; ?>
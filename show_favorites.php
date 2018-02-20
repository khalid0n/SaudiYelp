<?php include 'header.php'; ?>

<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "customer") {
	header ( "Location: index.php" );
}
?>

<h2>Your Favorites</h2>

<?php
$query = "SELECT favorite.*, branche.*, branche.id AS branche_id FROM favorite LEFT JOIN branche ON branche.id = favorite.branche_id WHERE favorite.user_id = $_SESSION[user_id]";
$favorite_result = mysql_query ( $query ) or die ( "can't run query because " . mysql_error () );
?>
<center>
	<table align="center" width="100%" border="0" id="form_table">
		<tr bgcolor="#ccc">
			<th>Name</th>
		</tr>
		<?php while ($favorite_row = mysql_fetch_array ( $favorite_result )) { ?>
		<tr align="center">
			<td><a
				href="show_branche_details.php?id=<?php echo $favorite_row['branche_id']?>"><?php echo $favorite_row['name']?></a></td>
		</tr>
			<?php }?>
	</table>
</center>

<?php include 'footer.php'; ?>
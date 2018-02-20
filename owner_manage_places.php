<?php include 'header.php'; ?>

<style>
td {
	text-align: center;
}

th {
	background-color: #eee;
}
</style>


<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "owner") {
	header ( "Location: index.php" );
}
?>
<h2>Your places</h2>
<?php $places = mysql_query ( "select * FROM place WHERE user_id = $_SESSION[user_id]" ); ?>

<table width="100%" align="center" cellpadding=5 cellspacing=5>
	<tr>
		<th>Name</th>
		<th>Price</th>
		<th>Type</th>
		<th></th>
	</tr>
	<?php while ($place_row = mysql_fetch_array ( $places )) { ?>
		<tr>
		
		<td><?php echo $place_row['name']?></td>
		<td><?php echo $place_row['price']?></td>
		<td><?php echo $place_row['type']?></td>
		<td>
			<a href="owner_manage_place_menus.php?id=<?php echo $place_row['id']?>">Show Menu</a>
			&nbsp; 
			<a href="owner_manage_place_branches.php?id=<?php echo $place_row['id']?>">Show Branches</a>
			&nbsp;
		<a href="owner_edit_place.php?id=<?php echo $place_row['id']?>">Edit</a>
			&nbsp; 
			<a href="owner_delete_place.php?id=<?php echo $place_row['id']?>">Delete</a>
			&nbsp;
		</td>
	</tr>
		<?php }?>
		<tr>
			<td colspan="13"><a href="owner_add_place.php">Add New Place</a></td>
		</tr>
</table>

<?php include 'footer.php'; ?>
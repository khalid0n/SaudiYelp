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
<h2>Your branches</h2>
<?php $branches = mysql_query ( "select * FROM branche WHERE place_id = $_GET[id]" ); ?>

<table width="100%" align="center" cellpadding=5 cellspacing=5>
	<tr>
		<th>Image</th>
		<th>Name</th>
		<th>Address</th>
		<th>Reservations</th>
		<th></th>
	</tr>
	<?php while ($branche_row = mysql_fetch_array ( $branches )) { ?>
		<tr>
		
		<td><img src="branches/<?php echo $branche_row['img']?>" width="100" height="100" /></td>
		<td><?php echo $branche_row['name']?></td>
		<td><?php echo $branche_row['address']?></td>
		<td><?php echo $branche_row['reservation']?></td>
		<td>
		
		<a href="owner_show_branche_reservations.php?id=<?php echo $branche_row['id'];?>">Reservations</a>
			&nbsp;		
		<a href="<?php echo $branche_row['location']?>" target="_blank">Location</a>
			&nbsp;
		<a href="owner_edit_place_branche.php?id=<?php echo $branche_row['id']?>">Edit</a>
			&nbsp;
			<a href="owner_delete_place_branche.php?id=<?php echo $branche_row['id']?>">Delete</a>
			&nbsp;
		</td>
	</tr>
		<?php }?>
		<tr>
			<td colspan="13"><a href="owner_add_place_branche.php?id=<?php echo $_GET[id];?>">Add New Branche</a></td>
		</tr>
</table>

<?php include 'footer.php'; ?>
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
if ($_SESSION ['user_type'] != "admin") {
	header ( "Location: index.php" );
}
?>
<h2>All places At the system</h2>
<?php $places = mysql_query ( "select * FROM place" ); ?>

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
			<a href="admin_manage_place_menus.php?id=<?php echo $place_row['id']?>">Show Menu</a>
			&nbsp; 
			<a href="admin_manage_place_branches.php?id=<?php echo $place_row['id']?>">Show Branches</a>
			&nbsp; 
			<a href="admin_delete_place.php?id=<?php echo $place_row['id']?>">Delete</a>
			&nbsp;
		</td>
	</tr>
		<?php }?>
		 
</table>

<?php include 'footer.php'; ?>
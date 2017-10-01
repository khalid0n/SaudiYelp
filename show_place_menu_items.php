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
if ($_SESSION ['user_type'] != "customer") {
	header ( "Location: index.php" );
}
?>
<h2>Menu items</h2>
<?php $items = mysql_query ( "select * FROM item WHERE menu_id = $_GET[id]" ); ?>

<table width="100%" align="center" cellpadding=5 cellspacing=5>
	<tr>
		<th>Image</th>
		<th>Name</th>
		<th>Price</th>
		<th>Calories</th>
		<th>Ingredients</th>
	</tr>
	<?php while ($item_row = mysql_fetch_array ( $items )) { ?>
		<tr>
		
		<td><img src="items/<?php echo $item_row['img']?>" width="100" height="100" /></td>
		<td><?php echo $item_row['name']?></td>
		<td><?php echo $item_row['price']?></td>
		<td><?php echo $item_row['calories']?></td>
		<td><?php echo $item_row['ingredients']?></td>
	</tr>
		<?php }?>
</table>

<?php include 'footer.php'; ?>
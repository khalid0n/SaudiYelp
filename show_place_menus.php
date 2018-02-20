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
<h2>Place Menus</h2>
<?php $menus = mysql_query ( "select * FROM menu WHERE place_id = $_GET[id]" ); ?>

<table width="100%" align="center" cellpadding=5 cellspacing=5>
	<tr>
		<th>Name</th>
		<th></th>
	</tr>
	<?php while ($menu_row = mysql_fetch_array ( $menus )) { ?>
		<tr>
		
		<td><?php echo $menu_row['name']?></td>
		<td>
			<a href="show_place_menu_items.php?id=<?php echo $menu_row['id']?>">Show Menu Items</a>
		</td>
	</tr>
		<?php }?>
</table>

<?php include 'footer.php'; ?>
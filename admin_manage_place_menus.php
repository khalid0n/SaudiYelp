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
			<a href="admin_manage_place_menu_items.php?id=<?php echo $menu_row['id']?>">Show Menu Items</a>
			&nbsp; 
			<a href="admin_delete_place_menu.php?id=<?php echo $menu_row['id']?>">Delete</a>
			&nbsp;
		</td>
	</tr>
		<?php }?>
		 
</table>

<?php include 'footer.php'; ?>
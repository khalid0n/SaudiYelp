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
<h2>All Customers at the system</h2>
<?php $customers = mysql_query ( "select customers.*, area.name FROM customers LEFT JOIN area ON area.id = customers.area" ) or die ("error customers " . mysql_error()); ?>

<table width="100%" align="center" cellpadding=5 cellspacing=5>
	<tr>
		<th>Username</th>
		<th>Email</th>
		<th>Mobile</th>
		<th>Area</th>
		<th></th>
	</tr>
	<?php while ($customer_row = mysql_fetch_array ( $customers )) { ?>
		<tr>
		<td><?php echo $customer_row['username']?></td>
		<td><?php echo $customer_row['email']?></td>
		<td><?php echo $customer_row['mobile']?></td>
		<td><?php echo $customer_row['name']?></td>
		<td>
			<a href="admin_edit_customer.php?id=<?php echo $customer_row['id']?>">Edit</a>
			&nbsp; 
			<a href="admin_delete_customer.php?id=<?php echo $customer_row['id']?>">Delete</a>
		</td>
	</tr>
		<?php }?>
		 
</table>

<?php include 'footer.php'; ?>
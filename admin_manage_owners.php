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
<h2>All Owners at the system</h2>
<?php $owners = mysql_query ( "select * FROM owners" ) or die ("error owners " . mysql_error()); ?>

<table width="100%" align="center" cellpadding=5 cellspacing=5>
	<tr>
		<th>Username</th>
		<th>Email</th>
		<th>Mobile</th>
		<th></th>
	</tr>
	<?php while ($owner_row = mysql_fetch_array ( $owners )) { ?>
		<tr>
		<td><?php echo $owner_row['username']?></td>
		<td><?php echo $owner_row['email']?></td>
		<td><?php echo $owner_row['mobile']?></td>
		<td>
			<a href="admin_edit_owner.php?id=<?php echo $owner_row['id']?>">Edit</a>
			&nbsp; 
			<a href="admin_delete_owner.php?id=<?php echo $owner_row['id']?>">Delete</a>
		</td>
	</tr>
		<?php }?>
		 
</table>

<?php include 'footer.php'; ?>
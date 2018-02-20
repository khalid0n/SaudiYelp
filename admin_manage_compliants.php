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
<?php $compliants = mysql_query ( "select * FROM compliant" ) or die ("error compliants " . mysql_error()); ?>

<table width="100%" align="center" cellpadding=5 cellspacing=5>
	<tr>
		<th>Content</th>
		<th>Date</th>
		<th></th>
	</tr>
	<?php while ($compliant_row = mysql_fetch_array ( $compliants )) { ?>
		<tr>
		<td width="70%"><?php echo $compliant_row['content']?></td>
		<td><?php echo $compliant_row['created']?></td>
		<td><a
			href="admin_delete_compliant.php?id=<?php echo $compliant_row['id']?>">Delete</a>
		</td>
	</tr>
		<?php }?>
		 
</table>

<?php include 'footer.php'; ?>
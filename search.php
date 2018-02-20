<?php include 'header.php';?>

<style>
td {
	text-align: left;
}
</style>
<h2>Search For Place</h2>

<form action="search_result.php" method="post" id="search">
	<table align="center" width="50%">
		<tr>
			<th>Name</th>
			<td><input type="text" name="name" required="required" class="form-control"/></td>
		</tr>

		<tr>
			<th>Price</th>
			<td><select name="price" class="form-control">
					<option value="$">$</option>
					<option value="$$">$$</option>
					<option value="$$$">$$$</option>
					<option value="$$$$">$$$$</option>
					<option value="$$$$$">$$$$$</option>
			</select></td>
		</tr>
		<tr>
			<th>Type</th>
			<td><select name="type" class="form-control">
					<option value="Coffee">Coffee</option>
					<option value="Restaurant">Restaurant</option>
			</select></td>
		</tr>

		<tr>
			<th>Area</th>
			<td><?php while ($area = mysql_fetch_array($areas)) {?>
						<input name="area[]" type="checkbox" value="<?php echo $area['id'];?>" /><?php echo $area['name'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<?php }?></td>
		</tr>
		<tr align="center">
			<td colspan="2" align="center"><input type="submit" value="Search"
				name="submit" class="btn btn-primary"/></td>
		</tr>
	</table>
</form>

<?php include 'footer.php'; ?>
<?php include 'header.php'; ?>

<?php
	$area = $_POST['area'];
	$price = $_POST['price'];
	$name = $_POST['name'];
	$type = $_POST['type'];	
	
	if (!empty($area)) {
		$area_array = implode(",", $area);
		$branches = mysql_query ( "SELECT * FROM branche WHERE area_id in ($area_array) AND place_id in ( select id from place WHERE name LIKE '%$name%' AND price <= '$price' AND type = '$type')" ) or die ( mysql_error () );
	} else {
// 		echo "SELECT * FROM branche WHERE area_id in ($area_array) AND id in ( select * from place WHERE name = '$name' AND price = '$price' AND type = '$type')";
		$branches = mysql_query ( "SELECT * FROM branche WHERE place_id in ( select id from place WHERE name LIKE '%$name%' AND price <= '$price' AND type = '$type')" );// or die ( mysql_error () );
	}
	
	if (mysql_num_rows($branches) != 0) {
?>

<br/>
<br/>
<!-- <table> -->
<h2>Searched branches</h2>
<?php
while ( $branche = mysql_fetch_array ( $branches ) ) {
	?>
<div style="background-color: #eee; width: 30%; text-align: center; display: inline-block; padding: 5px; margin-left: 20px; margin-bottom: 20px;">
<table cellspacing="5" cellpadding="5" width="100%">
	<tr>
		<td colspan="2" align="center"><img src="branches/<?php echo $branche['img']?>" width="150" height="150"></td>
	</tr>
	<tr>
		<th>Name:</th>
		<td><a href="show_branche_details.php?id=<?php echo $branche['id']?>"><?php echo $branche['name']?></a></td>
	</tr>
	<tr>
		<th>Address:</th>
		<td><?php echo $branche['address']?></td>
	</tr>
	<tr>
		<th>Reservation:</th>
		<td><?php echo $branche['reservation']?></td>
	</tr>
	</table>
<br />
</div>
<?php }?>

<?php } else {
	echo "<h2>Sorry there are no branches match your search criteria</h2>";
}?>
<?php include 'footer.php'; ?>
<?php include 'header.php'; ?>

<h2>Recent branches</h2>

<?php
	$branches = mysql_query ( "select * from branche ORDER BY id DESC LIMIT 10" ) or die ( mysql_error () );
?>

<br/>
<br/>
<!-- <table> -->
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
<?php include 'footer.php'; ?>
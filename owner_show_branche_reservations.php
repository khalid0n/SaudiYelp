<?php include 'header.php';?>

<style>
td {
	text-align: center;
}

th {
	background-color: #ccc;
}
</style>
<?php
// if he not logged in ; redirect to the index page
if ($_SESSION ['user_type'] != "owner") {
	header ( "Location: index.php" );
}
?>

<?php
// get all information for the reservation
$reservations_query = "SELECT reservation.*, customers.* FROM reservation LEFT JOIN customers ON customers.id = reservation.customer_id WHERE reservation.branche_id = $_GET[id]";
$reservations_result = mysql_query ( $reservations_query ) or die ( 'error : ' . mysql_error () );
?>

<h2>Branche Reservations</h2>

<?php
// if there is no reservation for the student
if (mysql_num_rows ( $reservations_result ) != 0) {
	?>
<table width="100%" align="center" cellpadding=5 cellspacing=5>
	<tr>
		<th>Customer</th>
		<th>Details</th>
	</tr>
	<?php while ($reservation_row = mysql_fetch_array($reservations_result)) { ?>
	<tr>
		<td><?php echo $reservation_row['username']?></td>
		<td><?php echo $reservation_row['content']?></td>
	</tr>
	<?php }?>
</table>
<?php }?>

<?php include 'footer.php';?>
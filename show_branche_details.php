<?php include 'header.php';?>


<!--  for rating system -->
<style>
input[type="submit"]
{
	border:none;
	background:none;
	background-color:#585858;
	width:100px;
	height:50px;
	color:white;
	border-radius:3px;
	font-size:17px;
	margin-top:20px;
}
</style>
<script type="text/javascript">
  
   function change(id)
   {
      var cname=document.getElementById(id).className;
      var ab=document.getElementById(id+"_hidden").value;
      document.getElementById(cname+"rating").value=ab;
//       alert (ab);

      for(var i=ab;i>=1;i--)
      {
         document.getElementById(cname+i).src="images/star2.png";
      }
      var id=parseInt(ab)+1;
      for(var j=id;j<=5;j++)
      {
         document.getElementById(cname+j).src="images/star1.png";
      }
   }

</script>
<!-- end script and style for rating system --> 

<script>
function check_rating () {
	if(rating_form.phprating.value == 0) {
		alert ('sorry you have to rating');
		return false;
	} else {
		return true;
	}
}

function check_empty () {
	if((review_form.content.value != null) && (/\S/.test(review_form.content.value))) {
		return true;
	} else {
		alert ('sorry you have to input valid content');
		return false;
	}
}
</script>

<?php
// get branche information
$branche_query = mysql_query ( "select branche.*, branche.id AS branche_id, branche.name AS branche_name, area.name AS area_name, place.name AS place_name, place.* from branche LEFT JOIN area ON area.id = branche.area_id LEFT JOIN place ON place.id = branche.place_id WHERE branche.id = $_GET[id]" ) or die ("error branche " . mysql_error());
$branche = mysql_fetch_array ( $branche_query );
?>

<?php
$reviews = mysql_query ( "SELECT review.*, customers.username,customers.id AS user_id  FROM review LEFT JOIN customers ON review.user_id = customers.id WHERE branche_id = $_GET[id]" ) or die ( 'error reviews : ' . mysql_error () );
?>

<?php
// get voting results
$select_rating = mysql_query ( "select count(*) AS count_all, sum(result) AS total from rating WHERE branche_id = $_GET[id]" ) OR die ("error " . mysql_error());
$rating_row = mysql_fetch_array ( $select_rating );
?>

<h2>Branche Details</h2>
<center>
	<table align="center" width="100%" border="0" id="form_table">
		<tr align="center">
			<td colspan="2"><img src="branches/<?php echo $branche['img'];?>"
				width="250" height="250"></td>
		</tr>
		<tr>
			<th>Area</th>
			<td> <?php echo $branche['area_name'];?></td>
		</tr>
		<tr>
			<th>Place Name</th>
			<td><?php echo $branche['place_name'];?></td>
		</tr>
		
		<tr>
			<th>Type</th>
			<td><?php echo $branche['type'];?></td>
		</tr>
		<tr>
			<th>Price</th>
			<td><?php echo $branche['price'];?></td>
		</tr>
		<tr>
			<th>Name</th>
			<td><?php echo $branche['branche_name'];?></td>
		</tr>

		<tr>
			<th>Address</th>
			<td><?php echo $branche['address'];?></td>
		</tr>
		<tr>
			<th>Menus</th>
			<td><a href="show_place_menus.php?id=<?php echo $branche['place_id'];?>">Show Menus</a></td>
		</tr>

		<tr>
			<th>Reservations</th>
			<td>
				<?php echo $branche['reservation'];?>
				<?php 
				// check if this brnach accept reservation or not
				if ((($branche['reservation'] == 'Yes') || ($branche['reservation'] == 'yes')) && ($_SESSION['user_type'] == 'customer')) {
					echo "<a href='reserve_branch.php?id=$_GET[id]'>make reservation</a>";	
				}
				?>
			
			</td>
		</tr>
		<tr>
			<th>Location</th>
			<td><iframe src="<?php echo $branche['location'];?>" width="100%"></iframe></td>
		</tr>
		<?php if ($_SESSION ['user_type'] == "customer") {
		
			// check if the user follow or not before
		$favorite = mysql_query ( "SELECT * FROM favorite WHERE branche_id = $_GET[id] AND user_id = $_SESSION[user_id]" ) or die ( "error favorite " . mysql_error () );
		
		if (mysql_num_rows ( $favorite ) == 0) {
			?>
		<tr>
			<th>Favorite</th>
			<td><a href="add_branche_favorite.php?branche=<?php echo $_GET['id'];?>">Add To Favorite</a></td>
		</tr>
		<?php }
		}?>
	</table>
</center>

<?php if ($_SESSION ['user_type'] == "customer") { ?>
	<p id="total_votes">Total Ratings: ( <?php echo round($rating_row['total'] / $rating_row['count_all'], 2);?> )</p>
	
	<?php // check if the user rate before or not
	$rating = mysql_query("SELECT * FROM rating WHERE branche_id = $_GET[id] AND user_id = $_SESSION[user_id]");
	if (mysql_num_rows ($rating) == 0) {
	?>
<br />
<br />

<form name="rating_form" method="post" action="add_branche_rate_check.php?branche=<?php echo $_GET[id];?>"  onsubmit="return check_rating();">
  <div class="div">
	  <input type="hidden" id="php1_hidden" value="1">
	  <img style="margin-top:10px; width:50px; height:50px; float:left;" src="images/star1.png" onmouseover="change(this.id);" id="php1" class="php">
	  <input type="hidden" id="php2_hidden" value="2">
	  <img style="margin-top:10px; width:50px; height:50px; float:left;" src="images/star1.png" onmouseover="change(this.id);" id="php2" class="php">
	  <input type="hidden" id="php3_hidden" value="3">
	  <img style="margin-top:10px; width:50px; height:50px; float:left;" src="images/star1.png" onmouseover="change(this.id);" id="php3" class="php">
	  <input type="hidden" id="php4_hidden" value="4">
	  <img style="margin-top:10px; width:50px; height:50px; float:left;" src="images/star1.png" onmouseover="change(this.id);" id="php4" class="php">
	  <input type="hidden" id="php5_hidden" value="5">
	  <img style="margin-top:10px; width:50px; height:50px; float:left;" src="images/star1.png" onmouseover="change(this.id);" id="php5" class="php">
  </div>

  <input type="hidden" name="phprating" id="phprating" value="0">
  <input type="submit" value="Rate" name="submit_rating"  class="btn btn-primary">

</form>

<?php }
} 
?>
<br />
<br />

<h3>Reviews</h3>

<?php
while ( $review = mysql_fetch_array ( $reviews ) ) {
	echo "<p>$review[content]</p>";
	echo " <strong style='color:red;'>By : </strong> ";
	echo "<a href='show_user_details.php?id=$review[user_id]' target='_blank'>". $review ['username'] . "</a> <strong style='color:red;'>at : </strong>" . $review ['created'] . "<br/><br/>";
	
	if ($_SESSION['user_type'] == 'admin') {
		echo "<a href='admin_delete_review.php?id=$review[id]&branche_id=$_GET[id]'>Delete Review</a><br/><br/>";
	}
	
	// get the total of likes and dislikes for the review
	$likes_dislikes = mysql_query ("SELECT count(likes) AS likes FROM review_rating WHERE  likes = 1 AND review_id = $review[id]") or die ("error like_dislike" . mysql_error ());
	$likes_dislikes_row = mysql_fetch_array ($likes_dislikes);
	echo "<strong>Likes : ( $likes_dislikes_row[likes] )</strong><br/>";
	
	$likes_dislikes = mysql_query ("SELECT count(dislikes) AS dislikes FROM review_rating WHERE dislikes = 1 AND  review_id = $review[id]") or die ("error like_dislike" . mysql_error ());
	$likes_dislikes_row = mysql_fetch_array ($likes_dislikes);
	echo "<strong>Dislikes : ( $likes_dislikes_row[dislikes] )</strong><br/>";
	
	// check if the user rate before or not
	$rating = mysql_query("SELECT * FROM review_rating WHERE review_id = $review[id] AND user_id = $_SESSION[user_id]");
	if (mysql_num_rows ($rating) == 0) {
		if ($_SESSION ['user_id'] != "") {
			echo "<a href='add_review_rate_check.php?branche=$_GET[id]&id=$review[id]&rate=like'><img src='images/like.png' width='30' height='30' /></a> | <a href='add_review_rate_check.php?branche=$_GET[id]&id=$review[id]&rate=dislike'><img src='images/dislike.png' width='30' height='30' /></a></a>";
		}
	}
}
?>
<br />
<br />
<?php
// if the user is logged in
// show the add review form
if ($_SESSION ['user_type'] == "customer") {
	?>
<fieldset style="width: 90%;">
	<legend>Add Review</legend>
	<form name="review_form" action="add_review_check.php?branche=<?php echo $_GET[id];?>" onsubmit="return check_empty();" 
		method="post">
		<table width="100%">
			<tr>
				<th>Content :</th>
				<td><textarea cols="40" rows="5" name="content" required="required" class="form-control"></textarea></td>
			</tr>
			<tr align="center">
				<td colspan="2"><input type="submit" value="Add"
					name="submit"  class="btn btn-primary"/></td>
			</tr>
		</table>
	</form>
</fieldset>
<?php }?>

<?php include 'footer.php'; ?>
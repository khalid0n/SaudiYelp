<?php include "dbconnect.php"?>

<?php
// get areas names
$areas = mysql_query ( "SELECT * FROM area" );
?>

<?php
if ($_SESSION ['user_id'] != "") {
	$notification = mysql_query ("SELECT * FROM notifications WHERE user_id = $_SESSION[user_id] AND readed = 0") or die('error ' . mysql_error());
	$count = mysql_num_rows ($notification);
	
	$followingquery = mysql_query("SELECT * FROM follow WHERE follow_id = $_SESSION[user_id]")or die ( "can't run query because " . mysql_error () );
	$following_count = mysql_num_rows ( $followingquery );
	
	$followersquery = mysql_query("SELECT * FROM follow WHERE user_id = $_SESSION[user_id]") or die ( "can't run query because " . mysql_error () );
	$followers_count = mysql_num_rows ( $followersquery );
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Saudi Yelp</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

<style>
table {
	background-color: #fff;
	border: 1px solid #ccc;
}

th, td {
	padding: 10px;
	text-align: center;
}

</style>

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><span>SAUDI</span>YELP <img alt=""
					src="img/logo.png" width="40"> </a>
				<ul class="user-menu">
					<li class="dropdown pull-right"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown"><svg class="glyph stroked male-user">
								<use xlink:href="#stroked-male-user"></use></svg> <?php echo $_SESSION['user_name'];?> <span
							class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
						<?php if ($_SESSION ['user_id'] == "") { ?>					
					<li><a href="customer_join.php"><svg
										class="glyph stroked male-user">
										<use xlink:href="#stroked-male-user"></use></svg> Customer
									Join</a></li>
							<li><a href="owner_join.php"><svg class="glyph stroked male-user">
										<use xlink:href="#stroked-male-user"></use></svg> Owner Join</a></li>
							<?php } else {?>
							<li><a href="logout.php"><svg class="glyph stroked cancel">
										<use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						<?php }?>
							
						</ul></li>
				</ul>
			</div>

		</div>
		<!-- /.container-fluid -->
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		<ul class="nav menu">
			
			<?php  if ($_SESSION ['user_type'] == "customer") { ?>
			<li>
				<a href="customer_account.php">
					<svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> 
				Account</a>
			</li>
			<li>
				<a href="add_compliant.php">
					<svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> 
				Add Compliant</a>
			</li>
			<li>
				<a href="show_notifications.php">
					<svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> 
				Notifications ( <font color='red'> <?php echo $count; ?> </font> )</a>
			</li>
			<li>
				<a href="show_favorites.php">
					<svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> 
				Favorites</a>
			</li>
			<li>
				<a href="customer_show_reservations.php">
					<svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> 
				Reservations</a>
			</li>
			<li>
				<a href="show_following.php">
					<svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> 
				Following ( <font color='red'> <?php echo $following_count; ?> </font> )</a>
			</li>
		<!--  	<li>
				<a href="show_followers.php">
					<svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> 
				Followers ( <font color='red'> <?php echo $followers_count; ?> </font> )</a>
			</li>-->
			
			<?php } else if ($_SESSION ['user_type'] == "owner") {?>
			<li>
				<a href="owner_account.php">
					<svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> 
				Account</a>
			</li>
			<li>
				<a href="add_compliant.php">
					<svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> 
				Add Compliant</a>
			</li>
			<li>
				<a href="owner_manage_places.php">
					<svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> 
				Places</a>
			</li>
			
			<?php } else if ($_SESSION ['user_type'] == "admin") {?>
			<li>
				<a href="admin_manage_places.php">
					<svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> 
				Places</a>
			</li>
			<li>
				<a href="admin_manage_customers.php">
					<svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> 
				Customers</a>
			</li>
			<li>
				<a href="admin_manage_owners.php">
					<svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> 
				Owners</a>
			</li>
			<li>
				<a href="admin_manage_compliants.php">
					<svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> 
				Compliants</a>
			</li>
			
			<?php }?>

			<?php if ($_SESSION ['user_id'] == "") { ?>
			<li><a href="login.php"><svg class="glyph stroked male-user">
						<use xlink:href="#stroked-male-user"></use></svg> Login</a></li>
				<?php }?>
				
			<li>
				<a href="search.php">
					<svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> 
				Search</a>
			</li>
		</ul>

	</div>
	<!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use></svg></a></li>
				<li>SAUDI YELP</li>
			</ol>
		</div>
		<!--/.row-->
		
		
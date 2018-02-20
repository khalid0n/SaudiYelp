<?php include 'header.php';?>

<div class="row">
	<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">Log in</div>
			<div class="panel-body">
				<form name="my_form" role="form" action="login_check.php" method="post">
					<fieldset>
						<div class="form-group">
							<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Password" name="password" type="password" value="">
						</div>
						<a href="#" onclick="document.my_form.submit();" class="btn btn-primary">Login</a>
					</fieldset>
				</form>
			</div>
		</div>
	</div><!-- /.col-->
</div><!-- /.row -->	
	
<?php include 'footer.php';?>

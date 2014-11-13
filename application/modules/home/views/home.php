<!DOCTYPE html>
<html>
	<head>
		<title>Welcome::School of Business</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() .'assets/css/bootstrap.min.css';?>">
		<style type="text/css">
			.form-group
			{
				width: 100%;
			}
		</style>
	</head>
	<body>
		<div class="col-md-5">
			<form method = "POST" action = "<?php echo base_url() .'home/authenticate'?>">
				<div class = "form-group">
					<input type = "text" name = "username" id = "username" class="form-control" required />
				</div>

				<div class = "form-group">
					<input type = "password" name = "password" id = "userpassword" class = "form-control" required />
				</div>
			</form>
		</div>
	</body>
</html>
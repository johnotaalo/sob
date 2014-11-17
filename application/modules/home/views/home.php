<!DOCTYPE html>
<html>
	<head>
		<title>Welcome::School of Business</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() .'assets/css/bootstrap.min.css';?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() .'assets/bower_components/font-awesome/css/font-awesome.css';?>">
		<style type="text/css">
			body
			{
				background-color: #ECF0F1;
			}
			.input-group
			{
				width: 100%;
				padding: 5px;
			}

			.input-group-addon
			{
				width: 40%;
			}

			.btn
			{
				margin: 5px 0 0 0;
			}

			.form-holder
			{
				background-color: #fff;
				padding: 30px;
				margin-left: 10px;
			}

			.imageholder
			{
				background-image: url("<?php echo base_url().'assets/custom_images/graduate.jpg'?>");
				background-attachment: none;
				background-position: center;
				background-repeat: no-repeat;
				min-height: 500px;
				margin-right: 10px;
			}

			.school-info img
			{
				width: 200px;
				height: 200px;
			}

			.description
			{
				position: absolute;
				background-color: #000;
				color: #f2f2f2;
				opacity: 0.8;
				bottom: 0;
				left: 0;
				width: 100%;
				padding: 5px;
			}

		</style>
	</head>
	<body>
		<div class = "col-md-12">
			<div class = "page-header">
				<center><h1>School of Business <small>Authentication Portal</small></h1></center>
			</div>
		</div>
		<div class="col-md-4 form-holder">
			<center>
				<div class = "school-info">
					<img src="<?php echo base_url() .'assets/custom_images/logo.jpg'?>"><br/>
					<i>School of Business</i>
				</div>
			</center>
			<legend><center>Login Below</center></legend>
			<form method = "POST" action = "<?php echo base_url() .'home/authenticate'?>">
				<div class = "input-group">
					<span class="input-group-addon"><label>Username</label></span>
					<input type = "text" name = "username" id = "username" class="form-control" required />
				</div>

				<div class = "input-group">
					<span class="input-group-addon"><label>Password</label></span>
					<input type = "password" name = "password" id = "userpassword" class = "form-control" required />
				</div>

				<div class = "input-group">
					<button type = "submit" class = "btn btn-primary col-md-12">Login</button>
				</div>

				<div class = "input-group">
				<?php if($error_message){?>
					<div class = "alert alert-dismissable alert-danger">
						<button type="button" class="close" data-dismiss="alert"> <i class = "fa fa-remove"></i> </button>
						<center><h4><?php echo $error_message; ?></h4></center>
					</div>
				<?php } ?>
				</div>
			</form>
		</div>

		<div class = "col-md-7 imageholder pull-right">
			<span class = "description">
				<h2>Here, we worry about success</h2>
				<i>Success is the only thing that the world needs...</i>
			</span>
		</div>

		<script type="text/javascript" src = "<?php echo base_url() .'assets/js/jquery.min.js'?>"></script>
		<script type="text/javascript" src = "<?php echo base_url() .'assets/js/bootstrap.min.js'?>"></script>
	</body>
</html>
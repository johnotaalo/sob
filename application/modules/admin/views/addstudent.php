<style type="text/css">
	.input-group
	{
		width: 100%;
	}

	span.input-group-addon
	{
		width: 40%;
	}
</style>
	<div class = "col-md-6">
		<form method="POST" action="<?php echo base_url() .'admin/registerstudent'?>" enctype = "multipart/form-data">
			<div class = "input-group">
				<span class="input-group-addon"><label>First Name</label></span>
				<input type = "text" name = "firstname" id = "firstname" class = "form-control" required />
			</div>

			<div class = "input-group">
				<span class="input-group-addon"><label>Last Name</label></span>
				<input type = "text" name = "lastname" id = "lastname" class = "form-control" required />
			</div>

			<div class = "input-group">
				<span class="input-group-addon"><label>Other Name</label></span>
				<input type = "text" name = "othername" id = "othername" class = "form-control" required />
			</div>

			<div class = "input-group">
				<span class="input-group-addon"><label>Phone Number</label></span>
				<input type = "text" name = "phonenumber" id = "phonenumber" class = "form-control" required />
			</div>

			<div class = "input-group">
				<span class="input-group-addon"><label>Course</label></span>
				<select name = "course" class="form-control">
					<option value="1">Select Course</option>
					<option value = "2">Bachelor of Commerce</option>
					<?php echo $courses; ?>
				</select>
			</div>

			<div class = "input-group">
				<span class="input-group-addon" ><label>Photo</label></span>
				<input type = "file" name = "student_image" id = "image" class = "form-control" />
			</div>

			<button class="btn btn-primary">Add Student</button>
		</form>
	</div>
</div>
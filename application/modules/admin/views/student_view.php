<div class = "row">
	<a href = "<?php echo base_url() .'admin/addStudent'; ?>" class = "btn btn-success pull-right" style = "margin: 10px;"><i class = "fa fa-plus"></i> Add Student</a>
</div>

<div class = "row">
	<table id="example" class="table table-bordered display" cellspacing="0" width="100%">
		<thead>
			<th>#</th>
			<th>Admission No</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Other Names</th>
			<th>Phone Number</th>
		</thead>
		<tbody id = "studentscontent">
			<?php echo $student_list; ?>
		</tbody>
	</table>
</div>
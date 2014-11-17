<?php

class Admin extends MY_Controller
{
	public function __construct() {
        parent::__construct();

        $this->load->model('admin_model');
    }
	public function index()
	{
		$data['user_details'] = parent::getUserDetails();
		$data['title'] = "Admin Home Page";
		$data['content_view'] = 'dashboard';
		$this->load->view('template/admin_template', $data);
	}

	public function getHostelSummary()
	{
		$summary = $this->admin_model->getSummary();
	}

	public function students()
	{
		$data['user_details'] = parent::getUserDetails();
		$data['title'] = "Students Page";
		$data['student_list'] = $this->getstudents();
		$data['content_view'] = "student_view";
		$this->load->view('template/admin_template', $data);
	}

	public function getstudents()
	{
		$students = $this->admin_model->getstudents();

		if($students)
		{
			$counter = '';
			$studentlist = '';
			foreach ($students as $student) {
				$counter++;
				$studentlist .= '<tr>
				<td>'.$counter.'</td>
				<td>'.$student['id'].'</td>
				<td>'.$student['firstname'].'</td>
				<td>'.$student['lastname'].'</td>
				<td>'.$student['othernames'].'</td>
				<td>'.$student['phonenumber'].'</td>
				</tr>';
			}

			return $studentlist;
		}
		else
		{
			return '';
		}
	}

	public function filterstudent($criteria)
	{
		$students = $this->admin_model->getstudentsby($criteria);

	}

	public function addStudent()
	{
		$data['user_details'] = parent::getUserDetails();
		$data['title'] = "Add Student";
		$data['content_view'] = "addstudent";
		$this->load->view('template/admin_template', $data);
	}

	public function registerstudent()
	{
		$path = '';
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('student_image'))
		{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);die;
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			foreach ($data as $key => $value) {
				$path = base_url().'upload/'.$value['file_name'];
			}

			$result = $this->admin_model->registerstudent($path);

			if($result)
			{
				redirect('admin/students');
			}
			else
			{
				echo "Error";
			}
			// echo "Success!";die;
		}
	}

	public function lecturers()
	{
		$data['user_details'] = parent::getUserDetails();
		$data['title'] = "Lecturers Page";
		$data['lecturer_list'] = $this->createlecturer();
		$data['content_view'] = "lecturer_view";
		$this->load->view('template/admin_template', $data);
	}

	public function createlecturer()
	{
		$lecturers = $this->admin_model->getlecturers();

		if($lecturers)
		{
			$counter = '';
			$lecturerlist = '';
			foreach ($lecturers as $lecturer) {
				$counter++;
				$lecturerlist .= '<tr>
				<td>'.$counter.'</td>
				<td>'.$lecturer['firstname'].'</td>
				<td>'.$lecturer['lastname'].'</td>
				<td>'.$lecturer['othernames'].'</td>
				<td>'.$lecturer['phonenumber'].'</td>
				</tr>';
			}

			return $lecturerlist;
		}
		else
		{
			return '';
		}
	}

	public function hostels()
	{
		$data['user_details'] = parent::getUserDetails();
		$data['title'] = "Hostels Page";
		$data['hostel_list'] = $this->createhostels();
		$data['content_view'] = "hostel_view";
		$this->load->view('template/admin_template', $data);
	}

	public function createhostels()
	{
		$hostels = $this->admin_model->getHostels();
		$room_allocation = $this->admin_model->getstudentrooms();
		$hostel_list = '';
		$counter = 0;
		foreach ($hostels as $key => $value) {
			$counter++;
			$capacity = $value['totalcapacity'];

			if($capacity == '')
			{
				$capacity = 0;
			}
			if (array_key_exists($key, $room_allocation)) {
				$hostel_list .= '<tr>
				<td>'.$counter.'</td>
				<td>'.$value['hostel_name'].'</td>
				<td>'.$value['rooms'].'</td>
				<td>'.$room_allocation[$key].'</td>
				<td>'.$capacity.'</td>
				<td>'.($capacity - $room_allocation[$key]).'</td>
				<td><a href = "'.base_url().'admin/specifichostel/'.$value['id'].'">See refined details</a></td>
				';
			}
			else
			{
				$hostel_list .= '<tr>
				<td>'.$counter.'</td>
				<td>'.$value['hostel_name'].'</td>
				<td>'.$value['rooms'].'</td>
				<td>0</td>
				<td>'.$capacity.'</td>
				<td>0</td>
				<td><a href = "'.base_url().'admin/specifichostel/'.$value['id'].'">See refined details</a></td>
				';
			}
		}

		return $hostel_list;
		// echo "<pre>"; print_r($room_allocation);die;
	}

	public function specifichostel($hostel_id)
	{
		$data['hostelshare'] = $this->admin_model->hostelshare($hostel_id);
		$data['pie_details'] = $this->hostel_data($hostel_id);
		$data['hostel_id'] = $hostel_id;
		$data['user_details'] = parent::getUserDetails();
		$data['room_allocation'] = $this->room_allocation($hostel_id);
		$data['title'] = "Specific Hostel Page";
		$data['hostel_details'] = $this->admin_model->getHostelDetails($hostel_id);
		$data['hostel_name'] = $this->admin_model->getHostelName($hostel_id);
		$data['content_view'] = "specific_hostel_view";
		$this->load->view('template/admin_template', $data);
	}

	public function hostel_data($hostel_id)
	{
		$hostel_data = $this->admin_model->hostelshare($hostel_id);
		return json_encode($hostel_data, JSON_NUMERIC_CHECK);
	}

	public function room_allocation($hostel_id)
	{
		$room_data = $this->admin_model->getHostelDetails($hostel_id);
		// echo "<pre>";print_r($room_data);die;
		$rooms = $this->admin_model->getRooms($hostel_id);
		foreach ($room_data as $key => $value) {
		}	
	}

}
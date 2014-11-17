<?php

class Admin_Model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function getstudentsby($criteria)
	{
		$query = $this->db->query("SELECT * FROM students ORDER BY " . $criteria);
		$result = $query->result_array();

		return $result;
	}

	public function getstudents()
	{
		$query = $this->db->query("SELECT * FROM students ORDER BY id");
		$result = $query->result_array();

		return $result;
	}

	public function getlecturers()
	{
		$query = $this->db->query("SELECT * FROM lecturers ORDER BY id");
		$result = $query->result_array();

		return $result;
	}

	public function registerstudent($path)
	{
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$othernames = $this->input->post('othername');
		$course = $this->input->post('course');
		$phone = $this->input->post('phonenumber');
		$username = strtolower($firstname) .'.'.strtolower($lastname);
		$defaultpassword = md5('123456');

		$query = $this->db->query("INSERT INTO students VALUES (NULL, '".$firstname."', '".$lastname."', '".$othernames."', '".$path."', '".$phone."')");

		if($query)
		{
			$student_no = mysql_insert_id();
			$query = $this->db->query("INSERT INTO student_course VALUES(NULL, ".$student_no.", ".$course.", NULL)");
			$query = $this->db->query("INSERT INTO users VALUES (NULL, '".$student_no."', '".$defaultpassword."', 'student', 0)");

			if($query)
			{
				return true;
			}

			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}

	public function checkusernameexist($username)
	{
		echo $username;die;
		$query = $this->db->query("SELECT count(user_id) as usercounts FROM users WHERE username = '".$username."'");

		$result = $query->result_array();

		$count = $result[0]['usercounts'];

		if($count == 0)
		{
			return $username;
		}
		else
		{
			$new_count = $count + 1;
			$username = $username . $new_count;
			echo $username;die;

			$this->checkusernameexist($username);
		}
	}

	public function getHostels()
	{
		$query = $this->db->query("SELECT h.id, h.hostel_name, COUNT(r.id) as rooms, SUM(r.capacity) as totalcapacity FROM hostels h
			LEFT JOIN hostel_rooms r ON r.hostel_id = h.id
			GROUP BY h.id
			");
		$result = $query->result_array();

		if ($result) {
			foreach ($result as $hostel) {
				$hostels[$hostel['id']] = $hostel;
			}
		}
		else
		{
			return false;
		}

		return $hostels;
	}

	public function getstudentrooms()
	{
		$query = $this->db->query("SELECT COUNT('s.student_id') as counts, r.hostel_id FROM student_room s
		RIGHT JOIN hostel_rooms r ON r.id = s.room_id
		WHERE s.active = 1
		 GROUP BY r.hostel_id");

		$results = $query->result_array();
		if($results)
		{
			foreach ($results as $result) {
				$allocation[$result['hostel_id']] = $result['counts'];
			}

			return $allocation;
		}
		else
		{
			return false;
		}
	}

	public function getHostelDetails($hostel_id)
	{
		$query = $this->db->query("SELECT * FROM student_room r
			JOIN students s ON s.id = r.student_id
			JOIN hostel_rooms hr ON hr.id = r.room_id
			JOIN hostels h ON h.id = hr.hostel_id

			WHERE r.active = 1 AND h.id = ".$hostel_id."
			");

		$result = $query->result_array();

		return $result;
	}

	public function hostelshare($hostel_id)
	{
		$query = $this->db->query("SELECT count(student_id) as students FROM student_room s
			RIGHT JOIN hostel_rooms r ON  s.room_id = r.id 
			WHERE r.hostel_id = " .$hostel_id);

		$result = $query->result_array();
		$occupied = $result[0]['students'];
		$hostels = $this->getHostels();

		$totalcapacity = $hostels[$hostel_id]['totalcapacity'];
		$occupied = $result[0]['students'];
		$not_allocated = $totalcapacity - $occupied;

		$data = array();

		$rows['Occupied'] = $occupied;
		$rows['Not Occupied'] = $not_allocated;

		array_push($data, $rows);
		//echo json_encode($data);die;

		return $data;
	}

	public function getHostelName($hostel_id)
	{
		$query = $this->db->query("SELECT hostel_name FROM  hostels WHERE id = " .$hostel_id);

		$result = $query->result_array();

		return $result[0]['hostel_name'];
	}

	public function getRooms($hid)
	{
		$query = $this->db->query("SELECT * FROM hostel_rooms WHERE hostel_id = " .$hid);

		$result = $query->result_array();
		$data = array();
		if ($result) {
			foreach ($result as $room) {
				$data[$room['id']] = $room;
			}
		}

		return $data;
	}
}
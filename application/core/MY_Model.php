<?php

//# Extend CI_Model to include Doctrine Entity Manager
date_default_timezone_set('Africa/Nairobi');

class MY_Model extends CI_Model
{
	function __construct() {
	    parent::__construct();
	}

	public function getUser($u_type, $u_id)
	{
		switch ($u_type) {
			case 'admin':
				$query = $this->db->query("SELECT * FROM administrator WHERE user_id = ".$u_id." LIMIT 1");
				$result = $query->result_array();
				break;
			case 'student':
				$query = $this->db->query("SELECT * FROM students WHERE user_id = ".$u_id." LIMIT 1");
				$result = $query->result_array();
				break;
			
			default:
				echo "No....";die;
				break;
		}
		if($result)
		{
			return $result[0];
		}
		else
		{
			return false;
		}
	}
}
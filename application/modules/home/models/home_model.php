<?php

class Home_model extends MY_Model
{
	public function __construct() {
        parent::__construct();

    }

    public function addAdminUser()
    {
    	$password = md5('123456');
    	$query = $this->db->query("INSERT INTO users VALUES(NULL, 'admin', '".$password."', 'admin', 1)");

    	if($query)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }

    public function addAdmin($u_id)
    {
    	$query = $this->db->query('INSERT INTO administrator VALUES (NULL, "SCHOOL", "BUSINESS", "OF", "http://localhost/sob/users/enjoyyourheineken-604008.jpeg", '.$u_id.')');

    	if($query)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }

    public function auth($username, $password)
    {
    	$user_details = array();
    	$query = $this->db->query("SELECT user_id, user_type FROM users WHERE username = '" . $username . "' AND password = '" . $password . "' LIMIT 1");
    	$result = $query->result_array();
    	if($result)
    	{
	    	foreach ($result as $user) {
	    		$user_details = array('id' => $user['user_id'], 'usertype' => $user['user_type']) ;
	    	}

	    	return $user_details;
	    }
	    else
	    {
	    	return false;
	    }

    	
    }

    public function addSession($session_id, $u_id)
    {
    	$query = $this->db->query("INSERT INTO user_sessions VALUES(NULL, '".$session_id."', ".$u_id.", NULL)");
    }
    
}
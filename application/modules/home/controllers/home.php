<?php

class Home extends MY_Controller
{
	public function __construct() {
        parent::__construct();

        $this->load->model('home_model');
    }

    public function index()
    {
    	$data['error_message'] = '';
    	$this->load->view('home', $data);
    }

    public function authenticate()
    {
    	$username = $this->input->post('username');
    	$password = md5($this->input->post('password'));

    	$auth = $this->home_model->auth($username, $password);
    	if($auth)
    	{
    		$this->getUserInterface($auth['usertype'], $auth['id']);
    	}
    	else
    	{
    		$data['error_message'] = 'Wrong username or password';
    		$this->load->view('home', $data);
    	}
    }

    public function createAdmin()
    {
    	$admin_user = $this->home_model->addAdminUser();
    	if($admin_user)
    	{
    		$user_id = mysql_insert_id();

    		$admin = $this->home_model->addAdmin($user_id);
    		if($admin)
    		{
    			echo "Successfully Created Super Admin ";
    		}
    		else
    		{
    			echo "Error adding the admin";
    		}
    	}
    	else
    	{
    		echo "Error adding user";
    	}
    }

    public function getUserInterface($u_type, $user_id)
    {
    	$data = array('user_id' => $user_id, 'user_type' => $u_type);
    	$this->session->set_userdata($data);
    	$this->home_model->addSession($this->session->userdata('session_id'), $user_id);
    	switch ($u_type) {
    		case 'admin':
    			redirect(redirect(base_url() .'admin'));
    			break;
    		
    		default:
    			# code...
    			break;
    	}
    }
}
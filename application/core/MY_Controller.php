<?php

class MY_Controller extends MX_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('home/home_model');

    }

    public function getUserDetails()
	{
		$usertype = $this->session->userdata('user_type');
		$userid = $this->session->userdata('user_id');
		$user = $this->home_model->getUser($usertype, $userid);

		return $user;
	}
}
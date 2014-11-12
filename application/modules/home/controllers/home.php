<?php

class Home extends MY_Controller
{
	public function __construct() {
        parent::__construct();

    }

    public function index()
    {
    	echo "This is the home controller";
    }
}
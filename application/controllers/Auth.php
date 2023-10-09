<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    // function __construct() {
    //     parent::__construct();
    //     $this->load->model('m_model');
    // }
	
	public function index()
	{
		// $data['title'] = 'Login';
		$this->load->view('auth/login');
	}

	//  <=== register ===>
	public function register() {
		$this->load->view('auth/register');
	}
}
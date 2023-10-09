<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	public function dashboard()
	{
		$this->load->view('page/dashboard');
	}
}
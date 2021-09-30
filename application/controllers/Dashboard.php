<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username')){
			redirect('auth');
		}
	}
	
	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'subtitle' => 'Admin',
			'subtitle2' => 'Dashboard',
			'page' => 'admin/dashboard/index'
		];

		$this->load->view('templates/app', $data, FALSE);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
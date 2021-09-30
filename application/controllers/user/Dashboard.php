<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelAktivitas', 'aktivitas');
		$this->load->model('ModelAbsen', 'absen');
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index()
	{	
		$id = $this->session->userdata('nim');
		$aktivitas = $this->aktivitas->get_by_aktivitas($id);
		$absen = $this->absen->getAbsen($id);
		$data = [
			'title' => 'Dashboard',
			'subtitle' => 'User',
			'subtitle2' => 'Dashboard',
			'page' => 'user/dashboard/index',
			'data' => $aktivitas,
			'absen' => $absen
		];

		$this->load->view('templates/app', $data, FALSE);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
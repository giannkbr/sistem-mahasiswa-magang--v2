<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aktivitas extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelAktivitas', 'aktivitas');
		// if(!$this->session->set_userdata('username')){
		// 	redirect('auth');
		// }
		date_default_timezone_set("Asia/Jakarta");
	}
	

	public function read($id, $bln = null, $thn=null)
    {    
		
		$aktivitas = $this->aktivitas->get_by_id(decrypt_url($id));
		// var_dump($absen);
		// die();
		if ($this->input->post('bulan')){
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');
		}else if ($bln) {
			$bulan = $bln;
			$tahun = $thn;
		}else {
			$bulan = date('m');
			$tahun = date('Y');
		}
		$data = array(
			'title' => 'Data Aktivitas',
			'subtitle' => 'User',
			'bulan' => $bulan,
			'tahun' => $tahun,
			'subtitle2' => 'List Aktivitas',
			'data' => $aktivitas,
			'page' => 'user/aktivitas/index',
		);
		$this->load->view('templates/app', $data);
    }

}

/* End of file aktivitas.php */

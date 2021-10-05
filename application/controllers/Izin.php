<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Izin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelIzin', 'izin');
		$this->load->model('ModelMahasiswa', 'mahasiswa');
		// if(!$this->session->set_userdata('username')){
		// 	redirect('auth');
		// }
		date_default_timezone_set("Asia/Jakarta");
	}
    // index
	public function index()
	{
		$izin = $this->izin->get_all();
		
        $data = array(
            'title' => 'Data Izin',
            'subtitle' => 'Admin',
            'subtitle2' => 'List Izin',
            'izin_data' => $izin,
            'page' => 'admin/izin/index',
        );
        $this->load->view('templates/app', $data);
    }

    // untuk ngebaca data izin keseluruhan
	public function read($id) 
    {    
        $izin = $this->izin->get_by_id($id);
		// print_r($izin);
		// exit();
		$mahasiswa = $this->mahasiswa->get_by_id($id);
        $data = array(
            'title' => 'Data Izin',
            'subtitle' => 'Admin',
            'subtitle2' => 'List Izin Mahasiswa',
            'data' => $izin,
            'mahasiswa' => $mahasiswa,
            'page' => 'admin/izin/read',
        );
        $this->load->view('templates/app', $data);
    }

    // untuk tombol menerima izin
	public function izin_terima($id)
	{
		$this->db->update('izin', ['status' => 'diterima'], ['izin_id' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Izin diterima!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(site_url('izin'));
	}


    // untuk tombol menolak izin
	public function izin_tolak($id)
	{
		$this->db->update('izin', ['status' => 'ditolak'], ['izin_id' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Izin ditolak!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(site_url('izin'));
	}

	public function print($id){
    	$izin = $this->izin->get_by_id($id);
		$mahasiswa = $this->mahasiswa->get_by_id($id);	

        $data = array(
			'data' => $izin,
			'mahasiswa'=> $mahasiswa
		);
        
		$html =  $this->load->view('admin/izin/cetak_data', $data);
    }

}

/* End of file Izin.php */

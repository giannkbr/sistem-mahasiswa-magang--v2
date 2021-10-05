<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelAbsen', 'absen');
		$this->load->model('ModelMahasiswa', 'mahasiswa');
	}

	public function index()
	{

		$mahasiswa = $this->absen->get_all();
		
		$data = [
			'title' => 'Data Absen Mahasiswa',
			'subtitle' => 'Admin',
			'subtitle2' => 'List Absen',
			'data' => $mahasiswa,
			'page' => 'admin/absen/index'
		];	

		$this->load->view('templates/app', $data, FALSE);
	}

	public function read($id, $bln = null, $thn=null)
    {    
		$absen = $this->absen->get_by_id($id);
		// print_r($absen);
		// exit();
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
			'title' => 'Data Absen',
			'subtitle' => 'Admin',
			'bulan' => $bulan,
			'tahun' => $tahun,
			'subtitle2' => 'List Absen Mahasiswa',
			'data' => $absen,
			'page' => 'admin/absen/read',
		);
		$this->load->view('templates/app', $data);
    }

    public function add_new_absen($tgl = null, $bln = null, $id){

    	$add_absen = $this->absen->addNewAbsen($tgl);

    	if ($add_absen)
			{
				 $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		            <strong>Create record success!
		            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		            </div>');
				if($tgl){
					// return $this->db->insert('aktivitas', $data);
					redirect(site_url('absen/read/'.$id.'/'.$bln));
				}else {
					redirect(site_url('absen'));
				}
			}else
			{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		            <strong>Gagal add record!
		            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		            </div>');
					if($tgl){
					// return $this->db->insert('aktivitas', $data);
					redirect(site_url('absen/read/'.$id.'/'.$bln));
					}else {
						redirect(site_url('absen'));
					}
			}

    }

    public function add_absen_pulang($tgl = null, $bln = null, $id)
	{
		$add_absen = $this->absen->addAbsenPulang($tgl);

		if ($add_absen)
			{
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		            <strong>Create record success!
		            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		            </div>');
				if($tgl){
					// return $this->db->insert('aktivitas', $data);
					redirect(site_url('absen/read/'.$id.'/'.$bln));
				}else {
					redirect(site_url('absen'));
				}
			}else
			{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		            <strong>Gagal add record!
		            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		            </div>');
				if($tgl){
					// return $this->db->insert('aktivitas', $data);
					redirect(site_url('absen/read/'.$id.'/'.$bln));
				}else {
					redirect(site_url('absen'));
				}
			}


	}

	public function edit_absen($tgl = null, $bln = null, $id)
	{
		$add_absen = $this->absen->editAbsen($tgl);

		if ($add_absen)
			{
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		            <strong>Create record success!
		            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		            </div>');
				if($tgl){
					// return $this->db->insert('aktivitas', $data);
					redirect(site_url('absen/read/'.$id.'/'.$bln));
				}else {
					redirect(site_url('absen'));
				}
			}else
			{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		            <strong>Gagal add record!
		            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		            </div>');
				if($tgl){
					// return $this->db->insert('aktivitas', $data);
					redirect(site_url('absen/read/'.$id.'/'.$bln));
				}else {
					redirect(site_url('absen'));
				}
			}


	}

    public function cetak_rekap_absen($id, $bln = null, $thn=null){
    	if ($bln) {
				$bulan = $bln;
				$tahun = $thn;
		}else {
                $bulan = date('m');
                $tahun = date('Y');
		}

		$absen = $this->absen->get_by_id($id);

		
        $data = array(
			'bulan' => $bulan,
			'tahun' => $tahun,
			'data' => $absen,
		);
        
		$html =  $this->load->view('admin/absen/cetak_absen', $data);
    }

    public function rekap_bulan($bln = null, $thn = null){
    
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

		$mahasiswa = $this->mahasiswa->get_all();

		
        $data = array(
			'title' => 'Laporan Data Absen',
			'subtitle' => 'Admin',
			'bulan' => $bulan,
			'tahun' => $tahun,
			'subtitle2' => 'List Absen Mahasiswa',
			'mahasiswa' => $mahasiswa,
			'page' => 'admin/absen/rekap_bulan',
		);

		$this->load->view('templates/app', $data);


    }

    // function lihat_peta(){
       	
    //    	// $data['absen'] = $this->absen->getAbsenMahasiswa(date('Y-m-d'));
    // 	$absen = $this->absen->get_all();
    //    	$data = array(
	// 		'title' => 'Peta Absen',
	// 		'subtitle' => 'Admin',
	// 		'absen' => $absen,
	// 		'subtitle2' => 'List Absen Mahasiswa',
	// 		'page' => 'admin/absen/peta_absen',
	// 	);

    //      $this->load->view('templates/app', $data);
    // }

}

/* End of file Absen.php */
/* Location: ./application/controllers/Absen.php */
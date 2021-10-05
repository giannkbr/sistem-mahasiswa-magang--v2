<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller {
	
	// yg pertama kali diakses
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelAbsen', 'absen');
		$this->load->model('ModelMahasiswa', 'mahasiswa');
	}
	
	// index tampilan perrtama
	public function index()
	{

		$mahasiswa = $this->absen->get_all(); // load data
		
		$data = [
			'title' => 'Data Absen Mahasiswa',
			'subtitle' => 'Admin',
			'subtitle2' => 'List Absen',
			'data' => $mahasiswa,
			'page' => 'admin/absen/index' // pemanggilan halaman
		];	

		$this->load->view('templates/app', $data, FALSE); // load_view
	}

	// untuk ngebaca keselruhan table 
	public function read($id, $bln = null, $thn=null)
    {    
		$absen = $this->absen->get_by_id($id);
		// print_r($absen);
		// exit();

		// ngecek ada inputan bulan dan tahun atau ngga, kalo ngga ada nanti lari ke else paling akhir, di mana bulan dan tanggal sesuai dengan yg sekarang
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
			'page' => 'admin/absen/read', // pemanggilan halaman
		);
		$this->load->view('templates/app', $data);
    }

	// tambah absen
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

	// tambah asben pulang
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

	// edit absen
	public function edit_absen($tgl = null, $bln = null, $id)
	{
		$add_absen = $this->absen->editAbsen($tgl); // ngecek absen

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

	// cetak rekapan absen
    public function cetak_rekap_absen($id, $bln = null, $thn=null){
    	
		// ngecek ada inputan bulan dan tahun atau ngga, kalo ngga ada nanti lari ke else paling akhir, di mana bulan dan tanggal sesuai dengan yg sekarang
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

	// menampilkan laporan absen perbulan
    public function rekap_bulan($bln = null, $thn = null){
    
		// ngecek ada inputan bulan dan tahun atau ngga, kalo ngga ada nanti lari ke else paling akhir, di mana bulan dan tanggal sesuai dengan yg sekarang
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
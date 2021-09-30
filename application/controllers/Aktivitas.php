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
	public function index()
	{
		$aktivitas = $this->aktivitas->get_all();
		
        $data = array(
            'title' => 'Data Aktivitas',
            'subtitle' => 'Admin',
            'subtitle2' => 'List Aktivitas',
            'aktivitas_data' => $aktivitas,
            'page' => 'admin/aktivitas/index',
        );
        $this->load->view('templates/app', $data);
    }

	public function read($id, $bln = null, $thn=null)
    {    
		$aktivitas = $this->aktivitas->get_by_id($id);
		// print_r($aktivitas);
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
			'title' => 'Data Aktivitas',
			'subtitle' => 'Admin',
			'bulan' => $bulan,
			'tahun' => $tahun,
			'subtitle2' => 'List Aktivitas Mahasiswa',
			'data' => $aktivitas,
			'page' => 'admin/aktivitas/read',
		);
		$this->load->view('templates/app', $data);
    }

   

    public function add_aktivitas($tgl = null, $bln = null, $id){
    	
    	$data = $this->aktivitas->addAktivitas($tgl);
        if ($data)
			{
				 $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		            <strong>Create record success!
		            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		            </div>');
				if($tgl){
					// return $this->db->insert('aktivitas', $data);
					redirect(site_url('aktivitas/read/'.$id));
				}else {
					redirect(site_url('aktivitas'));
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
					redirect(site_url('aktivitas/read/'.$id));
				}else {
					redirect(site_url('aktivitas'));
				}
		}
    }

    public function edit_aktivitas($id, $sender){
    	 	$ubah = $this->aktivitas->ubahAktivitas($id);
			$nim  = $this->input->post('nim');
			if ($ubah){
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		            <strong>Update record success!
		            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		            </div>');
				if($sender == 1){
					redirect(site_url('aktivitas/read/'.$nim));
				}else {
					redirect('aktivitas');
				}
			}else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		            <strong>Gagal update record!
		            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		            </div>');
				if($sender == 1){
					redirect(site_url('aktivitas/read/'.$nim));
				}else {
					redirect('aktivitas');
				}
			}
    }

     public function cetak_aktivitas_pdf($id, $bln = null, $thn=null){
    
    	if ($bln) {
				$bulan = $bln;
				$tahun = $thn;
		}else {
                $bulan = date('m');
                $tahun = date('Y');
		}

		$aktivitas = $this->aktivitas->get_by_id($id);

        $data = array(
			'bulan' => $bulan,
			'tahun' => $tahun,
			'data' => $aktivitas,
		);
        
		$html =  $this->load->view('admin/aktivitas/cetak_aktivitas', $data);
	}

	public function cetak_aktivitas($id, $bln = null, $thn=null){
    	
    	if ($bln) {
				$bulan = $bln;
				$tahun = $thn;
		}else {
                $bulan = date('m');
                $tahun = date('Y');
		}

		$aktivitas = $this->aktivitas->get_by_id($id);

        $data = array(
			'bulan' => $bulan,
			'tahun' => $tahun,
			'data' => $aktivitas,
		);
        
		$this->load->view('admin/aktivitas/cetak_aktivitas', $data);
	}

	 public function cetak_aktivitas_tgl($id){
    	
    	$org_tgl_awal = $this->input->post('tgl_awal', true);
		$org_tgl_akhir = $this->input->post('tgl_akhir', true);
			
			  
		$tgl_awal = str_replace('/"', '-', $org_tgl_awal);  
		$tgl_akhir = str_replace('/"', '-', $org_tgl_akhir);
    	
		$aktivitas = $this->aktivitas->get_by_id($id);

        $data = array(
			'data' => $aktivitas,
			'tgl_awal' => date("Y-m-d",strtotime($tgl_awal)),
			'tgl_akhir'=>  date("Y-m-d", strtotime($tgl_akhir))
		);
        
		$this->load->view('admin/aktivitas/cetak_aktivitas_tgl', $data);
	}

	  public function hapusDataAktivitas($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('aktivitas', ['aktivitas_id' => $id]);
    }
}

/* End of file aktivitas.php */

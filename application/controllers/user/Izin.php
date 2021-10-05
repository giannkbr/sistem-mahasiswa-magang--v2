<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Izin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelIzin', 'izin');
		$this->load->model('ModelMahasiswa', 'mahasiswa');
		date_default_timezone_set("Asia/Jakarta");
	}

	// baca table izin
	public function read($id)
	{
		$mahasiswa = $this->mahasiswa->get_by_id($id); 
		$dt1 = new DateTime($mahasiswa->waktu_masuk);
		$dt2 = new DateTime(date('Y-m-d'));
		$d = $dt2->diff($dt1)->days + 1;

        $izin = $this->izin->get_by_id($id);
		// var_dump($izin);
		// die();
		$mahasiswa = $this->mahasiswa->get_by_id($id);

        $data = array(
            'title' => 'Data Izin',
            'subtitle' => 'User',
            'subtitle2' => 'List Izin',
            'data' => $izin,
            'bakti' => $d,
            'mahasiswa' => $mahasiswa,
            'page' => 'user/izin/index',
        );
        $this->load->view('templates/app', $data);
	}

	public function add($id){

		$mahasiswa = $this->mahasiswa->get_by_id($id);
		$dt1 = new DateTime($mahasiswa->waktu_masuk);
		$dt2 = new DateTime(date('Y-m-d'));
		$d = $dt2->diff($dt1)->days + 1;
		$data = [
			'title' => 'Data Izin',
			'bakti' => $d,
			'page' => 'user/izin/create',
			'subtitle' => 'Karyawan',
			'subtitle2' => 'Data Permohonan izin',
		];

		$this->load->view('templates/app', $data, FALSE);
	}

	// add izin
	public function add_action(){

		$this->db->trans_start();
		$id = encrypt_url($this->session->userdata('nim'));
		
		$data = array(
			'nim'			=> $this->session->userdata('nim'),
			'jenis_izin'	=> $this->input->post('jenis'),
			'alasan'		=> $this->input->post('alasan'),
			'status'		=> 'diajukan'
		);
		if (isset($_FILES['bukti']['name'])) {
			$config['upload_path'] 		= './images/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['overwrite']  		= true;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('bukti')) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		            <strong>Gagal add record!
		            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		            </div>');
				redirect(site_url('user/izin/add/'.decrypt_url($id)));
			} else {
				$img = $this->upload->data();
				$data['bukti'] = $img['file_name'];
			}
		}
		$this->db->insert('izin', $data);
		$cek = $this->db->query(" select * from izin order by izin_id desc limit 1 ")->row();
		$dt1 = new DateTime($this->input->post('mulai'));
		$dt2 = new DateTime($this->input->post('akhir'));
		$jml = $dt2->diff($dt1)->days + 1;
		$tgl1 = $this->input->post('mulai');
		$no  = 1;
		for ($i = 0; $i < $jml; $i++) {
			$insert = array(
				'izin_id' => $cek->izin_id,
				'tanggal' => date('Y-m-d', strtotime('+' . $i . ' days', strtotime($tgl1))),
			);
			$this->db->insert('detailizin', $insert);
		}

		$this->db->trans_complete();
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		            <strong>Success add record!
		            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		            </div>');
		redirect(site_url('user/izin/read/'.decrypt_url($id)));
	}

	// delete izin
	public function delete($id)
	{
		$this->db->delete('izin', ['izin_id' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		            <strong>Success delete record!
		            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		            </div>');
		redirect(base_url('user/izin/read/' . $this->session->userdata('nim')));
	}

}

/* End of file Izin.php */
/* Location: ./application/controllers/user/Izin.php */
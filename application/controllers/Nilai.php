<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelNilai', 'nilai');
		// if(!$this->session->set_userdata('username')){
		// 	redirect('auth');
		// }
	}

	//index
	public function index()
	{
	
        $nilai = $this->nilai->get_all();

        $data = array(
            'title' => 'Data nilai',
            'subtitle' => 'Admin',
            'subtitle2' => 'List nilai',
            'data' => $nilai,
            'page' => 'admin/nilai/index',
        );
        $this->load->view('templates/app', $data);
    }

	// tambah data nilai
	public function create()
	{
        $this->_rules(); // load pricate function
        if ($this->form_validation->run() == FALSE) {
			$data = array(
                'title' => 'Data nilai',
                'subtitle' => 'Admin',
                'subtitle2' => 'Tambah Data nilai',
                'mahasiswa' => $this->db->get('mahasiswa')->result(),  // ambil data mhs untuk ambil NIM
                'page' => 'admin/nilai/create', // load halaman
            );
            $this->load->view('templates/app', $data);
		} else {
			$data = [
				'nim' => $this->input->post('nim'),
				'nilai_a' => $this->input->post('nilai_a'),
				'nilai_b' => $this->input->post('nilai_b'),
				'nilai_c' => $this->input->post('nilai_c'),
				'nilai_d' => $this->input->post('nilai_d'),
				'nilai_e' => $this->input->post('nilai_e'),
				'nilai_f' => $this->input->post('nilai_f'),
				'total' => $this->input->post('total'),
				// 'ket' => $this->input->get('klasifikasi')
			];

			$this->nilai->insert($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Create record success!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(site_url('nilai'));
		}
    }

	// edit data nilai
	public function update($id)
	{
        $this->_rules(); // panggil private function
        if ($this->form_validation->run() == FALSE) {
			$nilai = $this->nilai->get_by_id($id);
			$data = array(
                'title' => 'Data nilai',
                'subtitle' => 'Admin',
                'subtitle2' => 'Tambah Data nilai',
                'mahasiswa' => $this->db->get('mahasiswa')->result(), // ambil data mhs untuk ambil NIM
				'detail' => $nilai,
                'page' => 'admin/nilai/edit', // load halaman
            );
            $this->load->view('templates/app', $data);
		} else {
			$data = [
				'nim' => $this->input->post('nim'),
				'nilai_a' => $this->input->post('nilai_a'),
				'nilai_b' => $this->input->post('nilai_b'),
				'nilai_c' => $this->input->post('nilai_c'),
				'nilai_d' => $this->input->post('nilai_d'),
				'nilai_e' => $this->input->post('nilai_e'),
				'nilai_f' => $this->input->post('nilai_f'),
				'total' => $this->input->post('total'),
				// 'ket' => $this->input->get('klasifikasi')
			];

			$this->nilai->update($this->input->post('nilai_id', TRUE), $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Update record success!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(site_url('nilai'));
		}
    }

	// private function untuk validasi
	public function _rules(){
		$this->form_validation->set_rules('nim', 'Nomer Induk Mahasiswa', 'required', [
			'required' => 'Harap isi kolom Nomer Induk Mahasiswa',
		]);


		$this->form_validation->set_rules('nilai_a', 'Pemahaman Tentang Peran Mahasiswa Magang Dan Penyesuaian Diri', 'required', [
			'required' => 'Harap isi kolom Nilai Pemahaman Tentang Peran Mahasiswa Magang Dan Penyesuaian Diri'
		]);

		$this->form_validation->set_rules('nilai_b', 'Pemahaman Terhadap Bidang Usaha Dan Proses Bisnis Perusahaan', 'required', [
			'required' => 'Harap isi kolom Nilai Pemahaman Terhadap Bidang Usaha Dan Proses Bisnis Perusahaan'
		]);

		$this->form_validation->set_rules('nilai_c', 'Keberhasilan Pencapaian Learning Objectives Sesuai Learning Plan Yang Sudah Ditentukan', 'required', [
			'required' => 'Harap isi kolom Nilai Keberhasilan Pencapaian Learning Objectives Sesuai Learning Plan Yang Sudah Ditentukan'
		]);

		$this->form_validation->set_rules('nilai_d', 'Keluasan Wawasan Keilmuan Dan Penerapannya', 'required', [
			'required' => 'Harap isi kolom Nilai Keluasan Wawasan Keilmuan Dan Penerapannya'
		]);

		$this->form_validation->set_rules('nilai_e', 'Kemampuan Merumuskan Permasalahan Dan Rencana Pemecehan', 'required', [
			'required' => 'Harap isi kolom Nilai Kemampuan Merumuskan Permasalahan Dan Rencana Pemecehan'
		]);

		$this->form_validation->set_rules('nilai_f', 'Kemampuan Mencapai Target Pekerjaan', 'required', [
			'required' => 'Harap isi kolom Nilai Kemampuan Mencapai Target Pekerjaan'
		]);

		$this->form_validation->set_rules('total', 'Total', 'required', [
			'required' => 'Total Nilai masih belum terisi'
		]);
	}

	// delete nilai
	public function delete($id) 
    {
        $row = $this->nilai->get_by_id($id);

        if ($row) {
            $this->nilai->delete($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Delete record success!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(site_url('nilai'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nilai'));
        }
    }
}

/* End of file Nilai.php */

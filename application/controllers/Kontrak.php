<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kontrak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelKontrak', 'kontrak');
		// if(!$this->session->set_userdata('username')){
		// 	redirect('auth');
		// }
	}

	// index
	public function index()
	{
	
        $kontrak = $this->kontrak->get_all();

        $data = array(
            'title' => 'Data kontrak',
            'subtitle' => 'Admin',
            'subtitle2' => 'List kontrak',
            'kontrak_data' => $kontrak,
            'page' => 'admin/kontrak/index',
        );
        $this->load->view('templates/app', $data);
    }

	// tambah kontrak
    public function create()
	{
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
			$data = array(
                'title' => 'Data kontrak',
                'subtitle' => 'Admin',
                'subtitle2' => 'Tambah Data kontrak',
                'mahasiswa' => $this->db->get('mahasiswa')->result(),
                'page' => 'admin/kontrak/create',
            );
            $this->load->view('templates/app', $data);
		} else {
			$data = [
				'nim' => $this->input->post('nim'),
				'no_kontrak' => $this->input->post('no_kontrak'),
				'tanggal_kontrak' => $this->input->post('tanggal_kontrak'),
				'perihal' => $this->input->post('perihal'),
				'upah' => $this->input->post('upah'),
			];

			if (isset($_FILES['kontrak']['name'])) {
				$config['upload_path'] 		= './images/users/kontrak/';
				$config['allowed_types'] 	= 'pdf';
				$config['overwrite']  		= true;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('kontrak')) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Photo gagal diupload!</div>');
                    redirect('mahasiswa/create');
				} else {
					$img = $this->upload->data();
					$data['kontrak'] = $img['file_name'];
				}
			}
			$this->kontrak->insert($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Create record success!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(site_url('kontrak'));
		}
    }

	// edit kontrak
    public function update($id)
	{
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $kontrak = $this->kontrak->get_by_id($id);
			$data = array(
                'title' => 'Data kontrak',
                'subtitle' => 'Admin',
                'subtitle2' => 'Tambah Data kontrak',
                'data' => $kontrak,
                'page' => 'admin/kontrak/edit',
                'mahasiswa' => $this->db->get('mahasiswa')->result(),
            );
            $this->load->view('templates/app', $data);
		} else {
			$data = [
				'nim' => $this->input->post('nim'),
				'no_kontrak' => $this->input->post('no_kontrak'),
				'tanggal_kontrak' => $this->input->post('tanggal_kontrak'),
				'perihal' => $this->input->post('perihal'),
				'upah' => $this->input->post('upah'),
			];

			$oldKontrak = $this->input->post('ganti_kontrak');
			$path = './images/users/kontrak/';
			$config['upload_path'] 		= './images/users/kontrak/';
			$config['allowed_types'] 	= 'pdf';
			$config['overwrite']  		= true;

			$this->load->library('upload', $config);
			// Jika foto diubah
			if ($_FILES['kontrak']['name']) {
				if ($this->upload->do_upload('kontrak')) {

					@unlink($path . $oldKontrak);
					if (!$this->upload->do_upload('kontrak')) {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Photo gagal diupload!</div>');
                        redirect('kontrak/update');
					} else {
						$newKontrak = $this->upload->data();
						$data['kontrak'] = $newKontrak['file_name'];
					}
				}
			}
            // print_r($data);
            // exit();
            $this->kontrak->update($this->input->post('kontrak_id', TRUE), $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Update record success!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(site_url('kontrak'));
		}
    }

    public function _rules(){
		// validsai form yg ada
		$this->form_validation->set_rules('nim', 'Nomer Induk Mahasiswa', 'required', [
			'required' => 'Nomer Induk Mahasiswa tidak boleh kosong.',
		]);

		$this->form_validation->set_rules('no_kontrak', 'Nomor Kontrak', 'required', [
			'required' => 'Nomor Kontrak tidak boleh kosong.',
		]);

		$this->form_validation->set_rules('tanggal_kontrak', 'Tanggal Kontrak', 'required', [
			'required' => 'Tanggal Kontrak tidak boleh kosong.',
		]);

		$this->form_validation->set_rules('perihal', 'perihal', 'required', [
			'required' => 'Perihal tidak boleh kosong.',
		]);

		$this->form_validation->set_rules('upah', 'Uang Saku', 'required', [
			'required' => 'Uang Saku tidak boleh kosong.',
		]);
    }

	// hapus data kkontrak 
    public function delete($id)
	{
		$this->db->delete('kontrak', ['kontrak_id' => $id]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Delete record success!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect(site_url('kontrak'));
	}

}

/* End of file kontrak.php */
/* Location: ./application/controllers/kontrak.php */

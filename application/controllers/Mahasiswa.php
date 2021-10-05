<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelMahasiswa', 'mahasiswa');
		$this->load->model('ModelNilai', 'nilai');
		// if(!$this->session->set_userdata('username')){
		// 	redirect('auth');
		// }
	}

	// index
	public function index()
	{
	
        $mahasiswa = $this->mahasiswa->get_all();

        $data = array(
            'title' => 'Data Mahasiswa',           
			'subtitle' => 'Admin',
            'subtitle2' => 'List Mahasiswa',
            'mahasiswa_data' => $mahasiswa,
            'page' => 'admin/mahasiswa/index',
        );
        $this->load->view('templates/app', $data);
    }

	// tambah data mahasisswa
    public function create() 
    {    
        $this->_rules(); // manggil privaet function

        if ($this->form_validation->run() == FALSE) {

            $data = array(
                'title' => 'Mahasiswa',
                'subtitle' => 'Admin',
                'subtitle2' => 'Tambah Mahasiswa',
                'page' => 'admin/mahasiswa/create', // load halaman
            );
            $this->load->view('templates/app', $data);
        } else {
            $data = [
				'nama' => $this->input->post('nama', true),
				'username' => $this->input->post('username', true),
                'password' => hashEncrypt($this->input->post('password')),
				'nim' => $this->input->post('nim', true),
				'nik' => $this->input->post('nik', true),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
				'tempat_lahir' => $this->input->post('tempat_lahir', true),
				'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
				'perguruan_tinggi' => $this->input->post('perguruan_tinggi', true),
				'jurusan' => $this->input->post('jurusan', true),
				'telepon' => $this->input->post('telepon', true),
				'akun_ig' => $this->input->post('akun_ig', true),
				'akun_fb' => $this->input->post('akun_ig', true),
				'nama_keluarga' => $this->input->post('nama_keluarga', true),
				'hubungan' => $this->input->post('hubungan', true),
				'telepon_kel' => $this->input->post('telepon_kel', true),
				'bank' => $this->input->post('bank', true),
				'nomor_rek' => $this->input->post('nomor_rek', true),
				'nama_pemilik' => $this->input->post('nama_pemilik'),
				'role_id' => $this->input->post('role_id'),
				'tahun' => $this->input->post('tahun'),
				'batch' => $this->input->post('batch'),
				'divre' => $this->input->post('divre'),
				'jobdesk' => $this->input->post('jobdesk'),
				'bagian_unit' => $this->input->post('bagian_unit')
			];

			$oldPhoto = $this->input->post('ganti_gambar');
			$path = './images/users/';
			$config['upload_path'] 		= './images/users/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['overwrite']  		= true;
			
            // Jika foto diubah
			if (isset($_FILES['photo']['name'])) {
				$config['upload_path'] 		= './images/users/';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['overwrite']  		= true;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('photo')) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Photo gagal diupload!</div>');
                    redirect('mahasiswa/create');
				} else {
					$img = $this->upload->data();
					$data['photo'] = $img['file_name'];
				}

                $this->mahasiswa->insert($data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Create record success!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect(site_url('mahasiswa'));
			}
        }
    }
	
	// read data mahasiswaa
    public function read($id) 
    {    
        $mahasiswa = $this->mahasiswa->get_by_id($id); // ambil by nim = id

        $data = array(
            'title' => 'Data Mahasiswa',
            'subtitle' => 'Admin',
            'subtitle2' => 'List Mahasiswa',
            'data' => $mahasiswa,
            'page' => 'admin/mahasiswa/read',
        );
        $this->load->view('templates/app', $data);
    }


	// update mahasiswa
    public function update($id) 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $mahasiswa = $this->mahasiswa->get_by_id($id);  // ambil data mhs by id 

            $data = array(
                'title' => 'Data Mahasiswa',
                'subtitle' => 'Admin',
                'subtitle2' => 'List Mahasiswa',
                'data' => $mahasiswa,
                'page' => 'admin/mahasiswa/edit',
            );
            $this->load->view('templates/app', $data);
        } else {
            $data = [
				'nama' => $this->input->post('nama', true),
				'username' => $this->input->post('username', true),
				'nim' => $this->input->post('nim', true),
				'nik' => $this->input->post('nik', true),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
				'tempat_lahir' => $this->input->post('tempat_lahir', true),
				'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
				'perguruan_tinggi' => $this->input->post('perguruan_tinggi', true),
				'jurusan' => $this->input->post('jurusan', true),
				'telepon' => $this->input->post('telepon', true),
				'akun_ig' => $this->input->post('akun_ig', true),
				'akun_fb' => $this->input->post('akun_ig', true),
				'nama_keluarga' => $this->input->post('nama_keluarga', true),
				'hubungan' => $this->input->post('hubungan', true),
				'telepon_kel' => $this->input->post('telepon_kel', true),
				'bank' => $this->input->post('bank', true),
				'nomor_rek' => $this->input->post('nomor_rek', true),
				'nama_pemilik' => $this->input->post('nama_pemilik'),
				'role_id' => $this->input->post('role_id'),
				'tahun' => $this->input->post('tahun'),
				'batch' => $this->input->post('batch'),
				'divre' => $this->input->post('divre'),
				'jobdesk' => $this->input->post('jobdesk'),
				'bagian_unit' => $this->input->post('bagian_unit')
			];

			$oldPhoto = $this->input->post('ganti_gambar');
			$path = './images/users/';
			$config['upload_path'] 		= './images/users/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['overwrite']  		= true;

			$this->load->library('upload', $config);
			// Jika foto diubah
			if ($_FILES['photo']['name']) {
				if ($this->upload->do_upload('photo')) {

					@unlink($path . $oldPhoto);
					if (!$this->upload->do_upload('photo')) {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Photo gagal diupload!</div>');
						redirect('mahasiswa/update');
					} else {
						$newPhoto = $this->upload->data();
						$data['photo'] = $newPhoto['file_name'];
					}
				}
			}

            $this->mahasiswa->update($this->input->post('nim', TRUE), $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Update record success!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(site_url('mahasiswa'));
        }
    }
    
    
    public function _rules(){
        $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required', [
			'required' => 'Harap isi kolom Nama Mahasiswa',
		]);
    }

	// menghapus mahasiswa
    public function delete($id) 
    {
        $row = $this->mahasiswa->get_by_id($id); // cek data by id

        if ($row) {
            $this->mahasiswa->delete($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Delete record success!</div>');
            redirect(site_url('mahasiswa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa'));
        }
    }

    public function print($id){
    	$mahasiswa = $this->mahasiswa->get_by_id($id);
		$nilai = $this->nilai->get_by_id($id);	
		// var_dump($nilai);
		// die()
        $data = array(
			'data' => $mahasiswa,
			'nilai'=> $nilai
		);
        
		$html =  $this->load->view('admin/mahasiswa/cetak_data', $data);
    }


	// belum kelar, niatnya pengin bikin toggle untuk aktif nonaktif user
	// ditable mahasiswa ada status, 0 aktif : 1 nonaktif, 
	public function toggle($id)
    {	
		$id = $this->mahasiswa->get_by_id($id);
		$status = $this->mahasiswa->get('mahasiswa', ['nim' => $id])['status'];
		// var_dump($status);
		// exit();
		$data = $status ? 0 : 1; //Jika user aktif maka nonaktifkan, begitu pula sebaliknya
        $pesan = $data ? 'user diaktifkan.' : 'user dinonaktifkan.';
		
		$this->mahasiswa->update($id, $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Update record success!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
		</div>');
		redirect(site_url('mahasiswa'));
    }
}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */
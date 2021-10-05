<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Halaman Login'
			];
			$this->load->view('auth/login', $data, FALSE);
		}else{
			// private function
			$this->_login();
		}
	}

	private function _login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$mahasiswa = $this->db->get_where('mahasiswa', ['username' => $username])->row_array();
		
		if($mahasiswa){
			// check password
			if(password_verify($password, $mahasiswa['password'])){
				$data = [
 					'username' => $mahasiswa['username'],
 					'nama' => $mahasiswa['nama'],
					 'nim' => $mahasiswa['nim'],
 					'role_id' => $mahasiswa['role_id']
				];

				$this->session->set_userdata($data);
				// role id 1 admin, 2dst role untuk mahasiswa
				if($mahasiswa['role_id'] == 1){
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="aler">Berhasil Login!</div>');
					redirect('dashboard');
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="aler">Berhasil Login!, '.$this->session->userdata('nama').'</div>');
					redirect('user/dashboard');
				}
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="aler">Password Salah!</div>');
					redirect('auth');
			}
		}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="aler">Username tidak terdaftar!</div>');
					redirect('auth');
		}
	}

	// logout, menghentikan session yg ada
	public function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="aler">Berhasil Logout!</div>');
		redirect('auth');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */

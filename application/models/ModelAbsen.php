<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAbsen extends CI_Model {

    // ngebaca table keseluruhan
	public function get_all(){
		$this->db->select('*');
		return $this->db->get('mahasiswa')->result();
	}
	// ngebaca table by nim
	  public function get_by_id($id)
    {   
        $this->db->where('nim', $id);
        $query = $this->db->get('mahasiswa');
        return $query->row();
    }

    // tambah data absen
    public function addNewAbsen($tgl){
        // ngecek ada absen ngga di hari tersebut, kalo ngga ada bakal diinput 
        if (!$tgl){
            $tgl = date('Y-m-d');
        }
        $data = [
            "nim" => $this->input->post('nim'),
            "tgl_absen" => $tgl,
            "keterangan_kerja" =>  $this->input->post('keterangan_kerja'),
            "waktu_masuk" => $this->input->post('jam_masuk', true).":".$this->input->post('menit_masuk', true),
            "waktu_keluar" => $this->input->post('jam_keluar', true).":".$this->input->post('menit_keluar', true)
        ];

        return $this->db->insert('absensi', $data);
    }

    // ngebaca table absen
      public function getAbsen()
    {   
        $this->db->where(['nim' => $_SESSION['nim'], 'tgl_absen' => date('Y-m-d')]);
        return $this->db->get('absensi')->row_array();
    }

    // add absen masuk
    public function checkInPegawai($lat, $long){

        $data = [
            "nim" => $_SESSION['nim'],
            "tgl_absen" => date('Y-m-d'),
            "waktu_masuk" => date("H:i"),
            "lat_masuk" => $lat,
            "long_masuk" => $long
        ];

        return $this->db->insert('absensi', $data);
    }

    // add absen pulang
    public function checkOutPegawai($lat, $long){
        $nim = $_SESSION['nim'];
        $tanggal = date('Y-m-d');
        $data = [
            "waktu_keluar" => date("H:i"),
            "lat_keluar" => $lat,
            "long_keluar" => $long
        ];

        $this->db->where(["nim" => $nim, "tgl_absen" => $tanggal]);
        return $this->db->update('absensi' , $data);
    }

    // add absen pulang ketika mahasiswa lupa absen pulang
    public function addAbsenPulang($tgl)
    {
        // ngecek ada absen pulang ngga di hari tersebut, kalo ngga ada bakal diinput 
        if (!$tgl) {
            $tgl = date('Y-m-d');
        }
        $data = [
            // "nim" => $_SESSION['nim'],
            //"tgl_absen" => $tgl,
            //"waktu_masuk" => $this->input->post('jam_masuk', true).":".$this->input->post('menit_masuk', true),
            "waktu_keluar" => $this->input->post('jam_keluar', true) . ":" . $this->input->post('menit_keluar', true)
        ];
        $this->db->where(["nim" => $this->input->post('nim'), "tgl_absen" => $tgl]);
        return $this->db->update('absensi', $data);
    }

    // tentu saja untuk edit
    public function editAbsen($tgl)
    {

		// ngecek ada absen ngga di hari tersebut, kalo ngga ada bakal diinput 
        if (!$tgl) {
            $tgl = date('Y-m-d');
        }


        $data = [
            "nim" => $this->input->post('nim'),
            "tgl_absen" => $tgl,
            "keterangan_kerja" =>  $this->input->post('keterangan_kerja'),
            "waktu_masuk" => $this->input->post('jam_masuk', true) . ":" . $this->input->post('menit_masuk', true),
            "waktu_keluar" => $this->input->post('jam_keluar', true) . ":" . $this->input->post('menit_keluar', true)
        ];
        // var_dump($data);
        // die();
        $this->db->where(["nim" => $this->input->post('nim'), "tgl_absen" => $tgl]);
        return $this->db->update('absensi', $data);
    }


    // add aktivitas dari sisi admin
    public function addPekerjaan($tgl){
        if (!$tgl){
            $tgl = date('Y-m-d');
        }
        $data = [
            "nim" => $_SESSION['nim'],
            "tgl_aktivitas" => $tgl,
            "jam_mulai" => $this->input->post('start_h', true).":".$this->input->post('start_m', true),
            "jam_selesai" => $this->input->post('end_h', true).":".$this->input->post('end_m', true),
            "isi_aktivitas" => $this->input->post('pekerjaan', true),
            "waktu_input" => date("H:i"),
            "lokasi_input" => ""
        ];

        return $this->db->insert('aktivitas', $data);
    }

    // public function addNewAbsenUser($tgl){
    //     if (!$tgl){
    //         $tgl = date('Y-m-d');
    //     }
    //     $data = [
    //         "nim" => $_SESSION['nim'],
    //         "tgl_absen" => $tgl,
    //         "waktu_masuk" => $this->input->post('jam_masuk', true).":".$this->input->post('menit_masuk', true),
    //         "waktu_keluar" => $this->input->post('jam_keluar', true).":".$this->input->post('menit_keluar', true)
    //     ];

    //     return $this->db->insert('absensi', $data);
    // }

  
}

/* End of file ModelAbsen.php */
/* Location: ./application/models/ModelAbsen.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAktivitas extends CI_Model {

    // public $table = 'aktivitas';
    // public $id = 'aktivitas_id';
    // public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select('*');
        return $this->db->get('mahasiswa')->result();
    }

    // get data by id
    public function get_by_id($id)
    {   
        $this->db->where('nim', $id);
        $query = $this->db->get('mahasiswa');
        return $query->row();
    }

     public function get_by_aktivitas($id)
    {   
        $this->db->select('*');
        $this->db->where('nim', $id);
        return $this->db->get('aktivitas')->result_array();
    }



    function addAktivitas($tgl)
    {   
         if (!$tgl){
            $tgl = date('Y-m-d');
        }
        $data = [
            "nim" => $this->input->post('nim', true),
            "tgl_aktivitas" => $tgl,
            "jam_mulai" => $this->input->post('start_h', true).":".$this->input->post('start_m', true),
            "jam_selesai" => $this->input->post('end_h', true).":".$this->input->post('end_m', true),
            "isi_aktivitas" => $this->input->post('pekerjaan', true),
            "waktu_input" => date("H:i"),
        ];

        return $this->db->insert('aktivitas', $data);
    }
    
     public function ubahAktivitas($id){
        $data = [
            "nim" => $this->input->post('nim', true),
            "jam_mulai" => $this->input->post('start_h', true).":".$this->input->post('start_m', true),
            "jam_selesai" => $this->input->post('end_h', true).":".$this->input->post('end_m', true),
            "isi_aktivitas" => $this->input->post('pekerjaan', true),
            "waktu_input" => date("H:i"),
            // "lokasi_input" => ""
        ];

        $this->db->where('aktivitas_id' , $id);
        return $this->db->update('aktivitas', $data);
    }
    
     function addAktivitasUser($tgl)
    {   
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
        ];

        return $this->db->insert('aktivitas', $data);
    }
    
     public function ubahAktivitasUser($id){
        $data = [
            "nim" => $_SESSION['nim'],
            "jam_mulai" => $this->input->post('start_h', true).":".$this->input->post('start_m', true),
            "jam_selesai" => $this->input->post('end_h', true).":".$this->input->post('end_m', true),
            "isi_aktivitas" => $this->input->post('pekerjaan', true),
            "waktu_input" => date("H:i"),
            // "lokasi_input" => ""
        ];

        $this->db->where('aktivitas_id' , $id);
        return $this->db->update('aktivitas', $data);
    }

      public function hapusDataAktivitas($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('aktivitas', ['aktivitas_id' => $id]);
    }
}


/* End of file Modelaktivitas.php */
/* Location: ./application/models/Modelaktivitas.php */

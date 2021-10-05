<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelIzin extends CI_Model {

    // public $table = 'izin';
    // public $id = 'izin_id';
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
    function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->join('mahasiswa', 'mahasiswa.nim=izin.nim');
        $this->db->where('mahasiswa.nim', $id);
		return $this->db->get('izin')->result();
    }

    // tambah izin user user

    function izin_user($id){
        $this->db->select('*');
        $this->db->from('izin');
        $this->db->join('mahasiswa', 'izin.nim = mahasiswa.nim'); // join by nim
        $this->db->where('mahasiswa.nim', $id);
        $this->db->order_by('izin.izin_id', 'desc');
        return $this->db->get();
    }



}


/* End of file Modelizin.php */
/* Location: ./application/models/Modelizin.php */

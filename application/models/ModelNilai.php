<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelNilai extends CI_Model {

    // public $table = 'nilai';
    // public $id = 'nilai_id';
    // public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select('*');
        $this->db->join('mahasiswa', 'mahasiswa.nim=nilai.nim');
        $this->db->order_by('mahasiswa.nama', 'ASC');
        return $this->db->get('nilai')->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('*');
         $this->db->join('mahasiswa', 'mahasiswa.nim=nilai.nim');
        $this->db->where('nilai_id', $id);
        return $this->db->get('nilai')->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('nilai_id', $q);
		$this->db->or_like('nilai_id', $q);
		$this->db->from('nilai');
        return $this->db->count_all_results();
    }


    // insert data
    function insert($data)
    {
        $this->db->insert('nilai', $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where('nilai_id', $id);
        $this->db->update('nilai', $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where('nilai_id', $id);
        $this->db->delete('nilai');
    }

}


/* End of file Modelnilai.php */
/* Location: ./application/models/Modelnilai.php */

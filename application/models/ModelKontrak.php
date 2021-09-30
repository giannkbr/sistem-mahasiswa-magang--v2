<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelKontrak extends CI_Model {

    // public $table = 'kontrak';
    // public $id = 'kontrak_id';
    // public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select('*');
        $this->db->join('mahasiswa', 'mahasiswa.nim=kontrak.nim');
        $this->db->order_by('mahasiswa.nama', 'ASC');
        return $this->db->get('kontrak')->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->where('kontrak_id', $id);
        return $this->db->get('kontrak')->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('kontrak_id', $q);
		$this->db->or_like('kontrak_id', $q);
		$this->db->from('kontrak');
        return $this->db->count_all_results();
    }


    // insert data
    function insert($data)
    {
        $this->db->insert('kontrak', $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where('kontrak_id', $id);
        $this->db->update('kontrak', $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where('kontrak_id', $id);
        $this->db->delete('kontrak');
    }

}


/* End of file Modelkontrak.php */
/* Location: ./application/models/Modelkontrak.php */

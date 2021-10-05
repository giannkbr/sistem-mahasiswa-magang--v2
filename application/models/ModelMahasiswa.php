<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMahasiswa extends CI_Model {

    // public $table = 'mahasiswa';
    // public $id = 'nim';
    // public $order = 'DESC';
    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }
    
    // get all
    function get_all()
    {   
        // $this->db->select('*');
        // $this->db->where('status', '1');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('mahasiswa')->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->where('nim', $id);
        return $this->db->get('mahasiswa')->row();
    }
    
    // get total rows
    // function total_rows($q = NULL) {
    //     $this->db->like('nim', $q);
	// 	$this->db->or_like('nama', $q);
	// 	$this->db->from('mahasiswa');
    //     return $this->db->count_all_results();
    // }


    // insert data
    function insert($data)
    {
        $this->db->insert('mahasiswa', $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where('nim', $id);
        $this->db->update('mahasiswa', $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where('nim', $id);
        $this->db->delete('mahasiswa');
    }

}


/* End of file ModelMahasiswa.php */
/* Location: ./application/models/ModelMahasiswa.php */
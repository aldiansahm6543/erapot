<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function input($data1){
		$this->db->insert('user', $data1);
	}	

	public function get(){
		$this->db->order_by('__active', 'ASC');
		return $this->db->get('user')->result();
	}

	public function getid($id){
		return $this->db->get_where('user', ['iduser' => $id])->row();
	}

	public function create($id,$data)
	{
		$this->db->where('iduser', $id);
		$this->db->update('user', $data);
	}

	public function cari()
	{
		$keyword = $this->input->post('cari', true);
		$this->db->from('user');
		$this->db->like('nama', $keyword );
		$this->db->or_like('username', $keyword );
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
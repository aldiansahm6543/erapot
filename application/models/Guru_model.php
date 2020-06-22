<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model {

	public function get()
	{
		$this->db->order_by('nama');
		return $this->db->get('guru')->result();
	}

	public function input($data)
	{
		$this->db->insert('guru',$data);
	}	

	public function getid($id)
	{
		return $this->db->get_where('guru', ['idguru' => $id])->row();
	}

	public function getg($id)
	{
		$this->db->select('*');
		 $this->db->from('guru');
		 $this->db->join('mapel','mapel.kodemapel=guru.kodemapel');
		 $this->db->where('idguru', $id);
		 $query = $this->db->get();
		 return $query->row();
	}

	public function delete($id)
	{
		$this->db->delete('guru', ['idguru' => $id]);
	}

	public function cari()
	{
		$keyword = $this->input->post('cari', true);
		$this->db->from('guru');
		$this->db->like('nama', $keyword );
		$this->db->or_like('nip', $keyword );
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Guru_model.php */
/* Location: ./application/models/Guru_model.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

	public function get()
	{
		 $this->db->select('*');
		 $this->db->from('siswa');
		 $this->db->join('kelas','kelas.kodekelas=siswa.kodekelas');
		 $query = $this->db->get();
		 return $query->result();
	}

	public function input($data)
	{
		$this->db->insert('siswa',$data);
	}	

	public function getid($id)
	{
		return $this->db->get_where('siswa', ['idsiswa' => $id])->row();
	}
	public function getu($id)
	{
		 $this->db->select('*');
		 $this->db->from('siswa');
		 $this->db->join('kelas','kelas.kodekelas=siswa.kodekelas');
		 $this->db->where('idsiswa', $id);
		 $query = $this->db->get();
		 return $query->row();
	}

	public function delete($id)
	{
		$this->db->delete('siswa', ['idsiswa' => $id]);
	}

	public function cari()
	{
		$keyword = $this->input->post('cari', true);
		$this->db->from('siswa');
		$this->db->like('nama', $keyword );
		$this->db->or_like('nisn', $keyword );
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Siswa_model.php */
/* Location: ./application/models/Siswa_model.php */
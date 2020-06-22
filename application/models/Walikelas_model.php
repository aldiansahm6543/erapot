<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Walikelas_model extends CI_Model {

	public function get() {
		 $this->db->select('*');
		 $this->db->from('walikelas');
		 $this->db->join('guru','guru.idguru=walikelas.idguru');
		 $this->db->join('kelas','kelas.kodekelas=walikelas.kodekelas');
		 $query = $this->db->get();
		 return $query->result();
	}	

	public function getid($id)
	{
		return $this->db->get_where('walikelas', ['idwalikelas' => $id])->row();
	}

	public function input($data)
	{
		$this->db->insert('walikelas',$data);
	}	

	public function update($id, $data)
	{
		$this->db->where(['idwalikelas' => $id]);
		$this->db->update('walikelas', $data);
	}

	public function delete($id)
	{
		$this->db->delete('walikelas', ['idwalikelas' => $id]);
	}

	public function cari()
	{
		$keyword = $this->input->post('cari', true);
		$this->db->select('*');
		$this->db->from('walikelas');
		$this->db->join('guru','guru.idguru=walikelas.idguru');
		$this->db->join('kelas','kelas.kodekelas=walikelas.kodekelas');
		$this->db->like('nama', $keyword );
		$this->db->or_like('tingkat', $keyword );
		$this->db->or_like('jurusan', $keyword );
		$this->db->or_like('ruangkelas', $keyword );
		$query = $this->db->get();
		return $query->result();
	}

	public function getsiswa()
	{
		 $this->db->select('*');
	 	$this->db->from('walikelas');
	 	$this->db->join('guru','guru.idguru=walikelas.idguru');
	 	$this->db->join('siswa', 'siswa.kodekelas=walikelas.kodekelas');
	 	$this->db->where(['nip' => $this->session->userdata('username')]);
		return $this->db->get()->result();
	}

	public function getnilai($id){
		$this->db->select('*');
	 	$this->db->from('nilai');
	 	$this->db->join('siswa', 'siswa.idsiswa=nilai.idsiswa');
	 	$this->db->where(['nilai.idsiswa' => $id]);
		return $this->db->get()->result();
	}

	public function siswa($id){
		return $this->db->get_where('siswa', ['idsiswa' => $id])->row();
	}
	// public function getsiswa()
	// {
	// 	 $this->db->select('*');
	//  	$this->db->from('walikelas');
	//  	$this->db->join('guru','guru.idguru=walikelas.idguru');
	//  	$this->db->where(['nip' => $this->session->userdata('username')]);
	// 	return $this->db->get()->result();
	// }

	// public function getnilai(){
	// 	$this->db->select('*');
	//  	$this->db->from('nilai');
	//  	$this->db->join('siswa','siswa.idsiswa=nilai.idsiswa');
	//  	$this->db->join('guru','guru.idguru=nilai.idguru');
	//  	$this->db->where(['nip' => $this->session->userdata('username')]);
	// 	return $this->db->get()->result();
	// }

}

/* End of file Walikelas_model.php */
/* Location: ./application/models/Walikelas_model.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function getguru()
	{
		$this->db->select('*');
		$this->db->from('guru');
		$this->db->join('mapel','mapel.kodemapel=guru.kodemapel');
		$this->db->where(['nip' => $this->session->userdata('username')]);
		$query = $this->db->get();
		return $query->row();
	}

	public function getsiswa(){
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('kelas','kelas.kodekelas=siswa.kodekelas');
		$this->db->where(['nisn' => $this->session->userdata('username')]);
		$query = $this->db->get();
		return $query->row();
	}

	public function getwalas() {
		 $this->db->select('*');
		 $this->db->from('walikelas');
		 $this->db->join('guru','guru.idguru=walikelas.idguru');
		 $this->db->join('kelas','kelas.kodekelas=walikelas.kodekelas');
		 $this->db->where(['nip' => $this->session->userdata('username')]);
		 $query = $this->db->get();
		 return $query->row();
	}
}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */
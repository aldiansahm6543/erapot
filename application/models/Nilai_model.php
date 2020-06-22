<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_model extends CI_Model {

	public function get($id){
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('siswa','siswa.idsiswa=nilai.idsiswa');
		$this->db->join('guru', 'guru.idguru=nilai.idguru');
		$this->db->join('kelas','kelas.kodekelas=nilai.kodekelas');
		$this->db->where(['tingkat' => $id, 'nip'=>$this->session->userdata('username')]);
		$query = $this->db->get();
		return $query->result();
	}
	public function getn($id){
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('siswa','siswa.idsiswa=nilai.idsiswa');
		$this->db->join('guru', 'guru.idguru=nilai.idguru');
		$this->db->join('kelas','kelas.kodekelas=nilai.kodekelas');
		$this->db->where(['tingkat' => $id, 'nisn'=>$this->session->userdata('username')]);
		$query = $this->db->get();
		return $query->result();
	}
	public function getj($id){
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('siswa','siswa.idsiswa=nilai.idsiswa');
		$this->db->join('guru', 'guru.idguru=nilai.idguru');
		$this->db->join('kelas','kelas.kodekelas=nilai.kodekelas');
		$this->db->where(['tingkat' => $id, 'nisn'=>$this->session->userdata('username'), 'semester'=>'genap']);
		$query = $this->db->get();
		return $query->result();
	}
	public function getg($id){
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('siswa','siswa.idsiswa=nilai.idsiswa');
		$this->db->join('guru', 'guru.idguru=nilai.idguru');
		$this->db->join('kelas','kelas.kodekelas=nilai.kodekelas');
		$this->db->where(['tingkat' => $id, 'nisn'=>$this->session->userdata('username'), 'semester'=>'ganjil']);
		$query = $this->db->get();
		return $query->result();
	}
	public function getc($id){
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('siswa','siswa.idsiswa=nilai.idsiswa');
		$this->db->join('kelas','kelas.kodekelas=nilai.kodekelas');
		$this->db->where(['tingkat' => $id, 'nisn'=>$this->session->userdata('username')]);
		$query = $this->db->get();
		return $query->result();
	}

	public function getsiswa($id){
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('kelas','kelas.kodekelas=siswa.kodekelas');
		$this->db->where(['tingkat' => $id]);
		$query = $this->db->get();
		return $query->result();
	}

	public function getnilai($d){
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('siswa','siswa.idsiswa=nilai.idsiswa');
		$this->db->join('kelas','kelas.kodekelas=nilai.kodekelas');
		$this->db->where(['idnilai' => $d]);
		$query = $this->db->get();
		return $query->row();
	}

	public function getid($id){
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('kelas','kelas.kodekelas=siswa.kodekelas');
		$this->db->where(['idsiswa' => $id]);
		$query = $this->db->get();
		return $query->row();
	}

	public function input($data){
		$this->db->insert('nilai', $data);
	}

	public function delete($id){
		$this->db->delete('nilai', ['idnilai' => $id]);
	}

	public function update($d,$data){
		$this->db->where('idnilai', $d);
		$this->db->update('nilai', $data);
	}

	public function cari($id)
	{
		$keyword = $this->input->post('cari', true);
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('siswa','siswa.idsiswa=nilai.idsiswa');
		$this->db->join('guru', 'guru.idguru=nilai.idguru');
		$this->db->join('kelas','kelas.kodekelas=nilai.kodekelas');
		$this->db->where(['tingkat' => $id, 'nip'=>$this->session->userdata('username')]);
		$this->db->like('siswa.nama', $keyword );
		$this->db->or_like('jurusan', $keyword );
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Nilai_model.php */
/* Location: ./application/models/Nilai_model.php */
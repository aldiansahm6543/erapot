<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_model extends CI_Model {

	public function get(){
		$this->db->order_by('kodekelas');
		return $this->db->get('kelas')->result();
	}

	public function input($data)
	{
		$this->db->insert('kelas',$data);
	}	

	public function getid($kode)
	{
		return $this->db->get_where('kelas', ['kodekelas' => $kode])->row();
	}

	public function update($kode,$data)
	{
		$this->db->where('kodekelas', $kode);
		$this->db->update('kelas', $data);
	}

	public function delete($kode)
	{
		$this->db->delete('kelas', ['kodekelas' => $kode]);
	}

	public function kode(){
		  $this->db->select('RIGHT(kelas.kodekelas,2) as kode', FALSE);
		  $this->db->order_by('kodekelas','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('kelas');  //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
			   //cek kode jika telah tersedia    
			   $data = $query->row();      
			   $kode = intval($data->kode) + 1; 
		  }
		  else{      
			   $kode = 1;  //cek jika kode belum terdapat pada table
		  }
		  $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
		  $kodetampil = "RK".$batas;  //format kode
		  return $kodetampil;  
	}
	public function cari()
	{
		$keyword = $this->input->post('cari', true);
		$this->db->from('kelas');
		$this->db->like('jurusan', $keyword );
		$this->db->or_like('kodekelas', $keyword );
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Mapel_model.php */
/* Location: ./application/models/Mapel_model.php */
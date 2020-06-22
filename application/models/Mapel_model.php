<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel_model extends CI_Model {

	public function get(){
		$this->db->order_by('kodemapel');
		return $this->db->get('mapel')->result();
	}

	public function input($data)
	{
		$this->db->insert('mapel',$data);
	}	

	public function getid($kode)
	{
		return $this->db->get_where('mapel', ['kodemapel' => $kode])->row();
	}

	public function update($kode,$data)
	{
		$this->db->where('kodemapel', $kode);
		$this->db->update('mapel', $data);
	}

	public function delete($kode)
	{
		$this->db->delete('mapel', ['kodemapel' => $kode]);
	}

	public function kode(){
		  $this->db->select('RIGHT(mapel.kodemapel,2) as kode', FALSE);
		  $this->db->order_by('kodemapel','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('mapel');  //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
			   //cek kode jika telah tersedia    
			   $data = $query->row();      
			   $kode = intval($data->kode) + 1; 
		  }
		  else{      
			   $kode = 1;  //cek jika kode belum terdapat pada table
		  }
		  $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
		  $kodetampil = "MP".$batas;  //format kode
		  return $kodetampil;  
	}
	public function cari()
	{
		$keyword = $this->input->post('cari', true);
		$this->db->from('mapel');
		$this->db->like('namamapel', $keyword );
		$this->db->or_like('kodemapel', $keyword );
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Mapel_model.php */
/* Location: ./application/models/Mapel_model.php */
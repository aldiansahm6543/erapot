<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$logged_in = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(empty($logged_in))
		{
			redirect('auth');
		}
		if($level != 'admin')
		{
			redirect('auth');
		}
		$this->load->model('Mapel_model', 'mapel');
	}

	public function index()
	{
		$data['title'] = 'list';
		$data['judul'] = "Data Matapelajaran";
		$data['mapel'] = $this->mapel->get();
		if ($this->input->post('cari')) {
			$data['mapel'] = $this->mapel->cari();
		}
		$data['page'] = 'admin/mapel/list';
		view('template/content', $data);
	}

	public function input(){
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'input mapel';
			$data['judul'] = "Input Matapelajaran";
			$data['kodemapel'] = $this->mapel->kode();
			$data['page'] = 'admin/mapel/input';
			view('template/content', $data);
		} else {
			$data = [
				'kodemapel' => $this->input->post('kodemapel', true),
				'namamapel' => $this->input->post('namamapel', true),
				'kelompok' => $this->input->post('kelompok', true)
			];
			$this->mapel->input($data);
			$this->session->set_flashdata('info', 'Data mapel berhasil ditambahkan');
			redirect('admin/mapel');
		}
	}

	public function update($kode = '')
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'edit mapel';
			$data['judul'] = "Edit Matapelajaran";
			$data['kelompok'] = ['Muatan nasional' , 'Kejuruan', 'Muatan lokal'];
			$data['mapel'] = $this->mapel->getid($kode);
			$data['page'] = 'admin/mapel/update';
			view('template/content', $data);
		} else {
			$data = [
				'kodemapel' => $this->input->post('kodemapel', true),
				'namamapel' => $this->input->post('namamapel', true),
				'kelompok' => $this->input->post('kelompok', true)
			];
			$this->mapel->update($kode,$data);
			$this->session->set_flashdata('info', 'Data mapel berhasil diupdate');
			redirect('admin/mapel');
		}
	}

	public function delete($kode){
		$this->mapel->delete($kode);
		$this->session->set_flashdata('info', 'Data mapel berhasil dihapus');
		redirect('admin/mapel');
	}


	private function _rules()
	{
		$this->form_validation->set_rules('namamapel', 'Nama Mapel', 'trim|required');
		$this->form_validation->set_rules('kodemapel', 'Kode Mapel', 'trim|required');
		$this->form_validation->set_rules('kelompok', 'Kelompok', 'trim|required');
	}

}

/* End of file Mapel.php */
/* Location: ./application/controllers/admin/Mapel.php */
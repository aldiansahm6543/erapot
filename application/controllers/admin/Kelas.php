<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

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
		$this->load->model('Kelas_model', 'kelas');
	}

	public function index()
	{
		$data['title'] = 'list';
		$data['judul'] = "Data Ruang Kelas";
		$data['kelas'] = $this->kelas->get();
		if ($this->input->post('cari')) {
			$data['kelas'] = $this->kelas->cari();
		}
		$data['page'] = 'admin/kelas/list';
		view('template/content', $data);
	}

	public function input(){
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'input kelas';
			$data['judul'] = "Input Ruang Kelas";
			$data['kodekelas'] = $this->kelas->kode();
			$data['page'] = 'admin/kelas/input';
			view('template/content', $data);
		} else {
			$data = [
				'kodekelas' => $this->input->post('kodekelas', true),
				'tingkat' => $this->input->post('tingkat', true),
				'jurusan' => $this->input->post('jurusan', true),
				'ruangkelas' => $this->input->post('ruangkelas', true)
			];
			$this->kelas->input($data);
			$this->session->set_flashdata('info', 'Data kelas berhasil ditambahkan');
			redirect('admin/kelas');
		}
	}

	public function update($kode = '')
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'input kelas';
			$data['judul'] = "Edit Ruang kelas";
			$data['kelas'] = $this->kelas->getid($kode);
			$data['page'] = 'admin/kelas/update';
			view('template/content', $data);
		} else {
			$data = [
				'tingkat' => $this->input->post('tingkat', true),
				'jurusan' => $this->input->post('jurusan', true),
				'ruangkelas' => $this->input->post('ruangkelas', true)
			];
			$this->kelas->update($kode,$data);
			$this->session->set_flashdata('info', 'Data kelas berhasil diupdate');
			redirect('admin/kelas');
		}
	}

	public function delete($kode){
		$this->kelas->delete($kode);
		$this->session->set_flashdata('info', 'Data kelas berhasil dihapus');
		redirect('admin/kelas');
	}


	private function _rules()
	{
		$this->form_validation->set_rules('kodekelas', 'Kode kelas', 'trim|required');
		$this->form_validation->set_rules('tingkat', 'Tingkat', 'trim|required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');
		$this->form_validation->set_rules('ruangkelas', 'Ruang Kelas', 'trim|required');
	}

}

/* End of file Mapel.php */
/* Location: ./application/controllers/admin/Mapel.php */
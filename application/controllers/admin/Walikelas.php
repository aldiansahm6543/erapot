<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Walikelas extends CI_Controller {

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
		$this->load->model('Walikelas_model', 'walas');
		$this->load->model('Guru_model', 'guru');
		$this->load->model('Kelas_model', 'kelas');
		$this->load->model('User_model', 'user');
	}

	public function index()
	{
		$data['title'] = 'list';
		$data['judul'] = "Data Walikelas";
		$data['walas'] = $this->walas->get();
		if ($this->input->post('cari')) {
			$data['walas'] = $this->walas->cari();
		}
		$data['page'] = 'admin/walikelas/list';
		view('template/content', $data);
	}

	public function input(){
		$this->_rules();
		$this->form_validation->set_rules('idguru', 'Guru', 'trim|required|is_unique[walikelas.idguru]', [
			'is_unique' => 'Guru yang kamu pilih sudah terdaftar menjadi Walikelas!'
		]);
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'input walas';
			$data['judul'] = "Input Walikelas";
			$data['guru'] = $this->guru->get();
			$data['kelas'] = $this->kelas->get();
			$data['page'] = 'admin/walikelas/input';
			view('template/content', $data);
		} else {
			$guru = $this->db->get_where('guru', ['idguru' => $this->input->post('idguru')])->row_array();
			$nip = $guru['nip'];
			$nama = $guru['nama'];
			$data = [
				'idguru' => $this->input->post('idguru', true),
				'kodekelas' => $this->input->post('kodekelas', true)
			];
			$data1 = [
				'username' => $nip,
				'nama' => $nama,
				'level' => 'walikelas',
				'__active' => 0,
				'__create' => date('Y-m-d H:i:s')
			];

			$this->user->input($data1);
			$this->walas->input($data);
			$this->session->set_flashdata('info', 'Walikelas berhasil ditambahkan');
			redirect('admin/walikelas');
		}
	}

	public function update($id = '')
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'edit walas';
			$data['judul'] = "Edit data Walikelas";
			$data['guru'] = $this->guru->get();
			$data['kelas'] = $this->kelas->get();
			$data['walas'] = $this->walas->getid($id);
			$data['page'] = 'admin/walikelas/update';
			view('template/content', $data);
		} else {
			$data = [
				'kodekelas' => $this->input->post('kodekelas')
			];
			$this->walas->update($id,$data);
			$this->session->set_flashdata('info', 'Data walikelas berhasil diupdate');
			redirect('admin/walikelas');
		}
	}

	public function delete($id){
		$this->walas->delete($id);
		$this->session->set_flashdata('info', 'Data walikelas berhasil dihapus');
		redirect('admin/walikelas');
	}


	private function _rules()
	{
		
		$this->form_validation->set_rules('kodekelas', 'Kelas', 'trim|required|is_unique[walikelas.kodekelas]', [
			'is_unique' => 'Kelas yang kamu pilih sudah memiliki Walikelas!'
		]);
	}

}

/* End of file Mapel.php */
/* Location: ./application/controllers/admin/Mapel.php */
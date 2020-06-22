<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$logged_in = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(empty($logged_in))
		{
			redirect('auth');
		}
		if($level != 'guru')
		{
			redirect('auth');
		}
		$this->load->model('Siswa_model', 'siswa');
		$this->load->model('Kelas_model', 'kelas');
		$this->load->model('Guru_model', 'user');
		$this->load->model('Nilai_model', 'nilai');
		$this->load->model('Auth_model', 'auth');
	}

	public function siswa($id)
	{
		$data['guru'] = $this->auth->getguru();
		$data['title'] = 'guru';
		$data['id'] = $id;
		$data['judul'] = "Data nilai";
		$data['user'] = $this->nilai->get($id);
		$data['siswa'] = $this->siswa->get();
		if ($this->input->post('cari')) {
			$data['user'] = $this->nilai->cari($id);
		}
		$data['page'] = 'guru/nilai/list';
		view('template/content', $data);
	}

	public function kelas($id)
	{
		$data['guru'] = $this->auth->getguru();
		$data['title'] = 'guru';
		$data['id'] = $id;
		$data['judul'] = "Data nilai";
		$data['user'] = $this->nilai->getsiswa($id);
		if ($this->input->post('cari')) {
			$data['user'] = $this->nilai->cari();
		}
		$data['page'] = 'guru/nilai/input';
		view('template/content', $data);
	}

	public function input($id=''){
		$data['guru'] = $this->auth->getguru();
		$data['siswa'] = $this->nilai->getid($id);
		$nama = $data['siswa']->nama;
		$tingkat = $data['siswa']->tingkat;
		$idguru = $data['guru']->idguru;
		$this->form_validation->set_rules('semester', 'Semester', 'trim|required');
		$this->form_validation->set_rules('tugas', 'Tugas', 'trim|required|numeric');
		$this->form_validation->set_rules('uts', 'Uts', 'trim|required|numeric');
		$this->form_validation->set_rules('uas', 'Uas', 'trim|required|numeric');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'guru';
			$data['id'] = $id;
			$data['judul'] = "Input nilai";
			$data['siswa'] = $this->nilai->getid($id);
			$data['page'] = 'guru/nilai/tambah';
			view('template/content', $data);
		} else {
			$tugas = $this->input->post('tugas');
			$uts = $this->input->post('uts');
			$uas = $this->input->post('uas');
			$nilai = ($tugas + $uts + $uas) / 3;
			$data = [
				'idsiswa' => $id,
				'kodekelas' => $this->input->post('kodekelas'),
				'idguru' => $idguru,
				'namamapel' => $this->input->post('namamapel'),
				'semester' => $this->input->post('semester'),
				'tahunajaran' => $this->input->post('tahunajaran'),
				'tugas' => $this->input->post('tugas'),
				'uts' => $this->input->post('uts'),
				'uas' => $this->input->post('uas'),
				'rata' => substr($nilai,0,5)
			];
			$this->nilai->input($data);
			$this->session->set_flashdata('info', 'Nilai ' . $nama . ' berhasil ditambahkan');
			redirect('guru/nilai/siswa/' . $tingkat);
		}
		
	}

	public function delete10($id){
		$data['guru'] = $this->auth->getguru();
		$this->nilai->delete($id);
		$this->session->set_flashdata('info', 'Nilai berhasil dihapus');
		redirect('guru/nilai/siswa/' . 10);
	}

	public function delete11($id){
		$data['guru'] = $this->auth->getguru();
		$this->nilai->delete($id);
		$this->session->set_flashdata('info', 'Nilai berhasil dihapus');
		redirect('guru/nilai/siswa/' . 11);
	}
	public function delete12($id){
		$data['guru'] = $this->auth->getguru();
		$this->nilai->delete($id);
		$this->session->set_flashdata('info', 'Nilai berhasil dihapus');
		redirect('guru/nilai/siswa/' . 12);
	}

	public function update($d='', $id)
	{
		$data['guru'] = $this->auth->getguru();
		$data['id'] = $id;
		$this->form_validation->set_rules('semester', 'Semester', 'trim|required');
		$this->form_validation->set_rules('tugas', 'Tugas', 'trim|required|numeric');
		$this->form_validation->set_rules('uts', 'Uts', 'trim|required|numeric');
		$this->form_validation->set_rules('uas', 'Uas', 'trim|required|numeric');
		if ($this->form_validation->run() == FALSE) {
			$data['semester'] = ['ganjil' , 'genap'];
			$data['title'] = 'guru';
			$data['id'] = $id;
			$data['judul'] = "Edit nilai";
			$data['siswa'] = $this->nilai->getnilai($d);
			$data['page'] = 'guru/nilai/update';
			view('template/content', $data);
		} else {
			$tugas = $this->input->post('tugas');
			$uts = $this->input->post('uts');
			$uas = $this->input->post('uas');
			$nilai = ($tugas + $uts + $uas) / 3;
			$data = [
				'semester' => $this->input->post('semester'),
				'tugas' => $this->input->post('tugas'),
				'uts' => $this->input->post('uts'),
				'uas' => $this->input->post('uas'),
				'rata' => substr($nilai,0,5)
			];
			$this->nilai->update($d,$data);
			$this->session->set_flashdata('info', 'Nilai berhasil diupdate');
			redirect('guru/nilai/siswa/' . $id);
		}
	}

}

/* End of file nilai.php */
/* Location: ./application/controllers/guru/nilai.php */
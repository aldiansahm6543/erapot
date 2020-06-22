<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$logged_in = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(empty($logged_in))
		{
			redirect('auth');
		}
		if($level != 'walimurid')
		{
			redirect('auth');
		}

		$this->load->model('Auth_model', 'auth');
	}

	public function index()
	{
		$data['title'] = 'siswa';
		$data['siswa'] = $this->auth->getsiswa();
		$data['judul'] = 'Profil';
		$data['page'] = 'siswa/profil';
		view('template/content', $data);
	}

	public function edit()
	{
		$data['title'] = 'siswa';
		$data['siswa'] = $this->auth->getsiswa();
		$data['judul'] = 'Editprofil';
		$data['page'] = 'siswa/editprofil';
		view('template/content', $data);
	}

	public function password()
	{
		$data['title'] = 'siswa';
		$data['siswa'] = $this->auth->getsiswa();
		$d = $data['siswa']->nisn;
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
	        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == FALSE) {
        	$data['judul'] = 'Editprofil';
			$data['page'] = 'siswa/editprofil';
			view('template/content', $data);
        } else {
			$da = [
				'password' => md5($this->input->post('password1')),
			];
			$this->db->where('username', $d);
			$this->db->update('user', $da);
			$this->session->set_flashdata('info', 'berhasil ubah password');
			redirect('siswa/profil');
        }
	}
	public function ubah()
	{
		$data['title'] = 'siswa';
		$data['siswa'] = $this->auth->getsiswa();
		$d = $data['siswa']->nisn;
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
        	$data['judul'] = 'Editprofil';
			$data['page'] = 'siswa/editprofil';
			view('template/content', $data);
        } else {
			$da = [
				'nama' => $this->input->post('nama'),
			];
			if ($this->input->post('email')) {
				$email = $this->input->post('email');
				$this->db->set('email', $email);
				$this->db->where('nisn', $d);
				$this->db->update('siswa', $da);
			}
			$this->db->where('username', $d);
			$this->db->update('user', $da);
			$this->session->set_flashdata('info', 'berhasil ubah profil');
			redirect('siswa/profil');
        }
	}

}
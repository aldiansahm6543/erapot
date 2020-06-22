<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		view('home');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$user = $this->db->get_where('user', ['username' => $username])->row_array();
		if ($user) {
			if ($user['__active'] == 1) {
				if ($user['password'] == $password) {
					$data = [
						'logged_in' => true,
						'iduser' => $user['iduser'],
						'username' => $user['username'],
						'nama' => $user['nama'],
						'level' => $user['level']
					];
					$this->session->set_userdata($data);
					if ($user['level'] == 'admin') {
						redirect('admin/dashboard');
					}
					elseif ($user['level'] == 'guru') {
						redirect('guru/profil');
					}
					elseif ($user['level'] == 'walimurid') {
						redirect('siswa/profil');
					}
					elseif ($user['level'] == 'walikelas') {
						redirect('walikelas/profil');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">this user has not been activated!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">user is not registered</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		session_destroy();
		redirect('auth');
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$this->load->model('guru_model', 'guru');
		$this->load->model('Siswa_model', 'siswa');
		$this->load->model('User_model', 'user');
	}

	public function index()
	{
		$data['title'] = 'admin';
		$data['judul'] = "Data user";
		$data['user'] = $this->user->get();
		if ($this->input->post('cari')) {
			$data['user'] = $this->user->cari();
		}
		$data['page'] = 'admin/user/list';
		view('template/content', $data);
	}

	public function create($id='')
	{
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'admin';
			$data['judul'] = "Buat akun";
			$data['user'] = $this->user->getid($id);
			$data['page'] = 'admin/user/create';
			view('template/content', $data);
		} else {
			$data = [
				'password' => md5($this->input->post('password1')),
				'__active' => 1
			];
			$this->user->create($id,$data);
			$this->session->set_flashdata('info', 'Akun bernama ' . $this->input->post('nama') . ' berhasil buat');
			redirect('admin/user');
		}
	}

	public function delete($id)
	{
		$this->db->set(['__active' => 0]);
		$this->db->where(['iduser' => $id]);
		$this->db->update('user');
		$this->session->set_flashdata('info', 'berhasil menonaktifkan akun');
		redirect('admin/user');
	}

}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */
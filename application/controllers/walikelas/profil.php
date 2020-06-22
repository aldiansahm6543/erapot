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
		if($level != 'walikelas')
		{
			redirect('auth');
		}
		$this->load->model('Auth_model', 'auth');
	}

	public function index()
	{
		$data['title'] = 'walikelas';
		$data['guru'] = $this->auth->getguru();
		$data['walas'] = $this->auth->getwalas();
		$data['judul'] = 'Profil';
		$data['page'] = 'walikelas/profil';
		view('template/content', $data);
	}

}
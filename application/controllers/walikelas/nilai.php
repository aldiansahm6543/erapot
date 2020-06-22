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
		if($level != 'walikelas')
		{
			redirect('auth');
		}

		$this->load->model('Walikelas_model', 'walas');
		$this->load->model('Auth_model', 'auth');
	}

	public function index()
	{
		$data['title'] = 'walikelas';
		$data['guru'] = $this->auth->getguru();
		$data['judul'] = 'Data Siswa';
		$data['nilai'] = $this->walas->getsiswa(); 
		$data['page'] = 'walikelas/nilai/list';
		view('template/content', $data);
	}

	public function upload($id){
		$data['title'] = 'walikelas';
		$data['guru'] = $this->auth->getguru();
		$data['judul'] = 'Data Nilai'; 
		$data['siswa'] = $this->walas->siswa($id);
		$data['nilai'] = $this->walas->getnilai($id);
		$data['page'] = 'walikelas/nilai/upload';
		view('template/content', $data);
	}

	public function send($id){
		$data['title'] = 'walikelas';
		$data['guru'] = $this->auth->getguru();
		$data['siswa'] = $this->db->get_where('siswa', ['idsiswa'=>$id])->row();
		$email = $data['siswa']->email;
		if ($email != NULL) {
			$this->_sendmail($email);
		}
		$this->db->where('idsiswa', $id);
		$this->db->update('nilai', ['status' => 1]);
		$this->session->set_flashdata('info', 'Nilai berhasil diupload');
		redirect('walikelas/nilai');
	}

	public function _sendmail($email){
		$data['siswa'] = $this->db->get_where('siswa', ['email' => $email])->row();
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'erapot.official@gmail.com',
            'smtp_pass' => 'rapot123',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n",
        ];

        $this->email->initialize($config);
        $url = "<?= base_url() ?>";

        $this->email->from('erapot.official@gmail.com', 'E-Rapot');
        $this->email->to($email);

        $this->email->subject('Nilai ' . $data['siswa']->nama);
        $this->email->message('<br><br>' . $data['siswa']->nama . '<br><br> Nisn : ' . $data['siswa']->nisn . '<br> jeniskelamin : ' . $data['siswa']->jeniskelamin .'<br> tahun ajaran : ' . $data['siswa']->tahunajaran .'<br> agama : ' . $data['siswa']->agama . '<br><br> silakan login lihat nilai anda <a href="' . base_url() .'">Login</a>');
        
        if ($this->email->send()) {
            return true;
        } else {
            echo '<script>alert("gagal mengirim email, koneksi terlalu buruk")</script>';
			echo '<script>location="' . base_url('walikelas/nilai/upload') . '"</script>';
        }
	}

}
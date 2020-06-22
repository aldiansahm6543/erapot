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
		if($level != 'walimurid')
		{
			redirect('auth');
		}
		$this->load->model('Kelas_model', 'kelas');
		$this->load->model('Nilai_model', 'nilai');
		$this->load->model('Auth_model', 'auth');
	}

	public function kelas($id)
	{
		$data['title'] = 'list';
		$data['id'] = $id;
		$data['siswa'] = $this->auth->getsiswa();
		$data['judul'] = "Data nilai";
		$data['ganjil'] = $this->nilai->getg($id);
		$data['genap'] = $this->nilai->getj($id);
		if ($this->input->post('cari')) {
			$data['user'] = $this->nilai->cari($id);
		}
		$data['page'] = 'siswa/nilai';
		view('template/content', $data);
	}

	public function cetak($id)
	{
		$data['title'] = 'siswa';
		$data['siswa'] = $this->auth->getsiswa();
		$data['user'] = $this->nilai->getg($id);
		$data['semester'] = 'Ganjil';
		$this->load->view('siswa/cetak',$data);
		
     //    require_once(base_url() . '/asset/html2pdf/html2pdf.class.php');
	    // $pdf = new HTML2PDF('P','A4','en');
	    // $pdf->WriteHTML($html);
	    // $pdf->Output('Rapot.pdf', 'D');
	}

	public function cetakg($id)
	{
		$data['title'] = 'siswa';
		$data['siswa'] = $this->auth->getsiswa();
		$data['user'] = $this->nilai->getj($id);
		$data['semester'] = 'Genap';
		$this->load->view('siswa/cetak',$data);

		
     //    require_once(base_url() . '/asset/html2pdf/html2pdf.class.php');
	    // $pdf = new HTML2PDF('P','A4','en');
	    // $pdf->WriteHTML($html);
	    // $pdf->Output('Rapot.pdf', 'D');
	}

}

/* End of file nilai.php */
/* Location: ./application/controllers/guru/nilai.php */
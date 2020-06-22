<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

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
		$this->load->model('Siswa_model', 'siswa');
		$this->load->model('Kelas_model', 'kelas');
		$this->load->model('User_model', 'user');
	}

	public function index()
	{
		$data['title'] = 'admin';
		$data['judul'] = "Data siswa";
		$data['siswa'] = $this->siswa->get();
		if ($this->input->post('cari')) {
			$data['siswa'] = $this->siswa->cari();
		}
		$data['page'] = 'admin/siswa/list';
		view('template/content', $data);
	}
	public function input()
	{
		$this->_rules();
		$this->form_validation->set_rules('nisn', 'nisn', 'trim|required|max_length[10]|min_length[10]|numeric|is_unique[siswa.nisn]', [
			'is_unique' => 'This nisn has already registration!'
		]);
		$this->form_validation->set_rules('ttl1', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('ttl2', 'Tanggal Lahir', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'admin';
			$data['judul'] = "Input Data siswa";
			$data['kelas'] = $this->kelas->get();
			$data['page'] = 'admin/siswa/input';
			view('template/content', $data);
		} else {
			$this->load->library('upload');
			$config['upload_path'] = './asset/img/siswa/'; //path folder
    		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
   			 $config['encrypt_name'] = FALSE; //nama yang terupload nantinya

   			 $this->upload->initialize($config);
    		if(!empty($_FILES['foto']['name'])){
        		if ($this->upload->do_upload('foto')){
        			$gbr = $this->upload->data();
            		//Compress Image
		            $config['image_library']='gd2';
		            $config['source_image']='./asset/img/siswa/'.$gbr['file_name'];
		            $config['create_thumb']= FALSE;
		            $config['maintain_ratio']= FALSE;
		            $config['quality']= '60%';
		            $config['max_size']  = '2048';
		            $config['new_image']= './asset/img/siswa/'.$gbr['file_name'];
		            $this->load->library('image_lib', $config);
		            $this->image_lib->resize();

					$ttl1 = $this->input->post('ttl1',true);
					$ttl2 = $this->input->post('ttl2',true);
					$data = [
						'nama' => $this->input->post('nama',true),
						'nisn' => $this->input->post('nisn',true),
						'kodekelas' => $this->input->post('kodekelas',true),
						'jeniskelamin' => $this->input->post('jeniskelamin',true),
						'agama' => $this->input->post('agama', true),
						'tahunajaran' => $this->input->post('tahunajaran', true),
						'ttl' => $ttl1 . ',' .' '.$ttl2,
						'alamat' => $this->input->post('alamat',true),
						'foto' => $gbr['file_name'],
						'__active' => 1,
						'__create' => date('Y-m-d H:i:s')
					];
					$data1 = [
						'username' => $this->input->post('nisn'),
						'nama' => $this->input->post('nama'),
						'level' => 'walimurid',
						'__active' => 0,
						'__create' => date('Y-m-d H:i:s')
					];

					$this->user->input($data1);
					$this->siswa->input($data);
					$this->session->set_flashdata('info', 'Data siswa berhasil ditambahkan');
					redirect('admin/siswa');
				}else{
					echo "error";
	    		}
			}else {
				echo "error";
			}
		}
			
	}

	public function update($id = '')
    {
        $this->_rules();
		$this->form_validation->set_rules('ttl', 'Tempat Tanggal Lahir', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
        	if ($this->input->post('submit')) {
            $idsiswa = $this->input->post('idsiswa');
			$siswa['user'] = $this->db->get_where('siswa', ['idsiswa' => $idsiswa])->row_array();
				$data = [
					'nama' => $this->input->post('nama',true),
					'nisn' => $this->input->post('nisn',true),
					'kodekelas' => $this->input->post('kodekelas',true),
					'jeniskelamin' => $this->input->post('jeniskelamin',true),
					'agama' => $this->input->post('agama', true),
					'tahunajaran' => $this->input->post('tahunajaran', true),
					'ttl' => $this->input->post('ttl', true),
					'alamat' => $this->input->post('alamat',true),
					'__update' => date('Y-m-d H:i:s')
				];
				$upload_image = $_FILES['foto']['name'];

				if ($upload_image) {
					$config['upload_path'] = FCPATH . 'asset/img/siswa/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size']  = '2048';

					$this->load->library('upload', $config);
	        		if ($this->upload->do_upload('foto')){
	        			$old_image = $siswa['user']['foto'];
							unlink(FCPATH . 'asset/img/siswa/' . $old_image);

						$new_image = $this->upload->data('file_name');
						$this->db->set('foto', $new_image);
					} else {
						echo $this->upload->display_errors();
					}
				}	
				$this->db->where('nisn', $this->input->post('nisn'));
				$this->db->update('siswa', $data);
				$this->session->set_flashdata('info', 'berhasil diubah');
				redirect('admin/siswa');
        	}
        } else {
	        $data['title'] = 'admin';
			$data['judul'] = "Edit Data siswa";
			$data['jeniskelamin'] = ['laki-laki' , 'perempuan'];
			$data['kelas'] = $this->kelas->get();
			$data['siswa'] = $this->siswa->getid($id);
			$data['page'] = 'admin/siswa/update';
			view('template/content', $data);
        }
        if (!$data["siswa"]) show_404();
    }

	public function delete($id)
	{
		$siswa['user'] = $this->db->get_where('siswa', ['idsiswa' => $id])->row_array();
		$old_image = $siswa['user']['foto'];
		unlink(FCPATH . 'asset/img/siswa/' . $old_image);
		$this->siswa->delete($id);
		$this->session->set_flashdata('info', 'Data siswa berhasil dihapus');
		redirect('admin/siswa');
	}




	private function _rules()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('tahunajaran', 'Tahun Ajaran', 'trim|required');
		$this->form_validation->set_rules('kodekelas', 'Kelas', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('jeniskelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
	}

	public function detail($id){
		$data['title'] = 'admin';
		$data['judul'] = "Edit Data siswa";
		$data['jeniskelamin'] = ['laki-laki' , 'perempuan'];
		$data['kelas'] = $this->kelas->get();
		$data['siswa'] = $this->siswa->getu($id);
		$data['page'] = 'admin/siswa/detail';
		view('template/content', $data);
	}

}

/* End of file siswa.php */
/* Location: ./application/controllers/admin/siswa.php */
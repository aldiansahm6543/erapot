<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

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
		$this->load->model('Mapel_model', 'mapel');
		$this->load->model('User_model', 'user');
	}

	public function index()
	{
		$data['title'] = 'admin';
		$data['judul'] = "Data Guru";
		$data['guru'] = $this->guru->get();
		if ($this->input->post('cari')) {
			$data['guru'] = $this->guru->cari();
		}
		$data['page'] = 'admin/guru/list';
		view('template/content', $data);
	}
	public function input()
	{
		$this->_rules();
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required|max_length[10]|min_length[10]|numeric|is_unique[guru.nip]', [
			'is_unique' => 'This NIP has already registration!'
		]);
		$this->form_validation->set_rules('ttl1', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('ttl2', 'Tanggal Lahir', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'admin';
			$data['judul'] = "Input Data Guru";
			$data['mapel'] = $this->mapel->get();
			$data['page'] = 'admin/guru/input';
			view('template/content', $data);
		} else {
			$this->load->library('upload');
			$config['upload_path'] = './asset/img/guru/'; //path folder
    		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
   			 $config['encrypt_name'] = FALSE; //nama yang terupload nantinya

   			 $this->upload->initialize($config);
    		if(!empty($_FILES['foto']['name'])){
        		if ($this->upload->do_upload('foto')){
        			$gbr = $this->upload->data();
            		//Compress Image
		            $config['image_library']='gd2';
		            $config['source_image']='./asset/img/guru/'.$gbr['file_name'];
		            $config['create_thumb']= FALSE;
		            $config['maintain_ratio']= FALSE;
		            $config['quality']= '60%';
		            $config['max_size']  = '2048';
		            $config['new_image']= './asset/img/guru/'.$gbr['file_name'];
		            $this->load->library('image_lib', $config);
		            $this->image_lib->resize();

					$ttl1 = $this->input->post('ttl1',true);
					$ttl2 = $this->input->post('ttl2',true);
					$data = [
						'nama' => $this->input->post('nama',true),
						'nip' => $this->input->post('nip',true),
						'kodemapel' => $this->input->post('kodemapel',true),
						'jeniskelamin' => $this->input->post('jeniskelamin',true),
						'agama' => $this->input->post('agama', true),
						'ttl' => $ttl1 . ',' .' '.$ttl2,
						'alamat' => $this->input->post('alamat',true),
						'foto' => $gbr['file_name'],
						'__active' => 1,
						'__create' => date('Y-m-d H:i:s')
					];
					$data1 = [
						'username' => $this->input->post('nip'),
						'nama' => $this->input->post('nama'),
						'level' => 'guru',
						'__active' => 0,
						'__create' => date('Y-m-d H:i:s')
					];

					$this->user->input($data1);
					$this->guru->input($data);
					$this->session->set_flashdata('info', 'Data guru berhasil ditambahkan');
					redirect('admin/guru');
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
            $idguru = $this->input->post('idguru');
			$guru['user'] = $this->db->get_where('guru', ['idguru' => $idguru])->row_array();
				$data = [
					'nama' => $this->input->post('nama',true),
					'nip' => $this->input->post('nip',true),
					'kodemapel' => $this->input->post('kodemapel',true),
					'jeniskelamin' => $this->input->post('jeniskelamin',true),
					'agama' => $this->input->post('agama', true),
					'ttl' => $this->input->post('ttl', true),
					'alamat' => $this->input->post('alamat',true),
					'__update' => date('Y-m-d H:i:s')
				];
				$upload_image = $_FILES['foto']['name'];

				if ($upload_image) {
					$config['upload_path'] = FCPATH . 'asset/img/guru/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']  = '2048';

					$this->load->library('upload', $config);
	        		if ($this->upload->do_upload('foto')){
	        			$old_image = $guru['user']['foto'];
							unlink(FCPATH . 'asset/img/guru/' . $old_image);

						$new_image = $this->upload->data('file_name');
						$this->db->set('foto', $new_image);
					} else {
						echo $this->upload->display_errors();
					}
				}	
				$this->db->where('nip', $this->input->post('nip'));
				$this->db->update('guru', $data);
				$this->session->set_flashdata('info', 'berhasil diubah');
				redirect('admin/guru');
        	}
        } else {
	        $data['title'] = 'admin';
			$data['judul'] = "Edit Data Guru";
			$data['jeniskelamin'] = ['laki-laki' , 'perempuan'];
			$data['mapel'] = $this->mapel->get();
			$data['guru'] = $this->guru->getid($id);
			$data['page'] = 'admin/guru/update';
			view('template/content', $data);
        }
        if (!$data["guru"]) show_404();
    }

	public function delete($id)
	{
		$guru['user'] = $this->db->get_where('guru', ['idguru' => $id])->row_array();
		$old_image = $guru['user']['foto'];
		unlink(FCPATH . 'asset/img/guru/' . $old_image);
		$this->guru->delete($id);
		$this->session->set_flashdata('info', 'Data guru berhasil dihapus');
		redirect('admin/guru');
	}

	public function detail($id)
	{
		$data['title'] = 'admin';
		$data['judul'] = "Detail Guru";
		$data['guru'] = $this->guru->getg($id);
		$data['page'] = 'admin/guru/detail';
		view('template/content', $data);
	}



	private function _rules()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('kodemapel', 'Nama Mapel', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('jeniskelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
	}

}

/* End of file guru.php */
/* Location: ./application/controllers/admin/guru.php */
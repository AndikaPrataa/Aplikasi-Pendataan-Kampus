<?php 

class Daftar_nilai extends CI_Controller
{
	
	public function __construct(){
	parent::__construct();

	if ($this->session->userdata('hak_akses') !='2') {
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong class="text-bold">Anda Belum Login</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('login');
		}
	}
	
	public function index()
	{
		$data['nilai']=$this->model_nilai->tampil_data()->result();
		$this->load->view('user/halaman_daftar_nilai', $data);
	}


	public function detail($id)
	{
		$this->load->model('model_nilai');
		$detail=$this->model_nilai->detail_data($id);
		$data['detail']=$detail;
		$this->load->view('user/detail_daftar_nilai', $data);
	}
}
 ?>
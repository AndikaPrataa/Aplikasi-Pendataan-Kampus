<?php 

class Data_pengguna extends CI_Controller
{
	public function __construct(){
	parent::__construct();

	if ($this->session->userdata('hak_akses') !='1') {
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
		$data['pengguna']=$this->model_pengguna->tampil_data()->result();
		$this->load->view('admin/data_pengguna', $data);
	}

		public function tambah_data()
	{
		$this->load->view('admin/form_tambahdata_pengguna');
	}

	public function tambah_dataAksi()
	{
		$this-> _rules();
		if ($this->form_validation->run()== FALSE){
			$this->tambah_data();
		}else{
		$nama			= $this->input->post('nama');
		$username		= $this->input->post('username');

		$data=array(
			'nama' 			=> $nama,
			'username'	=> $ussername,

		);

		$this->model_pengguna->tambah_data($data, 'pengguna');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong class="text-bold">Data Berhasil di Tambah</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('admin/data_pengguna');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('username', 'username', 'required');
	}

	

	public function updateData($id)
	{
		$where=array('id_pengguna'=>$id);
		$data['title'] = "Edit Data Pengguna";
		$data['pengguna'] = $this->model_pengguna->edit_data($where)->result();
		$this->load->view('admin/edit_pengguna', $data);
	}

	public function edit_dataAksi()
	{
		$id 				= $this->input->post('id_pengguna');
		$nama				= $this->input->post('nama');
		$username			= $this->input->post('username');


		$data=array(
			'nama' 			=> $nama,
			'username'		=> $username,


		);
		$where=array(
			'id_pengguna' => $id
		);

		$this->model_pengguna->update_data($where, $data, 'pengguna');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong class="text-bold">Data Berhasil di Update</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('admin/data_pengguna');
	}

	public function hapus($id)
	{
		$where=array('id_pengguna' => $id);
		$this->model_pengguna->hapus_data($where, 'pengguna');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong class="text-bold">Data Berhasil di Hapus</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('admin/data_pengguna');
	}

}
 ?>
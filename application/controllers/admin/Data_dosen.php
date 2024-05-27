<?php 

class Data_dosen extends CI_Controller
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
		$data['dosen'] = $this->model_dosen->tampil_data()->result();
		$this->load->view('admin/halaman_data_dosen', $data);
	}

	public function tambah_data()
	{
		$this->load->view('admin/form_tambahdata_dosen');
	}

	public function tambah_dataAksi()
	{
		$this-> _rules();
		if ($this->form_validation->run()== FALSE){
			$this->tambah_data();
		}else{
			$nama_dosen			= $this->input->post('nama_dosen');
			$nidn				= $this->input->post('nidn');
			$fakultas			= $this->input->post('fakultas');
			$mata_kuliah		= $this->input->post('mata_kuliah');

			$data=array(
			'nama_dosen' 		=> $nama_dosen,
			'nidn'				=> $nidn,
			'fakultas'			=> $fakultas,
			'mata_kuliah'		=> $mata_kuliah,
		);

		$this->model_dosen->tambah_data($data,'dosen');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong class="text-bold">Data Berhasil di Tambahkan</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('admin/data_dosen');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_dosen', 'Nama Dosen', 'required');
		$this->form_validation->set_rules('nidn', 'NIDN', 'required');
		$this->form_validation->set_rules('fakultas', 'Fakultas', 'required');
		$this->form_validation->set_rules('mata_kuliah', 'Mata Kuliah', 'required');
	}

	public function updateData($id)
	{
		$where=array('id_dosen'=>$id);
		$data['title']="Form Edit Dosen";
		$data['dosen']=$this->model_dosen->edit_data($where)->result();
		$this->load->view('admin/edit_dosen', $data);
	}

	public function edit_dataAksi()
	{
		$id 				= $this->input->post('id_dosen');
		$nama_dosen			= $this->input->post('nama_dosen');
		$nidn				= $this->input->post('nidn');
		$fakultas			= $this->input->post('fakultas');
		$mata_kuliah		= $this->input->post('mata_kuliah');

		$data=array(
		
		'nama_dosen' 		=> $nama_dosen,
		'nidn'				=> $nidn,
		'fakultas'			=> $fakultas,
		'mata_kuliah'		=> $mata_kuliah,
		);

		$where=array(
			'id_dosen' => $id
		);

		$this->model_dosen->update_data($where, $data,'dosen');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong class="text-bold">Data Berhasil di Update</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('admin/data_dosen');
		
	}

	public function hapus($id)
	{
		$where=array('id_dosen' => $id);
		$this->model_dosen->hapus_data($where, 'dosen');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong class="text-bold">Data Berhasil di Hapus</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('admin/data_dosen');
	}

	public function detail($id)
	{
		$this->load->model('model_dosen');
		$detail=$this->model_dosen->detail_data($id);
		$data['detail']=$detail;
		$this->load->view('admin/detail_dosen', $data);
	}
}
 ?>
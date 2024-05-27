<?php 

class Data_pegawai extends CI_Controller
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
		$data['pegawai']=$this->model_pegawai->tampil_data()->result();
		$this->load->view('admin/halaman_data_pegawai', $data);
	}

	public function tambah_data()
	{
		$this->load->view('admin/form_tambahdata_pegawai');
	}

	public function updateData($id)
	{
		$where=array('id_pegawai'=>$id);
		$data['title'] = "Edit Data Pegawai";
		$data['pegawai'] = $this->model_pegawai->edit_data($where)->result();
		$this->load->view('admin/edit_pegawai', $data);
	}

	public function tambah_dataAksi()
	{
		$this-> _rules();
		if ($this->form_validation->run()== FALSE){
			$this->tambah_data();
		}else{
		$id 				= $this->input->post('id_pegawai');
		$nama_pegawai		= $this->input->post('nama_pegawai');
		$tempat_lahir		= $this->input->post('tempat_lahir');
		$tanggal_lahir		= $this->input->post('tanggal_lahir');
		$bagian_kerja		= $this->input->post('bagian_kerja');

		$data=array(
			'nama_pegawai' 		=> $nama_pegawai,
			'tempat_lahir'		=> $tempat_lahir,
			'tanggal_lahir'		=> $tanggal_lahir,
			'bagian_kerja'		=> $bagian_kerja,

		);

		$this->model_pegawai->tambah_data($data, 'pegawai');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong class="text-bold">Data Berhasil di Tambah</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('admin/data_pegawai');
		}
	}

	public function edit_dataAksi()
	{
		$id 				= $this->input->post('id_pegawai');
		$nama_pegawai		= $this->input->post('nama_pegawai');
		$tempat_lahir		= $this->input->post('tempat_lahir');
		$tanggal_lahir		= $this->input->post('tanggal_lahir');
		$bagian_kerja		= $this->input->post('bagian_kerja');

		$data=array(
			'nama_pegawai' 		=> $nama_pegawai,
			'tempat_lahir'		=> $tempat_lahir,
			'tanggal_lahir'		=> $tanggal_lahir,
			'bagian_kerja'		=> $bagian_kerja,

		);
		$where=array(
			'id_pegawai' => $id
		);

		$this->model_pegawai->update_data($where, $data, 'pegawai');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong class="text-bold">Data Berhasil di Update</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('admin/data_pegawai');
	}

	public function hapus($id)
	{
		$where=array('id_pegawai' => $id);
		$this->model_pegawai->hapus_data($where, 'pegawai');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong class="text-bold">Data Berhasil di Hapus</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('admin/data_pegawai');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('bagian_kerja', 'Bagian Kerja', 'required');
	}

	public function detail($id)
	{
		$this->load->model('model_pegawai');
		$detail=$this->model_pegawai->detail_data($id);
		$data['detail']=$detail;
		$this->load->view('admin/detail_pegawai', $data);
	}
}

 ?>
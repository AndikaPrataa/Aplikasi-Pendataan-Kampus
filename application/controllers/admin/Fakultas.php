<?php 

class Fakultas extends CI_Controller
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
		$data['fakultas']=$this->model_fakultas->tampil_data()->result();
		$this->load->view('admin/fakultas', $data);
	}

	public function tambah_data()
	{
		$this->load->view('admin/form_tambahdata_fakultas');
	}

	public function tambah_dataAksi()
	{
		$this-> _rules();
		if ($this->form_validation->run()== FALSE){
			$this->tambah_data();
		}else{
		$kode				= $this->input->post('kode');
		$nama_fakultas		= $this->input->post('nama_fakultas');

		$data=array(
			'kode' 			=> $kode,
			'nama_fakultas'	=> $nama_fakultas,

		);

		$this->model_fakultas->tambah_data($data, 'fakultas');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong class="text-bold">Data Berhasil di Tambah</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('admin/fakultas');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode', 'Kode', 'required');
		$this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required');
	}

	public function edit_dataAksi()
	{
		$id 				= $this->input->post('id_fakultas');
		$kode				= $this->input->post('kode');
		$nama_fakultas		= $this->input->post('nama_fakultas');


		$data=array(
			'kode' 			=> $kode,
			'nama_fakultas'	=> $nama_fakultas,


		);
		$where=array(
			'id_fakultas' => $id
		);

		$this->model_fakultas->update_data($where, $data, 'fakultas');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong class="text-bold">Data Berhasil di Update</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('admin/fakultas');
	}

	public function updateData($id)
	{
		$where=array('id_fakultas'=>$id);
		$data['title'] = "Edit Data Fakultas";
		$data['fakultas'] = $this->model_fakultas->edit_data($where)->result();
		$this->load->view('admin/edit_fakultas', $data);
	}

	public function hapus($id)
	{
		$where=array('id_fakultas' => $id);
		$this->model_fakultas->hapus_data($where, 'fakultas');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong class="text-bold">Data Berhasil di Hapus</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('admin/fakultas');
	}

}
 ?>
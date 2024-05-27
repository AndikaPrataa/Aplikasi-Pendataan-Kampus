<?php 
class Mahasiswa extends CI_Controller {

	public function __construct(){
	parent::__construct();

	if ($this->session->userdata('hak_akses') !='3') {
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
		$data['mahasiswa'] = $this->model_mahasiswa->tampil_data()->result();
		$this->load->view('dosen/data-mahasiswa', $data);
	}

public function tambah_dataAksi()
	{
		$this-> _rules();
		if ($this->form_validation->run()== FALSE){
			$this->tambah_data();
		}else{
		$nama			= $this->input->post('nama');
		$tempat_lahir	= $this->input->post('tempat_lahir');
		$tanggal_lahir	= $this->input->post('tanggal_lahir');
		$no_telp		= $this->input->post('no_telp');
		$fakultas		= $this->input->post('fakultas');

		$data=array(
			'nama' 			=> $nama,
			'tempat_lahir'	=> $tempat_lahir,
			'tanggal_lahir'	=> $tanggal_lahir,
			'no_telp'		=> $no_telp,
			'fakultas'		=> $fakultas,
		);

		$this->model_mahasiswa->tambah_data($data,'mahasiswa');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong class="text-bold">Data Berhasil di Tambahkan</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('dosen/mahasiswa');
		}
	}

public function updateData($id)
	{
		$where=array('id_mahasiswa'=>$id);
		$data['title'] = "Edit Data Mahasiswa";
		$data['mahasiswa'] = $this->model_mahasiswa->edit_data($where)->result();
		$this->load->view('dosen/edit_mahasiswa', $data);
	}

public function edit_dataAksi()
	{
		$id 			= $this->input->post('id_mahasiswa');
		$nama			= $this->input->post('nama');
		$tempat_lahir	= $this->input->post('tempat_lahir');
		$tanggal_lahir	= $this->input->post('tanggal_lahir');
		$no_telp		= $this->input->post('no_telp');
		$fakultas		= $this->input->post('fakultas');

		$data=array(
			'nama' 			=> $nama,
			'tempat_lahir'	=> $tempat_lahir,
			'tanggal_lahir'	=> $tanggal_lahir,
			'no_telp'		=> $no_telp,
			'fakultas'		=> $fakultas,
		);
		$where=array(
			'id_mahasiswa' => $id
		);

		$this->model_mahasiswa->update_data($where, $data, 'mahasiswa');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong class="text-bold">Data Berhasil di Update</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('dosen/mahasiswa');
	}

public function hapus($id)
	{
		$where=array('id_mahasiswa' => $id);
		$this->model_mahasiswa->hapus_data($where, 'mahasiswa');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong class="text-bold">Data Berhasil di Hapus</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('dosen/mahasiswa');
	}

	public function tambah_data()
	{
		$this->load->view('dosen/form_tambahdata_mahasiswa');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('no_telp', 'No Telp', 'required');
		$this->form_validation->set_rules('fakultas', 'Fakultas', 'required');
	}

	public function detail($id)
	{
		$this->load->model('model_mahasiswa');
		$detail=$this->model_mahasiswa->detail_data($id);
		$data['detail']=$detail;
		$this->load->view('dosen/detail_mahasiswa', $data);
	}

}	
 ?>

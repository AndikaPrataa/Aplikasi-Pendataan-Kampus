<?php 

class Daftar_nilai extends CI_Controller
{

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
		$data['nilai']=$this->model_nilai->tampil_data()->result();
		$this->load->view('dosen/halaman_daftar_nilai', $data);
	}

		public function tambah_data()
	{
		$this->load->view('dosen/form_tambahdata_nilai');
	}

	public function tambah_dataAksi()
	{
		$this-> _rules();
		if ($this->form_validation->run()== FALSE){
			$this->tambah_data();
		}else{
		$mata_kuliah		= $this->input->post('mata_kuliah');
		$dosen_pengampu		= $this->input->post('dosen_pengampu');
		$nilai				= $this->input->post('nilai');

		$data=array(
			'mata_kuliah' 		=> $mata_kuliah,
			'dosen_pengampu'	=> $dosen_pengampu,
			'nilai'				=> $nilai,

		);

		$this->model_nilai->tambah_data($data, 'nilai');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong class="text-bold">Data Berhasil di Tambah</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('dosen/daftar_nilai');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('mata_kuliah', 'Mata Kuliah', 'required');
		$this->form_validation->set_rules('dosen_pengampu', 'Dosen Pengampu', 'required');
		$this->form_validation->set_rules('nilai', 'Nilai', 'required');
	}

	public function edit_dataAksi()
	{
		$id 				= $this->input->post('id_nilai');
		$mata_kuliah		= $this->input->post('mata_kuliah');
		$dosen_pengampu		= $this->input->post('dosen_pengampu');
		$nilai				= $this->input->post('nilai');

		$data=array(
			'mata_kuliah' 		=> $mata_kuliah,
			'dosen_pengampu'	=> $dosen_pengampu,
			'nilai'				=> $nilai,

		);
		$where=array(
			'id_nilai' => $id
		);

		$this->model_nilai->update_data($where, $data, 'nilai');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong class="text-bold">Data Berhasil di Update</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('dosen/daftar_nilai');
	}

	public function updateData($id)
	{
		$where=array('id_nilai'=>$id);
		$data['title'] = "Edit Data Daftar Nilai";
		$data['nilai'] = $this->model_nilai->edit_data($where)->result();
		$this->load->view('dosen/edit_nilai', $data);
	}

	public function hapus($id)
	{
		$where=array('id_nilai' => $id);
		$this->model_nilai->hapus_data($where, 'nilai');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong class="text-bold">Data Berhasil di Hapus</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('dosen/daftar_nilai');
	}

	public function detail($id)
	{
		$this->load->model('model_nilai');
		$detail=$this->model_nilai->detail_data($id);
		$data['detail']=$detail;
		$this->load->view('dosen/detail_daftar_nilai', $data);
	}
}
 ?>
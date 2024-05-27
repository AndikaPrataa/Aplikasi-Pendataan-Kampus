<?php 
class Jadwal_kuliah extends CI_Controller
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
		$data['jadwal_kuliah']=$this->model_jadwal->tampil_data()->result();
		$this->load->view('admin/halaman_jadwal_kuliah', $data);
	}

	public function tambah_data()
	{
		$this->load->view('admin/form_tambahdata_jadwal');
	}

	public function tambah_dataAksi()
	{
		$this-> _rules();
		if ($this->form_validation->run()== FALSE){
			$this->tambah_data();
		}else{
		$mata_kuliah		= $this->input->post('mata_kuliah');
		$dosen_pengampu		= $this->input->post('dosen_pengampu');
		$hari				= $this->input->post('hari');
		$jam				= $this->input->post('jam');

		$data=array(
			'mata_kuliah' 		=> $mata_kuliah,
			'dosen_pengampu'	=> $dosen_pengampu,
			'hari'				=> $hari,
			'jam'				=> $jam,

		);

		$this->model_jadwal->tambah_data($data, 'jadwal_kuliah');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong class="text-bold">Data Berhasil di Tambah</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('admin/jadwal_kuliah');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('mata_kuliah', 'Mata Kuliah', 'required');
		$this->form_validation->set_rules('dosen_pengampu', 'Dosen Pengampu', 'required');
		$this->form_validation->set_rules('hari', 'Hari', 'required');
		$this->form_validation->set_rules('jam', 'Jam', 'required');
	}

	public function edit_dataAksi()
	{
		$id 				= $this->input->post('id_kuliah');
		$mata_kuliah		= $this->input->post('mata_kuliah');
		$dosen_pengampu		= $this->input->post('dosen_pengampu');
		$hari				= $this->input->post('hari');
		$jam				= $this->input->post('jam');

		$data=array(
			'mata_kuliah' 		=> $mata_kuliah,
			'dosen_pengampu'	=> $dosen_pengampu,
			'hari'				=> $hari,
			'jam'				=> $jam,

		);
		$where=array(
			'id_kuliah' => $id
		);

		$this->model_jadwal->update_data($where, $data, 'jadwal_kuliah');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong class="text-bold">Data Berhasil di Update</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('admin/jadwal_kuliah');
	}

	public function updateData($id)
	{
		$where=array('id_kuliah'=>$id);
		$data['title'] = "Edit Data Jadwal Kuliah";
		$data['jadwal_kuliah'] = $this->model_jadwal->edit_data($where)->result();
		$this->load->view('admin/edit_jadwal', $data);
	}

	public function hapus($id)
	{
		$where=array('id_kuliah' => $id);
		$this->model_jadwal->hapus_data($where, 'jadwal_kuliah');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong class="text-bold">Data Berhasil di Hapus</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('admin/jadwal_kuliah');
	}

	public function detail($id)
	{
		$this->load->model('model_jadwal');
		$detail=$this->model_jadwal->detail_data($id);
		$data['detail']=$detail;
		$this->load->view('admin/detail_jadwal_kuliah', $data);
	}

}
 ?>
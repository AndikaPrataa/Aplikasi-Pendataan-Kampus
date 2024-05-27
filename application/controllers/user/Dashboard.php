<?php 
class Dashboard extends CI_Controller {

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
		$this->load->view('user/dashboard');
	}
}
?>


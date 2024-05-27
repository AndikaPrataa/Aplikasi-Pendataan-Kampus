<?php 
class Model_mahasiswa extends CI_model
{
	
	public function tampil_data()
	{
		return $this->db->get('mahasiswa');
	}

	public function tambah_data($data,$tabel)
	{
		$this->db->insert($tabel, $data);
	}

	public function edit_data($where)
	{
		return $this->db->get_where('mahasiswa', $where);
	}

	public function update_data($where, $data)
	{
		$this->db->where($where);
		$this->db->update('mahasiswa', $data);
	}

	public function hapus_data($where, $tabel)
	{
		$this->db->where($where);
		$this->db->delete($tabel);
	}

	public function detail_data($id=null)
	{
		$query=$this->db->get_where('mahasiswa', array('id_mahasiswa'=>$id))->row();
		return $query;
	}
}
 ?>
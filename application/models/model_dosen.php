<?php 
	class Model_dosen extends CI_model
	{
		
		public function tampil_data()
		{
			return $this->db->get('dosen');
		}

		public function tambah_data($data, $table)
		{
			$this->db->insert($table, $data);
		}

		public function edit_data($where)
		{
			return $this->db->get_where('dosen', $where);
		}

		public function update_data($where, $data)
		{
			$this->db->where($where);
			$this->db->update('dosen', $data);
		}

		public function hapus_data($where, $table)
		{
			$this->db->where($where);
			$this->db->delete($table);
		}

		public function detail_data($id=null)
		{
			$query=$this->db->get_where('dosen', array('id_dosen'=>$id))->row();
			return $query;
		}
	}

 ?>
<?php 
	class Model_fakultas extends CI_model{
		
		public function tampil_data()
		{
			return $this->db->get('fakultas');
		}

		public function tambah_data($data,$table)
		{
			$this->db->insert($table, $data);
		}

		public function edit_data($where)
		{
			return $this->db->get_where('fakultas', $where);
		}

		public function update_data($where, $data)
		{
			$this->db->where($where);
			$this->db->update('fakultas', $data);
		}

		public function hapus_data($where, $tabel)
		{
			$this->db->where($where);
			$this->db->delete($tabel);
		}

	}
 ?>
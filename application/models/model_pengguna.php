<?php 
	class Model_pengguna extends CI_model{
		
		public function tampil_data()
		{
			return $this->db->get('pengguna');
		}

		public function tambah_data($data,$table)
		{
			$this->db->insert($table, $data);
		}

		public function edit_data($where)
		{
			return $this->db->get_where('pengguna', $where);
		}

		public function update_data($where, $data)
		{
			$this->db->where($where);
			$this->db->update('pengguna', $data);
		}

		public function hapus_data($where, $tabel)
		{
			$this->db->where($where);
			$this->db->delete($tabel);
		}

	}
 ?>
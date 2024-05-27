<?php 
	class Model_jadwal extends CI_model{
		
		public function tampil_data()
		{
			return $this->db->get('jadwal_kuliah');
		}

		public function tambah_data($data,$table)
		{
			$this->db->insert($table, $data);
		}

		public function edit_data($where)
		{
			return $this->db->get_where('jadwal_kuliah', $where);
		}

		public function update_data($where, $data)
		{
			$this->db->where($where);
			$this->db->update('jadwal_kuliah', $data);
		}

		public function hapus_data($where, $tabel)
		{
			$this->db->where($where);
			$this->db->delete($tabel);
		}

		public function detail_data($id=null)
		{
			$query=$this->db->get_where('jadwal_kuliah', array('id_kuliah'=>$id))->row();
			return $query;
		}
	}
 ?>
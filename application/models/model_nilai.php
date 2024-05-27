<?php 
	class Model_nilai extends CI_model{
		
		public function tampil_data()
		{
			return $this->db->get('nilai');
		}

		public function tambah_data($data,$table)
		{
			$this->db->insert($table, $data);
		}

		public function edit_data($where)
		{
			return $this->db->get_where('nilai', $where);
		}

		public function update_data($where, $data)
		{
			$this->db->where($where);
			$this->db->update('nilai', $data);
		}

		public function hapus_data($where, $tabel)
		{
			$this->db->where($where);
			$this->db->delete($tabel);
		}

		public function detail_data($id=null)
		{
			$query=$this->db->get_where('nilai', array('id_nilai'=>$id))->row();
			return $query;
		}
	}
 ?>
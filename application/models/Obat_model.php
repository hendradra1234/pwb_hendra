<?php
	class obat_model extends CI_Model {
		function __construct() {
			$this->load->database();
		}

		public function data_obat() {
			$query = $this->db->query("select * from obat");
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}

		public function max_id() {
			$query = $this->db->query("select MAX(kd_obat) as maxid from obat");
			if($query->num_rows() > 0) {
				$data = $query->row();
				return (int) $data->maxid;
			}
			return 0;
		}

		//edit obat
		public function info_obat($id) {
			$query = $this->db->query("select * from obat where kd_obat = '$id'");
			if($query->num_rows() > 0) {
				return $query->row();
			}else {
				return false;
			}
		}
	}
?>

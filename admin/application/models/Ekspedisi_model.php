<?php
	class ekspedisi_model extends CI_Model {
		function __construct() {
			$this->load->database();
		}

		public function data_ekspedisi() {
			$query = $this->db->query("select * from ekspedisi");
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		//edit ekspedisi
		public function info_ekspedisi($id) {
			$query = $this->db->query("select * from ekspedisi where kd_ekspedisi = '$id'");
			if($query->num_rows() > 0) {
				return $query->row();
			}else {
				return false;
			}
		}
	}
?>

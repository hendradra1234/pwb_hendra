<?php
	class Expedisi_model extends CI_Model {
		function __construct() {
			$this->load->database();
		}

		public function data_expedisi() {
			$query = $this->db->query("select * from expedisi");
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		//edit expedisi
		public function info_expedisi($id) {
			$query = $this->db->query("select * from expedisi where kd_expedisi = '$id'");
			if($query->num_rows() > 0) {
				return $query->row();
			}else {
				return false;
			}
		}
	}
?>

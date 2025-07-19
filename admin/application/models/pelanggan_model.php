<?php
	class Pelanggan_model extends CI_Model {
		function __construct() {
			$this->load->database();
		}

		public function data_pelanggan() {
			$query = $this->db->query("select * from pelanggan");
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
	}
?>

<?php
	class Home_model extends CI_Model {
		function __construct() {
			$this->load->database(); // untuk memanggil database
		}

		// membuat function index
		public function get_data_barang() {
			$query = $this->db->query("select * from barang");
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}

		function get_detail_barang($kd_barang='') {
			$query = $this->db->query("select * from barang where kd_barang ='$kd_barang'");
			if($query->num_rows() > 0) {
				return $query->row();
			}
		}

	}
?>

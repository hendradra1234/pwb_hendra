<?php
	class Login_model extends CI_Model {
		function __construct() {
			$this->load->database();
		}

		function get_data_pelanggan($email_pelanggan, $password) {
			$query = $this->db->query("select * from pelanggan where email_pelanggan='$email_pelanggan' and password='$password'");
			if($query->num_rows() > 0) {
				return $query->result();
			}

			return false;
		}

		public function generate_id() {
			$query = $this->db->query("SELECT MAX(kd_pelanggan) AS max_id FROM pelanggan");
			if ($query->num_rows() > 0) {
				$result = $query->row();
				$kode = (int)$result->max_id + 1;
				$kode_baru = $kode; // hasil PS001, PS002, ...
			} else {
				$kode_baru = "1";
			}
			return $kode_baru;
		}
	}
?>

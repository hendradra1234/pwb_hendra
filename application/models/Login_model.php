<?php
	class Login_model extends CI_Model {
		function __construct() {
			$this->load->database();
		}

		function get_data_pelanggan($email_pelanggan, $password) {
			$query = $this->db->query("select * from pelanggan where email_pelanggan='$email_pelanggan' and password='$password'");
			if($query->num_rows() > 0) {
				return true;
			}
		}
	}
?>

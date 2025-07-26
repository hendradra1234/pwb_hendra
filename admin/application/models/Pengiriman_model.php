<?php
	class pengiriman_model extends CI_Model {
		function __construct() {
			$this->load->database();
		}

		public function data_pengiriman() {
			$query = $this->db->query("select * from pengiriman232250009");
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}

		public function max_id() {
			$query = $this->db->query("select MAX(id_kirim0009) as maxid from pengiriman232250009");
			if($query->num_rows() > 0) {
				$data = $query->row();
				return (int) $data->maxid;
			}
			return 0;
		}
	}
?>

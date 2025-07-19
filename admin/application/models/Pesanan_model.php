<?php
class Pesanan_model extends CI_Model {
	function __construct() {
		$this->load->database();
	}

	public function data_pesanan() {
		$query = $this->db->query("select * from pesanan,pelanggan,ekspedisi where pesanan.kd_pelanggan = pelanggan.kd_pelanggan and pesanan.kd_ekspedisi = ekspedisi.kd_ekspedisi");
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
}
?>

<?php
	class Keranjang_model extends CI_Model {
		function __construct() {
			$this->load->database(); //untuk memanggil database
		}

		public function histori($id) {
			return $this->db->query("SELECT * FROM pesanan,ada,barang WHERE pesanan.no_pesanan=ada.no_pesanan AND ada.kd_barang=barang.kd_barang AND pesanan.status = 'Belum Bayar' AND pesanan.no_pesanan = '$id'");
		}

		public function histori_pesanan($id) {
			return $this->db->query("SELECT * FROM pesanan,pelanggan WHERE pelanggan.kd_pelanggan=pesanan.kd_pelanggan and pesanan.status = 'Belum Bayar' AND pesanan.no_pesanan = '$id'");
		}

		public function histori_pesanan_pelanggan($id) {
			return $this->db->query("SELECT * FROM pesanan,pelanggan WHERE pelanggan.kd_pelanggan=pesanan.kd_pelanggan and pesanan.kd_pelanggan = '$id'");
		}

		public function histori_detail_pelanggan($id) {
			return $this->db->query("SELECT * FROM pesanan,ada,barang WHERE pesanan.no_pesanan=ada.no_pesanan AND ada.kd_barang=barang.kd_barang and pesanan.kd_pelanggan = '$id'");
		}
	}
?>

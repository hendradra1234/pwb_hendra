<?php
	class Keranjang_model extends CI_Model {
		function __construct() {
			$this->load->database(); //untuk memanggil database
		}

		function get_data_keranjang($kd_pelanggan, $kd_barang) {
			$query = $this->db->query("select * from keranjang 
				where kd_pelanggan='$kd_pelanggan' and kd_barang='$kd_barang'");
			return $query;
		}

		function get_keranjang($kd_pelanggan){
			$query = $this->db->query("select * from keranjang a left join barang b on a.kd_barang = b.kd_barang where a.kd_pelanggan='$kd_pelanggan'");
			if($query->num_rows() > 0){
				return $query->result();
			}
		}

		function get_data_ekspedisi() {
			$query = $this->db->query("select * from ekspedisi");
			if($query->num_rows() > 0){
				return $query->result();
			}
		}

		function get_no_pesanan() {
			$query = $this->db->query("select * from pesanan");
			if($query->num_rows() > 0){
				return $query->num_rows() + 1;
			}
		}

		public function info_stok($id) {
			$query = $this->db->query("select stok from barang where kd_barang ='$id'");
			return $query->row();
		}

		function edit_stok($table_name, $data1, $kd) {
			$this->db->where('kd_barang', $kd);
			$this->db->update($table_name, $data1);
		}

		public function histori($id) {
			return $this->db->query("SELECT * FROM pesanan,ada,barang
			WHERE pesanan.no_pesanan=ada.no_pesanan
			AND ada.kd_barang=barang.kd_barang
			AND pesanan.status = 'Belum Bayar'
			AND pesanan.no_pesanan = '$id'");
		}

		public function histori_pesanan($id) {
			return $this->db->query("SELECT * FROM pesanan,pelanggan
			WHERE pelanggan.kd_pelanggan=pesanan.kd_pelanggan
			AND pesanan.status = 'Belum Bayar'
			AND pesanan.no_pesanan = '$id'");
		}

		//tambah kodingan baru untuk pesanan automatis
		public function generate_no_pesanan() {
			$query = $this->db->query("SELECT MAX(RIGHT(no_pesanan, 3)) AS max_id FROM pesanan");
			if ($query->num_rows() > 0) {
				$result = $query->row();
				$kode = (int)$result->max_id + 1;
				$kode_baru = "PS" . str_pad($kode, 3, "0", STR_PAD_LEFT); // hasil PS001, PS002, ...
			} else {
				$kode_baru = "PS001";
			}
			return $kode_baru;
		}

		public function histori_pesanan_pelanggan($id) {
			return $this->db->query("SELECT * FROM pesanan,pelanggan
			WHERE pelanggan.kd_pelanggan=pesanan.kd_pelanggan
			AND pesanan.kd_pelanggan = '$id'");
		}

		public function histori_detail_pelanggan($id) {
			return $this->db->query("SELECT * FROM pesanan,ada,barang
			WHERE pesanan.no_pesanan=ada.no_pesanan
			AND ada.kd_barang=barang.kd_barang
			AND pesanan.kd_pelanggan = '$id'");
		}
	}
?>

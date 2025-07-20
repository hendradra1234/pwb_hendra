<?php
class Pembayaran_model extends CI_Model {
    function __construct() {
        $this->load->database(); //untuk memanggil database
    }

    function get_pembayaran($kd_pelanggan) {
        $query = $this->db->query("select * from pesanan a left join pembayaran b on a.no_pesanan = b.no_pesanan where a.kd_pelanggan='$kd_pelanggan'");
        if($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function get_no_pesanan() {
        $query = $this->db->query("select * from pesanan");
        if($query->num_rows() > 0) {
            return $query->num_rows() + 1;
        }
    }

    function buatkode() {
		$this->db->select_max('kd_pembayaran');
        $barisorder = $this->db->get('pembayaran')->row();
        if(!empty($barisorder->kd_pembayaran)) {
            $kode = intval(substr($barisorder->kd_pembayaran,4,3)) + 1;
            $kode = "PMB".str_pad($kode, 3, "0", STR_PAD_LEFT);
        } else {
            $kode = 'PMB001';
        }
        return $kode;
    }

	public function get_bayar($id) {
		return $this->db->query("SELECT * FROM pesanan,pelanggan,ekspedisi WHERE pelanggan.kd_pelanggan=pesanan.kd_pelanggan AND ekspedisi.kd_ekspedisi=pesanan.kd_ekspedisi AND pesanan.status = 'Belum Bayar' AND pesanan.no_pesanan = '$id'");
	}

	public function get_pembayaran1($id) {
		return $this->db->query("SELECT * FROM pesanan,ada,barang WHERE pesanan.no_pesanan=ada.no_pesanan AND ada.kd_barang=barang.kd_barang AND pesanan.status = 'Belum Bayar' AND pesanan.no_pesanan = '$id'");
	}

	public function get_brg($id) {
		return $this->db->query("SELECT * FROM ada, barang WHERE ada.kd_barang = barang.kd_barang AND no_pesanan = '$id'");
	}

	public function edit_status($table_name, $data1, $kd) {
		$this->db->where('no_pesanan', $kd);
		$this->db->update($table_name, $data1);
	}
	}
?>

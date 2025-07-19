<?php
class Laporan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Laporan_model');
	}

	public function laporan_view_form() {
		$data = array(
			'title' => 'Menambah Barang',
			'isi' => 'laporan/laporan_view_penjualan'
		);
		$this->load->view('layout/wrapper', $data);
	}

	public function cetak_laporan_penjualan() {
		$tanggal_mulai = $this->input->post('tanggal_mulai');
		$tanggal_selesai = $this->input->post('tanggal_selesai');

		$data['data'] = $this->Laporan_model->laporan_cetak_penjualan($tanggal_mulai, $tanggal_selesai);
		$data['tanggal_mulai'] = $tanggal_mulai;
		$data['tanggal_selesai'] = $tanggal_selesai;

		$this->load->view('laporan/cetak_laporan_penjualan', $data);
	}
}
?>

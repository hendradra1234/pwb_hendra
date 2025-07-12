<?php
	class Pesanan extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('Pesanan_model');
			$this->load->model('General_model');
			$this->load->model('Pelanggan_model');
			$this->load->model('Barang_model');
		}

		function index() {
			$query = $this->Pesanan_model->data_pesanan();
			$data = array(
				'title' => 'Halaman Dashboard Administrator E-Commerce',
				'isi' => 'pesanan/pesanan_view',
				'data' => $query
			);
			$this->load->view('layout/wrapper', $data);
		}

		public function delete($id='') {
			$where_data['no_pesanan'] = $id;
			$this->General_model->delete_data('pesanan', $where_data);
			$this->General_model->delete_data('ada', $where_data);
			redirect(base_url().'pesanan/');
		}
	}
?>

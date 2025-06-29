<?php
	class Barang extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('Barang_model');
			$this->load->model('General_model');
		}

		function index() {
			$query = $this->Barang_model->data_barang();
			$data = array(
				'title' => 'Halaman Dashboard Administrator E-Commerce',
				'isi'   => 'barang/barang_view',
				'data'  => $query
			);
			$this->load->view('layout/wrapper', $data);
		}

		public function delete($id='') {
			$where_data['kd_barang'] = $id;
			$this->General_model->delete_data('barang', $where_data);
			redirect(base_url().'barang/');
		}
	}
?>

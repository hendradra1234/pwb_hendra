<?php
	class Pelanggan extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('Pelanggan_model');
			$this->load->model('General_model');
		}

		function index() {
			$query = $this->Pelanggan_model->data_pelanggan();
			$data = array(
				'title' => 'Halaman Dashboard Administrator E-Commerce',
				'isi'   => 'pelanggan/pelanggan_view',
				'data'  => $query
			);
			$this->load->view('layout/wrapper', $data);
		}

		public function delete($id='') {
			$where_data['kd_pelanggan'] = $id;
			$this->General_model->delete_data('pelanggan', $where_data);
			redirect(base_url(), 'pelanggan/');
		}
	}
?>

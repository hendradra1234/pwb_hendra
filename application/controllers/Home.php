<?php
	class Home extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('General_model');
			$this->load->model('Home_model');
		}

		public function index(){
			$data = array('title' => 'Halaman Dashboard Administrator - E-commerce',
			'data' => $this->Home_model->get_data_barang(),
			'isi'   => 'Home/Home_view' );
			$this->load->view('Layout/Wrapper', $data);
		}

		public function detail($kd_barang) {
			$data = array(
				'title' => 'Halaman Home E-commerce',
				'data'  => $this->Home_model->get_detail_barang($kd_barang),
				'isi'   => 'Home/barang_detail'
			);
			$this->load->view('Layout/Wrapper', $data);
		}

	}
?>

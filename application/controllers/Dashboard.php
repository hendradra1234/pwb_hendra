<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Dashboard extends CI_Controller {

		// public function __construct() {
		// 	parent::__construct();
		// 	$this->load->model('General_model');
		// }

		public function index()
		{
			$this->load->view('login');
			// $data = array(
			// 	'title' => 'Halaman Dashboard Administrator  - E-commerce',
			// 	'isi' => 'dashboard/dashboard_view',
			// );

			// $this->load->view('layout/wrapper', $data);
		}
	}
?>

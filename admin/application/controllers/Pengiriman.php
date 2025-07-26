<?php
	class pengiriman extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('pengiriman_model');
			$this->load->model('General_model');
		}

		function index() {
			$query = $this->pengiriman_model->data_pengiriman();
			$data = array(
				'title' => 'DATA PENGIRIMAN',
				'isi'   => 'pengiriman/pengiriman_view',
				'data'  => $query
			);
			$this->load->view('layout/wrapper', $data);
		}

		public function tambah() {
			$max_id = $this->pengiriman_model->max_id();
			$inc_id = $max_id + 1;
			$this->form_validation->set_rules('id_kirim0009', 'Kode pengiriman', 'required');
			$this->form_validation->set_rules('tgl_kirim0009', 'Tanggal pengiriman', 'required');
			$this->form_validation->set_rules('jenis_kirim0009', 'Jenis pengiriman', 'required');
			$this->form_validation->set_rules('keterangan009', 'keterangan009', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data = array(
					'title' => 'TAMBAH PENGIRIMAN',
					'isi'   => 'pengiriman/tambah_pengiriman',
					'idx' => $inc_id
				);
				$this->load->view('layout/wrapper', $data);
			} else {
				$data = array(
					'id_kirim0009'  => $this->input->post('id_kirim0009'),
					'tgl_kirim0009' => $this->input->post('tgl_kirim0009'),
					'jenis_kirim0009' => $this->input->post('jenis_kirim0009'),
					'keterangan009'       => $this->input->post('keterangan009'),
				);
				$this->General_model->add_new('pengiriman232250009', $data);
				redirect(base_url().'pengiriman/');
			}
		}
	}
?>

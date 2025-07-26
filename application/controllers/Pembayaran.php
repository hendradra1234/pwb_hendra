<?php
	class Pembayaran extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('General_model');
			$this->load->model('Keranjang_model');
			$this->load->model('Pembayaran_model');
		}

		public function index() {
			if(($this->session->userdata('username')) != null) {
				$kd_pelanggan = $this->session->userdata('username');
				$data = array (
					'data' => $this->Pembayaran_model->get_pembayaran($kd_pelanggan),
					'isi' => 'pembayaran/pembayaran_view'
				);
				$this->load->view('Layout/Wrapper', $data);
			}
		}

		public function bayar($id) {
			if(($this->session->userdata('username')) != null) {
				$kd_pelanggan = $this->session->userdata('username');
				$data = array (
					'data1' => $this->Pembayaran_model->get_brg($id)->result(),
					'data' => $this->Pembayaran_model->get_bayar($id)->result(),
					'isi' => 'pembayaran/pembayaran_view'
				);
				$this->load->view('Layout/Wrapper', $data);
			}
		}

		public function simpan() {
			if(($this->session->userdata('username')) != null) {
				$kd_pembayaran = $this->Pembayaran_model->buatkode();
				$kd_pelanggan = $this->session->userdata('username');
				$config['upload_path'] = './bukti/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = 2048;
				$config['file_name'] = $kd_pembayaran;
				$this->load->library('upload', $config);
				$this->upload->do_upload('bukti_transfer');

				$gbr = $this->upload->data();
				$gbr = $gbr['file_name'];

				$data = array(
					'kd_pembayaran' => $kd_pembayaran,
					'tanggal_pembayaran' => date('Y-m-d'),
					'bukti_transfer' => $gbr,
					'no_pesanan' => $this->input->post('no_pesanan')
				);

				$data1 = array(
					'status' => 'Sudah Bayar'
				);
				$this->Pembayaran_model->edit_status('pesanan', $data1, $this->input->post('no_pesanan'));
				$this->General_model->add_new('pembayaran', $data);
				redirect(base_url() . 'keranjang/histori_pesanan_pelanggan');
			}
		}
	}
?>

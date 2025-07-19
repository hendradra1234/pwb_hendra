<?php
	class Keranjang extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('General_model');
			$this->load->model('Keranjang_model');
		}

		public function index() {
			if(($this->session->userdata('username')) != null) {
				$kd_pelanggan = $this->session->userdata('username');
				$data = array (
					'data_ekspedisi' => $this->Keranjang_model->get_data_ekspedisi(),
					'data' => $this->Keranjang_model->get_keranjang($kd_pelanggan),
					'isi' => 'Keranjang/Keranjang_view'
				);
				$this->load->view('Layout/Wrapper', $data);
			}
		}

		public function add() {
			//untuk detail()
			if(($this->session->userdata('username')) != null) {
				$kd_pelanggan = $this->session->userdata('username');
				$data_keranjang = $this->Keranjang_model->get_data_keranjang($kd_pelanggan, $this->input->post('Id_Barang'));
				if($data_keranjang->num_rows() > 0) {
					$data = array(
						'kd_pelanggan' => $kd_pelanggan,
						'kd_barang' => $this->input->post('Id_Barang'),
						'qty' => $this->input->post('quantity') - 1
					);
					$where_data['kd_pelanggan'] = $kd_pelanggan;
					$where_data['kd_barang'] = $this->input->post('Id_Barang');
					$this->General_model->edit_data('keranjang', $data, $where_data);
				} else {
					$data = array(
						'kd_pelanggan' => $kd_pelanggan,
						'kd_barang' => $this->input->post('Id_Barang'),
						'qty' => $this->input->post('quantity')
					);
					$this->General_model->add_new('keranjang', $data);
				}
				redirect('/keranjang');
			} else {
				redirect('/home');
			}
		}

		public function clear($kd_barang) {
			$kd_pelanggan = $this->session->userdata('username');
			$where_data['kd_barang'] = $kd_barang;
			$where_data['kd_pelanggan'] = $kd_pelanggan;
			$this->General_model->delete_data('keranjang', $where_data);
			redirect('/keranjang');
		}

		public function checkout() {
			if(($this->session->userdata('username')) != null) {
				$kd_pelanggan = $this->session->userdata('username');
				$data = array (
					'data_ekspedisi' => $this->Keranjang_model->get_data_ekspedisi(),
					'data' => $this->Keranjang_model->get_keranjang($kd_pelanggan),
					'isi' => 'Keranjang/Keranjang_checkout'
				);
				$this->load->view('Layout/Wrapper', $data);
			}
		}

		public function buat_pesanan() {
			if (($this->session->userdata('username')) != null) {
				$no_pesanan = $this->Keranjang_model->generate_no_pesanan(); // Pakai generator baru
				$kd_pelanggan = $this->session->userdata('username');

				$data = array(
					'no_pesanan' => $no_pesanan,
					'tanggal_pesanan' => date('Y-m-d'),
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'telp' => $this->input->post('telp'),
					'status' => 'Belum Bayar',
					'kd_ekspedisi' => $this->input->post('kd_ekspedisi'),
					'kd_pelanggan' => $kd_pelanggan
				);
				$this->General_model->add_new('pesanan', $data);

				// Simpan ke tabel ada
				$data_keranjang = $this->Keranjang_model->get_keranjang($kd_pelanggan);
				if (is_array($data_keranjang)) {
					foreach ($data_keranjang as $row_keranjang) {
						$data_detail = array(
							'no_pesanan' => $no_pesanan,
							'kd_barang' => $row_keranjang->kd_barang,
							'qty' => $row_keranjang->qty,
							'harga' => $row_keranjang->harga
						);
						$this->General_model->add_new('ada', $data_detail);

						// Update stok barang
						$data_stok = $this->Keranjang_model->info_stok($row_keranjang->kd_barang);
						if ($data_stok !== false) {
							$data1 = array(
								'stok' => $data_stok->stok - $row_keranjang->qty
							);
							$this->Keranjang_model->edit_stok('barang', $data1, $row_keranjang->kd_barang);
						}
					}
					// Hapus data keranjang
					$where_delete_data['kd_pelanggan'] = $kd_pelanggan;
					$this->General_model->delete_data('keranjang', $where_delete_data);
					}

					// Kirim data ke view histori
					$data = array(
						'data' => $this->Keranjang_model->histori_pesanan($no_pesanan)->result(),
						'data2' => $this->Keranjang_model->histori($no_pesanan)->result(),
						'isi' => 'Keranjang/Histori_pesanan'
					);

					$this->load->view('Layout/Wrapper', $data);
				} else {
					$this->index();
				}
		}

		public function histori_pesanan_pelanggan() {
			if(($this->session->userdata('username')) != null) {
				$kd_pelanggan = $this->session->userdata('username');
				$no_pesanan = $this->Keranjang_model->get_no_pesanan();
				$data = array (
					'data3' => $this->Keranjang_model->histori_pesanan_pelanggan($kd_pelanggan)->result(),
					'data4' => $this->Keranjang_model->histori_detail_pelanggan($kd_pelanggan)->result(),
					'isi' => 'Keranjang/Histori_pesanan_pelanggan'
				);
				$this->load->view('Layout/Wrapper', $data);
			}
		}
	}
?>

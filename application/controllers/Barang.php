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

		public function tambah() {
			$this->form_validation->set_rules('kd_barang', 'Kode Barang', 'required');
			$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
			$this->form_validation->set_rules('stok', 'Stok', 'required');
			$this->form_validation->set_rules('harga', 'Harga', 'required');
			$this->form_validation->set_rules('berat', 'Berat', 'required');
			$this->form_validation->set_rules('satuan', 'Satuan', 'required');
			$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
			$this->form_validation->set_rules('gambar', 'Gambar', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data = array(
					'title' => 'Menambah Barang',
					'isi'   => 'barang/tambah_barang'
				);
				$this->load->view('layout/wrapper', $data);
			} else {
				$data = array(
					'kd_barang'  => $this->input->post('kd_barang'),
					'nama_barang' => $this->input->post('nama_barang'),
					'stok'       => $this->input->post('stok'),
					'harga'      => $this->input->post('harga'),
					'berat'      => $this->input->post('berat'),
					'satuan'     => $this->input->post('satuan'),
					'keterangan' => $this->input->post('keterangan'),
					'gambar'     => $this->input->post('gambar')
				);
				$this->General_model->add_new('barang', $data);
				redirect(base_url().'barang/');
			}
		}
	}
?>

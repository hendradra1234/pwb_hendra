<?php
	class obat extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('obat_model');
			$this->load->model('General_model');
		}

		function index() {
			$query = $this->obat_model->data_obat();
			$data = array(
				'title' => 'Halaman Dashboard Administrator E-Commerce',
				'isi'   => 'obat/obat_view',
				'data'  => $query
			);
			$this->load->view('layout/wrapper', $data);
		}

		public function delete($id='') {
			$where_data['kd_obat'] = $id;
			$this->General_model->delete_data('obat', $where_data);
			redirect(base_url().'obat/');
		}

		public function tambah() {
			$max_id = $this->obat_model->max_id();
			$inc_id = $max_id + 1;
			$this->form_validation->set_rules('kd_obat', 'Kode obat', 'required');
			$this->form_validation->set_rules('nm_obat', 'Nama obat', 'required');
			$this->form_validation->set_rules('satuan', 'Satuan', 'required');
			$this->form_validation->set_rules('jenis_obat', 'Jenis Obat', 'required');
			$this->form_validation->set_rules('stok', 'Stok', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data = array(
					'title' => 'Menambah obat',
					'isi'   => 'obat/tambah_obat',
					'idx' => $inc_id
				);
				$this->load->view('layout/wrapper', $data);
			} else {
				$data = array(
					'kd_obat'  => $this->input->post('kd_obat'),
					'nm_obat' => $this->input->post('nm_obat'),
					'satuan'     => $this->input->post('satuan'),
					'jenis_obat' => $this->input->post('jenis_obat'),
					'stok'       => $this->input->post('stok'),
				);
				$this->General_model->add_new('obat', $data);
				redirect(base_url().'obat/');
			}
		}

		public function edit($id='') {
			$this->form_validation->set_rules('kd_obat', 'Kode obat', 'required');
			$this->form_validation->set_rules('nm_obat', 'Nama obat', 'required');
			$this->form_validation->set_rules('satuan', 'Satuan', 'required');
			$this->form_validation->set_rules('jenis_obat', 'Jenis Obat', 'required');
			$this->form_validation->set_rules('stok', 'Stok', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data = array(
					'title' => 'Edit obat',
					'isi'   => 'obat/edit_obat',
					'data'  => $this->obat_model->info_obat($id),
					'kd_obat' => $id
				);
				$this->load->view('layout/wrapper', $data);
			} else {
				$data = array(
					'kd_obat'  => $this->input->post('kd_obat'),
					'nm_obat' => $this->input->post('nm_obat'),
					'satuan'     => $this->input->post('satuan'),
					'jenis_obat' => $this->input->post('jenis_obat'),
					'stok'       => $this->input->post('stok'),
				);
				$where_data['kd_obat'] = $this->input->post('kd_obat');
				$this->General_model->edit_data('obat', $data, $where_data);
				redirect(base_url().'obat/');
			}
		}
	}
?>

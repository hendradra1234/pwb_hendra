<?php
	class ekspedisi extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('Ekspedisi_model');
			$this->load->model('General_model');
		}

		function index() {
			$query = $this->Ekspedisi_model->data_ekspedisi();
			$data = array(
				'title' => 'Halaman Dashboard Administrator E-Commerce',
				'isi'   => 'ekspedisi/ekspedisi_view',
				'data'  => $query
			);
			$this->load->view('layout/wrapper', $data);
		}

		public function delete($id='') {
			$where_data['kd_ekspedisi'] = $id;
			$this->General_model->delete_data('ekspedisi', $where_data);
			redirect(base_url().'ekspedisi/');
		}

		public function tambah() {
			$this->form_validation->set_rules('kd_ekspedisi', 'Kode ekspedisi', 'required');
			$this->form_validation->set_rules('nama_ekspedisi', 'Nama ekspedisi', 'required');
			$this->form_validation->set_rules('tujuan', 'tujuan', 'required');
			$this->form_validation->set_rules('ongkir', 'ongkir', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data = array(
					'title' => 'Menambah ekspedisi',
					'isi'   => 'ekspedisi/tambah_ekspedisi'
				);
				$this->load->view('layout/wrapper', $data);
			} else {
				$data = array(
					'kd_ekspedisi'  => $this->input->post('kd_ekspedisi'),
					'nama_ekspedisi' => $this->input->post('nama_ekspedisi'),
					'ongkir'      => $this->input->post('ongkir'),
					'tujuan' => $this->input->post('tujuan'),
				);
				$this->General_model->add_new('ekspedisi', $data);
				redirect(base_url().'ekspedisi/');
			}
		}

		public function edit($id='') {
			$this->form_validation->set_rules('kd_ekspedisi', 'Kode ekspedisi', 'required');
			$this->form_validation->set_rules('nama_ekspedisi', 'Nama ekspedisi', 'required');
			$this->form_validation->set_rules('tujuan', 'tujuan', 'required');
			$this->form_validation->set_rules('ongkir', 'ongkir', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data = array(
					'title' => 'Edit ekspedisi',
					'isi'   => 'ekspedisi/edit_ekspedisi',
					'data'  => $this->Ekspedisi_model->info_ekspedisi($id),
					'kd_ekspedisi' => $id
				);
				$this->load->view('layout/wrapper', $data);
			} else {
				$data = array(
					'kd_ekspedisi'  => $this->input->post('kd_ekspedisi'),
					'nama_ekspedisi' => $this->input->post('nama_ekspedisi'),
					'ongkir'      => $this->input->post('ongkir'),
					'tujuan' => $this->input->post('tujuan'),
				);
				$where_data['kd_ekspedisi'] = $this->input->post('kd_ekspedisi');
				$this->General_model->edit_data('ekspedisi', $data, $where_data);
				redirect(base_url().'ekspedisi/');
			}
		}
	}
?>

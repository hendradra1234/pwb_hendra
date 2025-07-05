<?php
	class Expedisi extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('expedisi_model');
			$this->load->model('General_model');
		}

		function index() {
			$query = $this->expedisi_model->data_expedisi();
			$data = array(
				'title' => 'Halaman Dashboard Administrator E-Commerce',
				'isi'   => 'expedisi/expedisi_view',
				'data'  => $query
			);
			$this->load->view('layout/wrapper', $data);
		}

		public function delete($id='') {
			$where_data['kd_expedisi'] = $id;
			$this->General_model->delete_data('expedisi', $where_data);
			redirect(base_url().'expedisi/');
		}

		public function tambah() {
			$this->form_validation->set_rules('kd_expedisi', 'Kode Expedisi', 'required');
			$this->form_validation->set_rules('nama_expedisi', 'Nama Expedisi', 'required');
			$this->form_validation->set_rules('tujuan', 'tujuan', 'required');
			$this->form_validation->set_rules('ongkir', 'ongkir', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data = array(
					'title' => 'Menambah Expedisi',
					'isi'   => 'expedisi/tambah_expedisi'
				);
				$this->load->view('layout/wrapper', $data);
			} else {
				$data = array(
					'kd_expedisi'  => $this->input->post('kd_expedisi'),
					'nama_expedisi' => $this->input->post('nama_expedisi'),
					'ongkir'      => $this->input->post('ongkir'),
					'tujuan' => $this->input->post('tujuan'),
				);
				$this->General_model->add_new('expedisi', $data);
				redirect(base_url().'expedisi/');
			}
		}

		public function edit($id='') {
			$this->form_validation->set_rules('kd_expedisi', 'Kode Expedisi', 'required');
			$this->form_validation->set_rules('nama_expedisi', 'Nama Expedisi', 'required');
			$this->form_validation->set_rules('tujuan', 'tujuan', 'required');
			$this->form_validation->set_rules('ongkir', 'ongkir', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data = array(
					'title' => 'Edit Expedisi',
					'isi'   => 'expedisi/edit_expedisi',
					'data'  => $this->expedisi_model->info_expedisi($id),
					'kd_expedisi' => $id
				);
				$this->load->view('layout/wrapper', $data);
			} else {
				$data = array(
					'kd_expedisi'  => $this->input->post('kd_expedisi'),
					'nama_expedisi' => $this->input->post('nama_expedisi'),
					'ongkir'      => $this->input->post('ongkir'),
					'tujuan' => $this->input->post('tujuan'),
				);
				$where_data['kd_expedisi'] = $this->input->post('kd_expedisi');
				$this->General_model->edit_data('expedisi', $data, $where_data);
				redirect(base_url().'expedisi/');
			}
		}
	}
?>

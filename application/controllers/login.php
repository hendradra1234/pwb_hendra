<?php
	class Login extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('General_model');
			$this->load->model('Login_model');
		}

		public function index() {
			$data = array(
				'isi' => 'Login/Login_view'
			);
			$this->load->view('Layout/Wrapper', $data);
		}

		public function authentication() {
			$email_pelanggan = $this->input->post("email_pelanggan");
			$password = $this->input->post("password");
			$cek = $this->Login_model->get_data_pelanggan($email_pelanggan, $password);
			if ($cek) {
				$session = array('user' => $cek[0]->nama_pelanggan,
								'username' => $cek[0]->kd_pelanggan,
								'email_pelanggan' => $cek[0]->email_pelanggan,
								'telp_pelanggan' => $cek[0]->telp_pelanggan
							);
				$this->session->set_userdata($session);
				redirect('/home');
			} else {
				$data = array('error' => 'Email atau Password Anda Salah',
							'isi' => 'login/login_view');
				$this->load->view('Layout/Wrapper', $data);
			}
		}

		function logout() {
			$this->session->unset_userdata('email_pelanggan');
			$this->session->unset_userdata('user');
			redirect();
		}

		public function registrasi() {
			$data = array('isi' => 'Login/registrasi_view');
			$this->load->view('Layout/Wrapper', $data);
		}

		public function simpan_registrasi() {
			$id = $this->Login_model->generate_id();
			$this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('email_pelanggan', 'Email Pelanggan', 'required');
			$this->form_validation->set_rules('alamat_pelanggan', 'Alamat Pelanggan', 'required');
			$this->form_validation->set_rules('kota_pelanggan', 'Kota Pelanggan', 'required');
			$this->form_validation->set_rules('telp_pelanggan', 'Telpon Pelanggan', 'required');
			if($this->form_validation->run() === FALSE) {
				$data = array('isi' => 'Login/registrasi_view');
				$this->load->view('Layout/Wrapper', $data);
			} else {
				$data = array(
					'kd_pelanggan' => $id,
					'nama_pelanggan' => $this->input->post('nama_pelanggan'),
					'alamat_pelanggan' => $this->input->post('alamat_pelanggan'),
					'kota_pelanggan' => $this->input->post('kota_pelanggan'),
					'telp_pelanggan' => $this->input->post('telp_pelanggan'),
					'email_pelanggan' => $this->input->post('email_pelanggan'),
					'password' => $this->input->post('password')
				);
				$this->General_model->add_new('pelanggan', $data);
				redirect(base_url() . 'Home/');
			}
		}
	}
?>

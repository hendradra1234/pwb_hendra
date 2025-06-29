<?php
class Login extends CI_controller{
    public function index()
    {
        if(isset($_POST['login']))
        {
        	redirect(base_url('dashboard'), 'refresh');
        } else {
            $kode = $this->input->post('username', true);
            $query = $this->db->query("SELECT * FROM user WHERE username = '$kode' LIMIT 1")->row();
            $pass = md5($this->input->post('password', true));

            if($query != NULL)
            {
                if($query->password == $pass)
                {
                    $data = array('username' => $query->username,
                                  'user_role' => $query->user_role);
                    $this->session->set_userdata($data);
					echo "<script>
						alert('Login Anda Berhasil');
					</script>";
					redirect(base_url('Index'), 'refresh');
				} else {
					echo "<script>
						alert('Username atau Password Anda Salah!!!...');
					</script>";
					echo "<script>window.location='".base_url('welcome')."';</script>";
				}
			} else {
				echo "<script>
					alert('Anda Belum Terdaftar');
				</script>";
				echo "<script>window.location='".base_url('welcome')."';</script>";
			}
		}
	}

	function logout() {
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
?>

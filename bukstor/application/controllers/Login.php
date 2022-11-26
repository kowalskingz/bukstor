<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin'); //load model admin
	}

	public function index()
	{
		// membuat password untuk admin yang te;ah di encrypsi
		echo password_hash('admin', PASSWORD_DEFAULT, ['cost' => 10]);

		//proses autentikasi
		if ($this->input->post('submit') == 'Submit' )
		{
			//variabelvariabel untuk menerima value yang dikirim form inputnya
			$user = $this->input->post('username', TRUE);
			$pass = $this->input->post('password', TRUE);

			//variabel untuk pengecekan
			$cek = $this->admin->get_where('t_admin', array('username' => $user));

			//jika proses verivikasi pada username sudah berjalan maka lakukan verivikasi pada password
			if ($cek->num_rows() > 0)
			{
				$data = $cek->row();
				
				if (password_verify($pass, $data->password))
				{
					//session
					$datauser = array
					(
						'admin' => $data->id_admin,
						'user'  => $data->fullname,
						'login' => TRUE
					);

					$this->session->set_userdata($datauser);

					redirect ('index.php/administrator');
				}

				else
				{
					$this->session->set_flashdata('alert', "Password yang Anda masukkan salah..");
				}
			}
			
			else
			{
				$this->session->set_flashdata('alert', "Username ditolak");
			}
		}

		if ($this->session->userdata('login') == TRUE)
		{
			redirect('index.php/administrator');
		}
		$this->load->view('admin/login_form');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('index.php/login');
	}
}

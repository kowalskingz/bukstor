<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'cart', 'form_validation'));
		$this->load->model('app');
	}

	public function index()
	{
		$data['data'] = $this->app->get_where('t_buku', ['status' => 1]);
		$this->template->bukstor('home', $data);
	}

	public function about()
	{
		$data['data'] = $this->app->get_where('t_buku', ['status' => 1]);

		$this->template->bukstor('about', $data);

	}

	public function kategori()
	{
		if (!$this->uri->segment(3)) {
			redirect('index.php/home');
		}
		$url = strtolower(str_replace([' ','%20','_'], '-', $this->uri->segment(3)));

		$table = 't_kategori k JOIN t_rkategori rk ON (k.id_kategori = rk.id_kategori) JOIN t_buku b ON (rk.id_buku = b.id_buku)';

		$data['data'] = $this->app->get_where($table, ['b.status' => 1, 'k.url' => $url]);
		$data['url'] = ucwords(str_replace(['-','%20','_'], ' ', $this->uri->segment(3)));

		$this->template->bukstor('kategori', $data);
	}

	public function detail()
	{
		//pengecekan jika id pada url tidak disertakan maka akan redirect ke home
		if (is_numeric($this->uri->segment(3)))
		{
			$id = $this->uri->segment(3);
			$data['data'] = $this->app->get_where('t_buku', array('id_buku' => $id));
			$this->template->bukstor('item_detail', $data);
		}

		else
		{
			redirect('index.php/home');
		}
	}

	public function registrasi()
	{
		if ($this->input->post('submit', TRUE) == 'Submit')
		{
			$this->load->library('form_validation');

			$this->form_validation->set_rules('nama1', 'Nama Depan', "required|min_length[3]|regex_match[/^[a-zA-Z'.]+$/]");
			$this->form_validation->set_rules('nama2', 'Nama Belakang', "regex_match[/^[a-zA-Z'.]+$/]");			
			$this->form_validation->set_rules('user', 'Username', "required|min_length[4]|regex_match[/^[a-zA-Z0-9]+$/]");
			$this->form_validation->set_rules('email', 'Email', "required|valid_email");
			$this->form_validation->set_rules('pass1', 'Password', "required|min_length[5]");
			$this->form_validation->set_rules('pass2', 'Ketik Ulang Password', "required|matches[pass1]");
			$this->form_validation->set_rules('jk', 'Jenis Kelamin', "required");
			$this->form_validation->set_rules('telp', 'Telp', "required|min_length[8]|numeric");
			$this->form_validation->set_rules('alamat', 'Alamat', "required|min_length[10]");

			if ($this->form_validation->run() == TRUE)
			{
				$data = array(
					'username' => $this->input->post('user', TRUE),
					'fullname' => $this->input->post('nama1', TRUE).' '.$this->input->post('nama2', TRUE),
					'email' => $this->input->post('email', TRUE),
					'password' => password_hash($this->input->post('pass1', TRUE), PASSWORD_DEFAULT,['cost' => 10]),
					'jk' => $this->input->post('jk', TRUE),
					'telp' => $this->input->post('telp', TRUE),
					'alamat' => $this->input->post('alamat', TRUE),
					'status' => 1
				);

				if ($this->app->insert('t_users', $data))
				{
					redirect('index.php/home/login');
				}

				else
				{
					echo '<script type="text/javascript">alert("Akun berhasil dibuat, Silahkan melakukan login");</script>';
				}
			}
		}


		if ($this->session->userdata('user_login') == TRUE)
		{
			redirect('index.php/home');
		}

			//semua data dikirim agar jika user salahmenginputkan data tidak mengetik kembali dari awal
			$data = array(
				'user' => $this->input->post('user', TRUE),
				'nama1' => $this->input->post('nama1', TRUE),
				'nama2' => $this->input->post('nama2', TRUE),
				'email' => $this->input->post('email', TRUE),
				'jk' => $this->input->post('jk', TRUE),
				'telp' => $this->input->post('telp', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
			);

		$this->template->bukstor('register', $data);
	}

	public function login()
	{
		// membuat password untuk admin yang te;ah di encrypsi
		// echo password_hash('admin', PASSWORD_DEFAULT, ['cost' => 10]);

		//proses autentikasi
		if ($this->input->post('submit') == 'Submit' )
		{
			//variabelvariabel untuk menerima value yang dikirim form inputnya
			$user = $this->input->post('username', TRUE);
			$pass = $this->input->post('password', TRUE);

			//variabel untuk pengecekan
			$cek = $this->app->get_where('t_users', "username = '$user' && status = 1 || email = '$user' && status = 1");

			//jika proses verivikasi pada username sudah berjalan maka lakukan verivikasi pada password
			if ($cek->num_rows() > 0)
			{
				$data = $cek->row();
				
				if (password_verify($pass, $data->password))
				{
					//session
					$datauser = array
					(
						'user_id' => $data->id_user,
						'name'  => $data->fullname,
						'user_login' => TRUE
					);

					$this->session->set_userdata($datauser);

					redirect ('index.php/home');
				}

				else
				{
					echo '<script type="text/javascript">alert("Password ditolak");</script>';
				}
			}
			
			else
			{
				echo '<script type="text/javascript">alert("Username tidak dikenali");</script>';
			}
		}

		if ($this->session->userdata('user_login') == TRUE)
		{
			redirect('index.php/home');
		}
		$this->load->view('login');

	}

	public function profil()
	{
		//cek apakah user udah login atau belum
		if (!$this->session->userdata('user_login'))
		{
			redirect('index.php/home/login');
		}	

		$get = $this->app->get_where('t_users', array('id_user' => $this->session->userdata('user_id')))->row();

		if ($this->input->post('submit', TRUE) == 'Submit')
		{
			$this->load->library('form_validation');

			$this->form_validation->set_rules('nama1', 'Nama Depan', "required|min_length[3]|regex_match[/^[a-zA-Z'.]+$/]");
			$this->form_validation->set_rules('nama2', 'Nama Belakang', "regex_match[/^[a-zA-Z'.]+$/]");			
			$this->form_validation->set_rules('user', 'Username', "required|min_length[4]|regex_match[/^[a-zA-Z0-9]+$/]");
			$this->form_validation->set_rules('pass', 'Masukkan Password Anda', "required|min_length[5]");
			$this->form_validation->set_rules('jk', 'Jenis Kelamin', "required");
			$this->form_validation->set_rules('telp', 'Telp', "required|min_length[8]|numeric");
			$this->form_validation->set_rules('alamat', 'Alamat', "required|min_length[10]");

			if ($this->form_validation->run() == TRUE)
			{
				if (password_verify($this->input->post('pass', TRUE), $get->password)) 
				{
					$data = array(
						'username' => $this->input->post('user', TRUE),
						'fullname' => $this->input->post('nama1', TRUE).' '.$this->input->post('nama2', TRUE),
						'jk' => $this->input->post('jk', TRUE),
						'telp' => $this->input->post('telp', TRUE),
						'alamat' => $this->input->post('alamat', TRUE)
					);

					if ($this->app->update('t_users', $data, array('id_user' => $this->session->userdata('user_id'))))
					{	
						$this->session->set_userdata(array('name' => $this->input->post('nama1', TRUE).' '.$this->input->post('nama2', TRUE)));

						redirect('index.php/home');
					}

					else
					{
						echo '<script type="text/javascript">alert("Data Berhasil diupdate");</script>';
						redirect('index.php/home/profil');

					}
 				}
		
				else
				{
					echo '<script type="text/javascript>alert("Password Salah..");window.location.replace("'.base_url().'/index.php/home/logout");</script>';
				}
			}
		}
		//ambil data untuk tampil di form
		$name = explode(' ', $get->fullname);
		$data['nama1'] = $name[0];
		$data['nama2'] = $name[1];
		$data['user'] = $get->username;
		$data['email'] = $get->email;
		$data['jk'] = $get->jk;
		$data['telp'] = $get->telp;
		$data['alamat'] = $get->alamat;

		$this->template->bukstor('user_profil', $data);

	}

	public function transaksi()
	{
		if (!$this->session->userdata('user_id'))
		{
			redirect('home');
		}

		//ambil data
		$data['get'] = $this->app->get_where('t_order', ['id_user' => $this->session->userdata('user_id')]);

		$this->template->bukstor('transaksi', $data);
	}

	public function detail_transaksi()
	{
		if (!is_numeric($this->uri->segment(3)))
		{
			redirect('index.php/home');
		}

		//join table
		$table = "t_order o JOIN t_detail_order do ON (o.id_order = do.id_order) JOIN t_buku t ON (do.id_buku = t.id_buku)";

		//ambil data
		$data['get'] = $this->app->get_where($table, ['o.id_order' => $this->uri->segment(3)]);

		$this->template->bukstor('detail_transaksi', $data);
	}

	public function hapus_transaksi()
	{
		if (!is_numeric($this->uri->segment(3)))
		{
			redirect('index.php/home');
		}

		$table = array('t_order', 't_detail_order');

		$this->app->delete($table, ['id_order' => $this->uri->segment(3)]);

		redirect('index.php/home/transaksi');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('index.php/home');
	}
}

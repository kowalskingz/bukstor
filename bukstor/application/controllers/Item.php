<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('admin');
	}

	public function index()
	{
		$this->cek_login();
		$data['data'] = $this->admin->get_all('t_buku');
		$this->template->admin('admin/manage_item', $data);
	}

	public function add_item()
	{

		if ($this->input->post('submit', TRUE) == 'submit')
		{
			//validasi
			$this->form_validation->set_rules('nama', '"Nama Buku"', 'required|min_length[4]');
			$this->form_validation->set_rules('kategori', '"Kategori"', 'required|min_length[4]');
			$this->form_validation->set_rules('penerbit', '"Penerbit"', 'required|min_length[4]');
			$this->form_validation->set_rules('penulis', '"Penulis"', 'required|min_length[4]');
			$this->form_validation->set_rules('harga', '"Harga"', 'required|numeric');
			$this->form_validation->set_rules('berat', '"Berat"', 'required|numeric');
			$this->form_validation->set_rules('jumlah_halaman', '"Jumlah Halaman"', 'required|numeric');
			$this->form_validation->set_rules('panjang', '"Panjang"', 'required|numeric');
			$this->form_validation->set_rules('lebar', '"Lebar"', 'required|numeric');
			$this->form_validation->set_rules('status', '"Status"', 'required|numeric');
			$this->form_validation->set_rules('desk', '"Deskripsi"', 'required|min_length[4]');

			if ($this->form_validation->run() == TRUE)
			{
				$config['upload_path'] = '../bukstor/admin_assets/upload/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['file_name'] = 'gambar'.time();

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto'))
				{
					$gbr = $this->upload->data();
					//proses insert
					$items = array
					(
						'nama'   			=> $this->input->post('nama', TRUE),
						'penerbit' 			=> $this->input->post('penerbit', TRUE),
						'penulis'  			=> $this->input->post('penulis', TRUE),
						'harga'  			=> $this->input->post('harga', TRUE),
						'berat'  			=> $this->input->post('berat', TRUE),
						'jumlah_halaman'  	=> $this->input->post('jumlah_halaman', TRUE),
						'panjang'  			=> $this->input->post('panjang', TRUE),
						'lebar'  			=> $this->input->post('lebar', TRUE),
						'status'  		  	=> $this->input->post('status', TRUE),
						'gambar'   		 	=> $gbr['file_name'],
						'deskripsi'			=> $this->input->post('desk', TRUE),
					);

					$id_buku = $this->admin->insert_last('t_buku', $items);
					
					//akses function kategori
					$this->kategori($id_buku, $this->input->post('kategori', TRUE));


					redirect('index.php/item');	
				} else {
					$this->session->set_flashdata('alert', 'Anda belum memasukan gambar');
				}

			}

		}


		$data['kategori'] = $this->input->post('kategori', TRUE);
		$data['kat'] = $this->admin->get_all('t_kategori');
		$data['nama'] 	= $this->input->post('nama', TRUE);
		$data['penerbit'] = $this->input->post('penerbit', TRUE);
		$data['penulis']  = $this->input->post('penulis', TRUE);
		$data['harga']  = $this->input->post('harga', TRUE);
		$data['berat']  = $this->input->post('berat', TRUE);
		$data['jumlah_halaman']  = $this->input->post('jumlah_halaman', TRUE);
		$data['panjang']  = $this->input->post('panjang', TRUE);
		$data['lebar']  = $this->input->post('lebar', TRUE);
		$data['status'] = $this->input->post('status', TRUE);
		$data['desk']   = $this->input->post('desk', TRUE);
		$data['rk'] = '';
		

		$data['header'] = "Tambah Buku";

		$this->template->admin('admin/item_form', $data);
	}

	private function kategori($id_buku, $kategori)
	{
		$kat = explode(", ", $kategori);
		$len = count($kat); //hitung banyak data
		$a = array(' '); //mencegah menggunakan special char
		$b = array ('`','~','!','@','#','$','%','^','&','*','(',')','_','+','=','[',']','{','}','\'','"',':',';','/','\\','?','/','<','>');

		for ($i = 0; $i  < $len; $i ++) {
			$url = str_replace($b, '', $kat[$i]);  //eliminasi special char
			$url = str_replace($a, '-', strtolower($url));

			$cek = $this->admin->get_where('t_kategori', ['url' => $url]);

			if ($cek->num_rows() > 0) {

				$get = $cek->row();
				$id = $get->id_kategori;

			} else {

				$data = array(
					'kategori' => ucwords(trim($kat[$i])),
					'url' => $url
				);

				$id = $this->admin->insert_last('t_kategori', $data);
			}

			$cek2 = $this->admin->get_where('t_rkategori', ['id_buku' => $id_buku, 'id_kategori' => $id]);

			if ($cek2->num_rows() < 1) {
				$this->admin->insert('t_rkategori', ['id_buku' => $id_buku, 'id_kategori' => $id]);
			}
		}
	}

	public function detail()
	{
		$id_buku = $this->uri->segment(3);
		$item = $this->admin->get_where('t_buku', array('id_buku' => $id_buku));
		
		foreach ($item->result() as $key) 
		{
			$data['id_buku'] = $key->id_buku;
			$data['nama'] 	  = $key->nama;
			$data['penerbit'] = $key->penerbit;
			$data['penulis'] 	  = $key->penulis;
			$data['harga'] 	  = $key->harga;
			$data['berat'] 	  = $key->berat;
			$data['jumlah_halaman'] 	  = $key->jumlah_halaman;
			$data['panjang'] 	  = $key->panjang;
			$data['lebar'] 	  = $key->lebar;
			$data['status']   = $key->status;
			$data['gambar']   = $key->gambar;
			$data['desk']     = $key->deskripsi;
		}

		$table = "t_rkategori rk JOIN t_kategori k ON (rk.id_kategori = k.id_kategori)";
		$data['kategori'] = $this->admin->get_where($table, ['rk.id_buku' => $id_buku]);

		$this->template->admin('admin/detail_item', $data);

		
	}

	public function update_item()
	{
		$id_buku = $this->uri->segment(3);

		if ($this->input->post('submit', TRUE) == 'submit')
		{
			//validasi
			$this->form_validation->set_rules('nama', '"Nama Buku"', 'required|min_length[4]');
			$this->form_validation->set_rules('kategori', 'Kategori', 'required|min_length[4]');
			$this->form_validation->set_rules('penerbit', '"Penerbit"', 'required|min_length[4]');
			$this->form_validation->set_rules('penulis', '"Penulis"', 'required|min_length[4]');
			$this->form_validation->set_rules('harga', '"Harga"', 'required|numeric');
			$this->form_validation->set_rules('berat', '"Berat"', 'required|numeric');
			$this->form_validation->set_rules('jumlah_halaman', '"Jumlah Halaman"', 'required|numeric');
			$this->form_validation->set_rules('panjang', '"Panjang"', 'required|numeric');
			$this->form_validation->set_rules('lebar', '"Lebar"', 'required|numeric');
			$this->form_validation->set_rules('status', '"Status"', 'required|numeric');
			$this->form_validation->set_rules('desk', '"Deskripsi"', 'required|min_length[4]');

			if ($this->form_validation->run() == TRUE)
			{
				$config['upload_path'] = '../bukstor/admin_assets/upload/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['file_name'] = 'gambar'.time();

				$this->load->library('upload', $config);

				$items = array
				(
						'nama'   			=> $this->input->post('nama', TRUE),
						'penerbit' 			=> $this->input->post('penerbit', TRUE),
						'penulis'  			=> $this->input->post('penulis', TRUE),
						'harga'  			=> $this->input->post('harga', TRUE),
						'berat'  			=> $this->input->post('berat', TRUE),
						'jumlah_halaman'  	=> $this->input->post('jumlah_halaman', TRUE),
						'panjang'  			=> $this->input->post('panjang', TRUE),
						'lebar'  			=> $this->input->post('lebar', TRUE),
						'status'  		  	=> $this->input->post('status', TRUE),
						'deskripsi'			=> $this->input->post('desk', TRUE),
				);

				if ($this->upload->do_upload('foto'))
				{
					$gbr = $this->upload->data();
					//proses insert
	 			
					unlink('admin_assets/upload/'.$this->input->post('old_pict', TRUE));
					$items['gambar'] = $gbr['file_name'];

					$this->admin->update('t_buku', $items, array('id_buku' => $id_buku));

				} else {
					$this->admin->update('t_buku', $items, array('id_buku' => $id_buku));
				}

				$this->admin->delete('t_rkategori', ['id_buku' => $id_buku]);
				$this->kategori($id_buku, $this->input->post('kategori', TRUE));

				redirect('index.php/item');
			}

		}

		$item = $this->admin->get_where('t_buku', array('id_buku' => $id_buku));

		$table = "t_rkategori rk JOIN t_kategori k ON (rk.id_kategori = k.id_kategori)";
		$rk = $this->admin->get_where($table, ['rk.id_buku' => $id_buku]);

		$value = '';
		foreach ($rk->result() as $k) 
		{
			$value .= ', '.$k->kategori;
		}

		foreach ($item->result() as $key) 
		{
			$data['nama'] 	= $key->nama;
			$data['penerbit'] = $key->penerbit;
			$data['penulis'] 	= $key->penulis;
			$data['harga'] 	= $key->harga;
			$data['berat'] 	= $key->berat;
			$data['jumlah_halaman'] 	= $key->jumlah_halaman;
			$data['panjang'] 	= $key->panjang;
			$data['lebar'] 	= $key->lebar;
			$data['status'] = $key->status;
			$data['desk']   = $key->deskripsi;
			$data['gambar'] = $key->gambar;
		}
		
		$data['kat'] = $this->admin->get_all('t_kategori');
		$data['kategori'] = trim($value, ', ');
		$data['rk'] = $rk;
		$data['header'] = "Update Data Buku";

		$this->template->admin('admin/item_form', $data);
	}


	function cek_login()
	{
		if (!$this->session->userdata('admin'))
		{
			redirect('index.php/login');
		}
	}

	
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template','cart','form_validation'));
		$this->load->model('app');
	}

	public function index()
	{
		$this->load->view('pesanan');
		// $this->template->bukstor('pesanan');
	}

	public function add()
	{
		//pengecekan jika id pada url tidak disertakan maka akan redirect ke home
		if (is_numeric($this->uri->segment(3)))
		{
			$id = $this->uri->segment(3);
			$get = $this->app->get_where('t_buku', array('id_buku' => $id))->row();

			$data = array(
				'id' => $get->id_buku,
				'name' => $get->nama,
				'price' => $get->harga,
				'weight' => $get->berat,
				'qty' => 1
			);

			$this->cart->insert($data);

			echo '<script type="text/javascript">window.history.go(-1);</script>';
		}

		else
		{
			redirect('index.php/home');
		}
	}

	public function update()
	{
		//melakukan pengecekan pada uri
		if ($this->uri->segment(3)) 
		{
			$this->load->library('form_validation');

			$this->form_validation->set_rules('qty', 'Jumlah Pesanan', 'required');

			if ($this->form_validation->run() == TRUE) 
			{
				$data = array(
					'qty' => $this->input->post('qty', TRUE),
					'rowid' => $this->uri->segment(3)
				);

				$this->cart->update($data);

				redirect('index.php/pesanan');
			}

			else
			{
				$this->template->bukstor('pesanan');
			}
		}

		else
		{
			redirect('index.php/pesanan');
		}
	}

	public function delete()
	{
		if ($this->uri->segment(3)) 
		{
			$rowid = $this->uri->segment(3);

			$this->cart->remove($rowid);

			redirect('index.php/pesanan');
		}

		else
		{
			redirect('index.php/pesanan');
		}
	}
}

// <?= validation_errors('<p style="color:red">','</p>'); ?>

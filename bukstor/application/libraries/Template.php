<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

//mempermudah proses templating
class Template
{
	
	function __construct()
	{
		$this->ci =&get_instance();
	}

	function admin($template, $data='')
	{
		$data['content'] = $this->ci->load->view($template, $data, TRUE);
		$data['nav'] = $this->ci->load->view('admin/nav', $data, TRUE);

		$this->ci->load->view('admin/dashboard', $data);
	}

	function bukstor($template, $data='')
	{
		$data['kategori'] = $this->ci->app->get_all('t_kategori');
		$data['content'] = $this->ci->load->view($template, $data, TRUE);
		$data['sider'] = $this->ci->load->view($template, $data, TRUE);


		$this->ci->load->view('index', $data);
	}
}

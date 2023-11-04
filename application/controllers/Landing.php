<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller 
{
	public function index()
	{
		$data['title'] = 'SIPERPUS';
		$data['buku'] = $this->M_buku->show_data();
		$this->load->view('landing',$data);
	}
}

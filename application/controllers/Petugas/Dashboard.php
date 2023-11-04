<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['title'] = 'SIPERPUS';
		$data['total_anggota'] = $this->M_count->total_anggota();
		$data['total_buku'] = $this->M_count->total_buku();
		$data['total_peminjaman'] = $this->M_count->total_peminjaman();
		$data['total_denda'] = $this->M_count->total_denda();
		$this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
		$this->load->view('petugas/dashboard',$data);
		$this->load->view('partials/footer');
	}
}

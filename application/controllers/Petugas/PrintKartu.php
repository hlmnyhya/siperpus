<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrintKartu extends CI_Controller {

    public function cetak_kartu($id_anggota)
    {
        $where = array('id_anggota' => $id_anggota);
        $data['anggota'] = $this->M_anggota->get_anggota_by_id($id_anggota);
        $data['title'] = "SIPERPUS";
        $this->load->view('partials/header',$data);
        $this->load->view('petugas/anggota/cetak_anggota', $data);
    }
    
    public function cetak_anggota()
	{
		$data['title'] = 'SIPERPUS';
		$data['anggota'] = $this->M_anggota->show_data();
		$this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
		$this->load->view('petugas/anggota/daftar_anggota_cetak',$data);
		$this->load->view('partials/footer');
	}
}

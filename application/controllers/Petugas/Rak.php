<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rak extends CI_Controller {

	public function index()
	{
		$data['title'] = 'SIPERPUS';
		$data['rak'] = $this->M_rak->show_data();
		$this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
		$this->load->view('petugas/rak/rak',$data);
		$this->load->view('partials/footer');
	}

    public function edit_rak($id_rak)
	{
		$where = array('id_rak' => $id_rak);
		$data['users'] = $this->db->query("SELECT * FROM rak WHERE id_rak = '$id_rak'")->result();
		$data['title'] = "SIPERPUS";
		$this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
        $this->load->view('petugas/rak/ubah_rak',$data);
        $this->load->view('partials/footer');
	}


		public function tambah_data_aksi()
{
    $kode = htmlspecialchars($this->input->post('kode'));
    $lokasi = htmlspecialchars($this->input->post('lokasi'));

    if (empty($kode) || empty($lokasi) ) {
        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Validasi Form Gagal!</strong> Silakan isi formulir dengan benar.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    } else {
        $data = array(
            'kode' => $kode,
            'lokasi' => $lokasi,
        );

        $inserted = $this->M_rak->insert_data($data, 'rak');

        if ($inserted) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil ditambahkan!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal menambahkan data.</strong> Silakan coba lagi nanti.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        }
    }

    redirect('petugas_data_rak');
}

public function update_data_aksi()
{
    $id_rak = $this->input->post('id_rak');
    $kode = htmlspecialchars($this->input->post('kode'));
    $lokasi = htmlspecialchars($this->input->post('lokasi'));

    if (empty($kode) || empty($lokasi)) {
        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Validasi Form Gagal!</strong> Silakan isi formulir dengan benar.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    } else {
        $data = array(
            'kode' => $kode,
            'lokasi' => $lokasi,
        );

        $where = array('id_rak' => $id_rak);

        $updated = $this->M_rak->update_data('rak', $data, $where);

        if ($updated) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diupdate!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal mengupdate data.</strong> Silakan coba lagi nanti.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        }
    }

    redirect('petugas_data_rak');
}

public function delete_data_aksi($id_rak)
{
    $where = array('id_rak' => $id_rak);
    $deleted = $this->M_rak->delete_data($where, 'rak');

    if ($deleted) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    } else {
        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal menghapus data.</strong> Silakan coba lagi nanti.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    }

    redirect('petugas_data_rak');
}


}

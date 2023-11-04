<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriBuku extends CI_Controller {

	public function index()
	{
		$data['title'] = 'SIPERPUS';
		$data['kategori'] = $this->M_kategori_buku->show_data();
		$this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
		$this->load->view('petugas/kategori_buku/kategori_buku',$data);
		$this->load->view('partials/footer');
	}

    public function edit_kategori($id_kategori_buku)
	{
		$where = array('id_kategori_buku' => $id_kategori_buku);
		$data['users'] = $this->db->query("SELECT * FROM kategori_buku WHERE id_kategori_buku = '$id_kategori_buku'")->result();
		$data['title'] = "SIPERPUS";
		$this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
        $this->load->view('petugas/kategori_buku/ubah_kategori',$data);
        $this->load->view('partials/footer');
	}


	public function tambah_data_aksi()
{
    $kategori = htmlspecialchars($this->input->post('kategori'));

    if (empty($kategori)) {
        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Validasi Form Gagal!</strong> Silakan isi formulir dengan benar.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    } else {
        $data = array(
            'kategori' => $kategori,
        );

        $inserted = $this->M_kategori_buku->insert_data($data, 'kategori_buku');

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

    redirect('petugas_data_kategori');
}

public function update_data_aksi()
{
    $id_kategori_buku = $this->input->post('id_kategori_buku');
    $kategori = htmlspecialchars($this->input->post('kategori'));

    if (empty($kategori)) {
        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Validasi Form Gagal!</strong> Silakan isi formulir dengan benar.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    } else {
        $data = array(
            'kategori' => $kategori,
        );

        $where = array('id_kategori_buku' => $id_kategori_buku);

        $updated = $this->M_kategori_buku->update_data('kategori_buku', $data, $where);

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

    redirect('petugas_data_kategori');
}


	public function delete_data_aksi($id_kategori_buku)
{
    $where = array('id_kategori_buku' => $id_kategori_buku);
    $deleted = $this->M_kategori_buku->delete_data($where, 'kategori_buku');

    if ($deleted) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    } else {
         $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    }
    redirect('petugas_data_kategori');
}

}

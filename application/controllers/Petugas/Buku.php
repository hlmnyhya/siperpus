<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function index()
	{
		$data['title'] = 'SIPERPUS';
		$data['buku'] = $this->M_buku->show_data();
		$data['rak'] = $this->M_buku->tampil_rak();
		$data['kategori'] = $this->M_buku->tampil_kategori();
		$data['penerbit'] = $this->M_buku->tampil_penerbit();
		$data['pengarang'] = $this->M_buku->tampil_pengarang();
		$this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
		$this->load->view('petugas/buku/buku',$data);
		$this->load->view('partials/footer');
	}

     public function edit_buku($id_buku)
	{
		$where = array('id_buku' => $id_buku);
		$data['users'] = $this->db->query("SELECT * FROM buku WHERE id_buku = '$id_buku'")->result();
		$data['title'] = "SIPERPUS";
        $data['rak'] = $this->M_buku->tampil_rak();
		$data['kategori'] = $this->M_buku->tampil_kategori();
		$data['penerbit'] = $this->M_buku->tampil_penerbit();
		$data['pengarang'] = $this->M_buku->tampil_pengarang();
		$this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
        $this->load->view('petugas/buku/ubah_buku',$data);
        $this->load->view('partials/footer');
	}

	public function tambah_data_aksi()
{
    $judul = htmlspecialchars($this->input->post('judul'));
    $tahun_terbit = htmlspecialchars($this->input->post('tahun_terbit'));
    $jumlah = htmlspecialchars($this->input->post('jumlah'));
    $isbn = htmlspecialchars($this->input->post('isbn'));
    $id_pengarang = htmlspecialchars($this->input->post('id_pengarang'));
    $id_penerbit = htmlspecialchars($this->input->post('id_penerbit'));
    $id_kategori_buku = htmlspecialchars($this->input->post('id_kategori_buku'));
    $id_rak = htmlspecialchars($this->input->post('id_rak'));

       // Menggunakan $_FILES untuk mendapatkan informasi upload file
    $foto = $_FILES['cover']['name'];

    // Konfigurasi upload gambar profil
    $config_profil['upload_path'] = './uploads/cover/';
    $config_profil['allowed_types'] = 'gif|jpg|jpeg|png|webp';
    $config_profil['max_size'] = 4096;

    $this->load->library('upload', $config_profil);
    $this->upload->initialize($config_profil);

    if (!$this->upload->do_upload('cover')) {
        // Jika upload gagal, atur pesan validasi dan kembali ke halaman sebelumnya
        $error = $this->upload->display_errors();
        $this->session->set_flashdata('error', $error);
    } else {
        $data_gambar = $this->upload->data();
        $gambar = $data_gambar['file_name'];

        $data = array(
            'judul' => $judul,
            'tahun_terbit' => $tahun_terbit,
            'jumlah' => $jumlah,
            'isbn' => $isbn,
            'cover' => $gambar,
            'id_pengarang' => $id_pengarang,
            'id_penerbit' => $id_penerbit,
            'id_kategori_buku' => $id_kategori_buku,
            'id_rak' => $id_rak
        );

        $inserted = $this->M_buku->insert_data($data, 'buku');

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

    redirect('petugas_data_buku');
}

public function update_data_aksi()
{
    $id_buku = $this->input->post('id_buku');
    $judul = htmlspecialchars($this->input->post('judul'));
    $tahun_terbit = htmlspecialchars($this->input->post('tahun_terbit'));
    $jumlah = htmlspecialchars($this->input->post('jumlah'));
    $isbn = htmlspecialchars($this->input->post('isbn'));
    $id_pengarang = htmlspecialchars($this->input->post('id_pengarang'));
    $id_penerbit = htmlspecialchars($this->input->post('id_penerbit'));
    $id_kategori_buku = htmlspecialchars($this->input->post('id_kategori_buku'));
    $id_rak = htmlspecialchars($this->input->post('id_rak'));

    // Menggunakan $_FILES untuk mendapatkan informasi upload file
    $foto = $_FILES['cover']['name'];

    // Konfigurasi upload gambar profil
    $config_profil['upload_path'] = './uploads/cover/';
    $config_profil['allowed_types'] = 'gif|jpg|jpeg|png|webp';
    $config_profil['max_size'] = 4096;

    $this->load->library('upload', $config_profil);
    $this->upload->initialize($config_profil);

    if (!$this->upload->do_upload('cover')) {
        // Jika upload gagal, atur pesan validasi dan kembali ke halaman sebelumnya
        $error = $this->upload->display_errors();
        $this->session->set_flashdata('error', $error);
    } else {
        $data_gambar = $this->upload->data();
        $gambar = $data_gambar['file_name'];

        $data = array(
            'judul' => $judul,
            'tahun_terbit' => $tahun_terbit,
            'jumlah' => $jumlah,
            'isbn' => $isbn,
            'cover' => $gambar,
            'id_pengarang' => $id_pengarang,
            'id_penerbit' => $id_penerbit,
            'id_kategori_buku' => $id_kategori_buku,
            'id_rak' => $id_rak
        );

        $where = array('id_buku' => $id_buku);

        $updated = $this->M_buku->update_data('buku', $data, $where);

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

    redirect('petugas_data_buku');
}

public function delete_data_aksi($id_buku)
{
    $where = array('id_buku' => $id_buku);
    $deleted = $this->M_rak->delete_data($where, 'buku');

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

    redirect('petugas_data_buku');
}


}

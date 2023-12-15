<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller 
{
    public function index()
    {
		$data['title'] = 'SIPERPUS';
		$data['pengembalian'] = $this->M_pengembalian->show_data();
		$data['pengembalian'] = $this->M_pengembalian->show_data_status();
        $data['buku'] = $this->M_buku->show_data();
		$this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
		$this->load->view('petugas/pengembalian/pengembalian',$data);
		$this->load->view('partials/footer');
	}

    public function edit_pengembalian_buku($id_peminjaman)
	{
		$where = array('id_peminjaman' => $id_peminjaman);
        $data['users'] = $this->db->query("SELECT pd.*, b.judul, p.tanggal_pinjam, p.tanggal_kembali, p.id_anggota, p.id_petugas FROM peminjaman_detail pd JOIN buku b ON pd.id_buku = b.id_buku JOIN peminjaman p ON pd.id_peminjaman = p.id_peminjaman WHERE pd.id_peminjaman = '$id_peminjaman' AND pd.status = 'Belum Kembali'")->result();
		$data['title'] = "SIPERPUS";
        $data['buku'] = $this->M_buku->show_data();
        $data['anggota'] = $this->M_anggota->show_data();
		$data['petugas'] = $this->M_petugas->show_data();
		$this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
        $this->load->view('petugas/pengembalian/ubah_pengembalian_buku',$data);
        $this->load->view('partials/footer');
	}

//     public function Detail_Pengembalian($id_peminjaman)
// {
//     $data['title'] = 'SIPERPUS';
//     $where = array('id_peminjaman' => $id_peminjaman);
//     $data['users'] = $this->db->query("SELECT 
//     pd.*,
//     b.judul
// FROM 
//     pengembalian_detail pd
// JOIN 
//     buku b ON pd.id_buku = b.id_buku
// WHERE 
//     pd.id_pengembalian = '$id_peminjaman';
// ")->result();

//     // Load views
//     $this->load->view('partials/header', $data);
//     $this->load->view('partials/navbar');
//     $this->load->view('partials/sidebar_petugas');
//     $this->load->view('petugas/pengembalian/detail_pengembalian', $data);
//     $this->load->view('partials/footer');
// }

   public function Tambah_Buku($id_peminjaman) 
	{
		$where = array('id_peminjaman' => $id_peminjaman);
		$data['title'] = 'SIPERPUS';
		$data['buku'] = $this->M_buku->show_data();
        $data['pengembalian'] = $this->M_pengembalian->show_data();
		$data['users'] = $this->db->query("SELECT  pd.id_peminjaman, pd.id_buku, b.judul FROM  peminjaman_detail pd JOIN  buku b ON pd.id_buku = b.id_buku WHERE pd.id_peminjaman = '$id_peminjaman';")->result();
		$this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
        $this->load->view('petugas/pengembalian/tambah_buku',$data);
		$this->load->view('partials/footer');
    }

public function tambah_data_aksi() 
{
    $data = array(
        'tanggal_pengembalian' => $this->input->post('tanggal_pengembalian'),
        'denda' => $this->input->post('denda'),
        'id_peminjaman' => $this->input->post('id_peminjaman'),
        'id_anggota' => $this->input->post('id_anggota'),
        'id_petugas' => $this->input->post('id_petugas'),
        'id_buku' => $this->input->post('id_buku'),

    );

    $inserted = $this->M_pengembalian->insert_data($data, 'pengembalian');

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

    redirect('petugas_data_pengembalian');
}

public function tambah_data_kembali_aksi() 
{
    $data = array(
        'id_pengembalian' => $this->input->post('id_pengembalian'),
        'id_buku' => $this->input->post('id_buku'),
        'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
        'tanggal_kembali' => $this->input->post('tanggal_kembali'),
        'denda' => $this->input->post('denda')

    );

    $inserted = $this->M_pengembalian->insert_data($data, 'pengembalian_detail');

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

    redirect('petugas_data_pengembalian');
}

public function delete_data_aksi_buku($id_peminjaman)
{
    // Ambil data peminjaman detail berdasarkan id_peminjaman
    $peminjaman_detail = $this->M_peminjaman->get_peminjaman_detail_by_id($id_peminjaman);

    if ($peminjaman_detail) {
        // Mengembalikan jumlah buku yang dipinjam ke stok
        foreach ($peminjaman_detail as $detail) {
            $buku = $this->M_peminjaman->get_buku_by_id($detail->id_buku);
            $data_buku = array(
                'jumlah' => $buku->jumlah + 1
            );
            $this->M_peminjaman->update_jumlah_buku($detail->id_buku, $data_buku);
        }
    }

    // Hapus data peminjaman dan detail peminjaman
    $where = array('id_peminjaman' => $id_peminjaman);
    $deleted = $this->M_peminjaman->delete_data($where, 'pengembalian');

    if ($deleted) {
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
    } else {
        $this->session->set_flashdata('error', 'Gagal menghapus data. Silakan coba lagi nanti.');
    }

    redirect('petugas_data_pengembalian');
}

public function delete_data_aksi($id_peminjaman)
{
    $where = array('id_peminjaman' => $id_peminjaman);
    $deleted = $this->M_rak->delete_data($where, 'peminjaman');

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

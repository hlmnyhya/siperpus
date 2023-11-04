<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller 
{
    public function index()
    {
		$data['title'] = 'SIPERPUS';
		$data['pengembalian'] = $this->M_pengembalian->show_data();
		$this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
		$this->load->view('petugas/pengembalian/pengembalian',$data);
		$this->load->view('partials/footer');
	}

    public function Detail_Pengembalian($id_pengembalian)
	{
		$where = array('id_pengembalian' => $id_pengembalian);
		$data['title'] = 'SIPERPUS';
	    $data['users'] = $this->db->query("SELECT pd.`id_peminjaman`, pd.`id_buku`, p.`tanggal_pinjam`, p.`tanggal_kembali`, p.`id_anggota`, p.`id_petugas`,
        b.`judul`, b.`tahun_terbit`, b.`jumlah`, b.`isbn`, b.`id_pengarang`, b.`id_penerbit`, b.`id_kategori_buku`, b.`id_rak`
        FROM `peminjaman_detail` pd
        JOIN `peminjaman` p ON pd.`id_peminjaman` = p.`id_peminjaman`
        JOIN `buku` b ON pd.`id_buku` = b.`id_buku` 
        WHERE p.`id_peminjaman` ='$id_pengembalian';")->result();
        $this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
        $this->load->view('petugas/pengembalian/detail_pengembalian', $data);
        $this->load->view('partials/footer');
	}

public function tambah_data_aksi() 
{
    $data = array(
        'tanggal_pengembalian' => $this->input->post('tanggal_pengembalian'),
        'denda' => $this->input->post('denda'),
        'id_peminjaman' => $this->input->post('id_peminjaman'),
        'id_anggota' => $this->input->post('id_anggota'),
        'id_petugas' => $this->input->post('id_petugas')
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
}

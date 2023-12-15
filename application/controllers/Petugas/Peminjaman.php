<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller 
{
	public function index()
	{
		$data['title'] = 'SIPERPUS';
		$data['peminjaman'] = $this->M_peminjaman->show_data();
		$data['anggota'] = $this->M_anggota->show_data();
		$data['petugas'] = $this->M_petugas->show_data();
        $data['buku'] = $this->M_buku->show_data();
		$this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
		$this->load->view('petugas/peminjaman/peminjaman',$data);
		$this->load->view('partials/footer');
	}

    public function Detail_Peminjaman($id_peminjaman)
	{
		$where = array('id_peminjaman' => $id_peminjaman);
		$data['title'] = 'SIPERPUS';
		$data['users'] = $this->db->query("SELECT pd.`id_peminjaman`, pd.`id_buku`, pd.`status`, p.`tanggal_pinjam`, p.`tanggal_kembali`, p.`id_anggota`, p.`id_petugas`,
        b.`judul`, b.`tahun_terbit`, b.`jumlah`, b.`isbn`, b.`id_pengarang`, b.`id_penerbit`, b.`id_kategori_buku`, b.`id_rak`
        FROM `peminjaman_detail` pd
        JOIN `peminjaman` p ON pd.`id_peminjaman` = p.`id_peminjaman`
        JOIN `buku` b ON pd.`id_buku` = b.`id_buku` 
        WHERE p.`id_peminjaman` ='$id_peminjaman';")->result();
        $this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
        $this->load->view('petugas/peminjaman/detail_peminjaman', $data);
        $this->load->view('partials/footer');
	}

    public function edit_peminjaman($id_peminjaman)
	{
		$where = array('id_peminjaman' => $id_peminjaman);
		$data['users'] = $this->db->query("SELECT * FROM peminjaman WHERE id_peminjaman = '$id_peminjaman'")->result();
		$data['title'] = "SIPERPUS";
        $data['anggota'] = $this->M_anggota->show_data();
		$data['petugas'] = $this->M_petugas->show_data();
		$this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
        $this->load->view('petugas/peminjaman/ubah_peminjaman',$data);
        $this->load->view('partials/footer');
	}

        public function edit_peminjaman_buku($id_peminjaman)
	{
		$where = array('id_peminjaman' => $id_peminjaman);
		$data['users'] = $this->db->query("SELECT * FROM peminjaman_detail WHERE id_peminjaman = '$id_peminjaman'")->result();
		$data['title'] = "SIPERPUS";
        $data['buku'] = $this->M_buku->show_data();
        $data['anggota'] = $this->M_anggota->show_data();
		$data['petugas'] = $this->M_petugas->show_data();
		$this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
        $this->load->view('petugas/peminjaman/ubah_peminjaman_buku',$data);
        $this->load->view('partials/footer');
	}

    public function Tambah_Buku($id_peminjaman) 
	{
		$where = array('id_peminjaman' => $id_peminjaman);
		$data['title'] = 'SIPERPUS';
		$data['users'] = $this->db->query("SELECT * FROM peminjaman WHERE id_peminjaman = '$id_peminjaman'")->result();
		$data['buku'] = $this->M_buku->show_data();
		// $data['subitem'] = $this->M_permohonan->tampil_subitem();
        $this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
        $this->load->view('petugas/peminjaman/tambah_buku',$data);
		$this->load->view('partials/footer');
    }

  public function tambah_data_aksi_buku() 
{
    $id_buku = $this->input->post('id_buku');
    $id_peminjaman = $this->input->post('id_peminjaman');
    $tanggal_pengembalian = $this->input->post('tanggal_pengembalian');

    // Ambil jumlah buku yang tersedia dari tabel buku
    $buku = $this->M_peminjaman->get_buku_by_id($id_buku);

    if ($buku) {
        // Cek apakah jumlah buku cukup untuk dipinjam
        if ($buku->jumlah > 0) {
            // Kurangi jumlah buku yang tersedia
            $data_buku = array(
                'jumlah' => $buku->jumlah - 1
            );
            $this->M_peminjaman->update_jumlah_buku($id_buku, $data_buku);

            // Tambahkan data ke tabel peminjaman_detail
            $data_peminjaman_detail = array(
                'id_peminjaman' => $id_peminjaman,
                'id_buku' => $id_buku,
                'tanggal_pengembalian' => $tanggal_pengembalian,
                'status' => 'Belum Kembali'
            );
            $inserted = $this->M_peminjaman->insert_data('peminjaman_detail', $data_peminjaman_detail);

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
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Stok buku habis.</strong> Buku tidak dapat dipinjam.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        }
    } else {
        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Buku tidak ditemukan.</strong> Silakan coba lagi nanti.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    }

    redirect('petugas_data_peminjaman');
}

public function update_data_aksi_buku($id_buku)
{
    $id_peminjaman = $this->input->post('id_peminjaman');
    // $tanggal_pengembalian = date('Y-m-d');
    $tanggal_pengembalian = $this->input->post('tanggal_pengembalian');
    $denda = $this->input->post('denda');
    $status = $this->input->post('status');

    // Ambil jumlah buku yang tersedia dari tabel buku
    $buku = $this->M_peminjaman->get_buku_by_id($id_buku);

    if ($buku) {
        // Cek apakah jumlah buku cukup untuk dipinjam
        if ($buku->jumlah > 0) {
            // Kurangi jumlah buku yang tersedia
            $data_buku = array(
                'jumlah' => $buku->jumlah - 1
            );  
            $this->M_peminjaman->update_jumlah_buku($id_buku, $data_buku);

            // Tambahkan data ke tabel peminjaman_detail
            $data_peminjaman_detail = array(
                'id_peminjaman' => $id_peminjaman,
                'id_buku' => $id_buku,
                'tanggal_pengembalian' => $tanggal_pengembalian,
                'denda' => $denda,
                'status' => 'Sudah Kembali'
            );

            // Panggil fungsi update_data dari model M_peminjaman
            $updated = $this->M_peminjaman->update_data('peminjaman_detail', $data_peminjaman_detail, array('id_buku' => $id_buku));

            if ($updated) {
                $this->session->set_flashdata('pesan', 'Data peminjaman detail berhasil diupdate.');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengupdate data peminjaman detail.');
            }
        } else {
            $this->session->set_flashdata('error', 'Stok buku habis. Buku tidak dapat dipinjam.');
        }
    } else {
        $this->session->set_flashdata('error', 'Buku tidak ditemukan. Silakan coba lagi nanti.');
    }

    redirect('petugas_data_pengembalian');
}


    public function tambah_data_aksi() 
{
    // Data untuk peminjaman utama
    $data_peminjaman = array(
        'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
        'tanggal_kembali' => $this->input->post('tanggal_kembali'),
        'id_anggota' => $this->input->post('id_anggota'),
        'id_petugas' => $this->input->post('id_petugas')
    );

    // Insert data peminjaman utama
    $inserted_peminjaman = $this->M_peminjaman->insert_data('peminjaman', $data_peminjaman);

    if ($inserted_peminjaman) {
        // Ambil ID peminjaman yang baru saja diinsert
        $id_peminjaman = $this->db->insert_id();

        // Data untuk peminjaman detail
        $data_peminjaman_detail = array(
            'id_peminjaman' => $id_peminjaman,
            'id_buku' => $this->input->post('id_buku'),
            'tanggal_pengembalian' => $this->input->post('tanggal_pengembalian'),
            'status' => 'Belum Kembali'
        );

        // Ambil jumlah buku yang tersedia dari tabel buku
        $buku = $this->M_peminjaman->get_buku_by_id($data_peminjaman_detail['id_buku']);

        if ($buku && $buku->jumlah > 0) {
            // Kurangi jumlah buku yang tersedia
            $data_buku = array(
                'jumlah' => $buku->jumlah - 1
            );
            $this->M_peminjaman->update_jumlah_buku($data_peminjaman_detail['id_buku'], $data_buku);

            // Insert data peminjaman detail
            $inserted_peminjaman_detail = $this->M_peminjaman->insert_data('peminjaman_detail', $data_peminjaman_detail);

            if ($inserted_peminjaman_detail) {
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
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Stok buku habis.</strong> Buku tidak dapat dipinjam.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        }
    } else {
        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal menambahkan data peminjaman utama.</strong> Silakan coba lagi nanti.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    }

    redirect('petugas_data_peminjaman');
}


    public function update_data_aksi()
{
    $id_peminjaman = $this->input->post('id_peminjaman');
    $data = array(
        'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
        'tanggal_kembali' => $this->input->post('tanggal_kembali'),
        'id_anggota' => $this->input->post('id_anggota'),
        'id_petugas' => $this->input->post('id_petugas')
    );

    $where = array('id_peminjaman' => $id_peminjaman);

    $updated = $this->M_peminjaman->update_data('peminjaman', $data, $where);

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

    redirect('petugas_data_peminjaman');
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
    $deleted = $this->M_peminjaman->delete_data($where, 'peminjaman_detail');

    if ($deleted) {
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
    } else {
        $this->session->set_flashdata('error', 'Gagal menghapus data. Silakan coba lagi nanti.');
    }

    redirect('petugas_data_peminjaman');
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

    redirect('petugas_data_peminjaman');
}


}
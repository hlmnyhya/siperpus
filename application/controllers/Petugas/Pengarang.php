<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengarang extends CI_Controller {

	public function index()
	{
		$data['title'] = 'SIPERPUS';
		$data['pengarang'] = $this->M_pengarang->show_data();
		$this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
		$this->load->view('petugas/pengarang/pengarang',$data);
		$this->load->view('partials/footer');
	}

        public function edit_pengarang($id_pengarang)
	{
		$where = array('id_pengarang' => $id_pengarang);
		$data['users'] = $this->db->query("SELECT * FROM pengarang WHERE id_pengarang = '$id_pengarang'")->result();
		$data['title'] = "SIPERPUS";
		$this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
        $this->load->view('petugas/pengarang/ubah_pengarang',$data);
        $this->load->view('partials/footer');
	}

		public function tambah_data_aksi()
{
    $nama = htmlspecialchars($this->input->post('nama'));
    $alamat = htmlspecialchars($this->input->post('alamat'));
    $telp = htmlspecialchars($this->input->post('telp'));

    if (empty($nama) || empty($alamat) || empty($telp) ) {
        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Validasi Form Gagal!</strong> Silakan isi formulir dengan benar.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    } else {
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'telp' => $telp,
        );

        $inserted = $this->M_penerbit->insert_data($data, 'pengarang');

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

    redirect('petugas_data_pengarang');
}

public function update_data_aksi()
{
    $id_pengarang = $this->input->post('id_pengarang');
    $nama = htmlspecialchars($this->input->post('nama'));
    $alamat = htmlspecialchars($this->input->post('alamat'));
    $telp = htmlspecialchars($this->input->post('telp'));

    if (empty($nama) || empty($alamat) || empty($telp)) {
        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Validasi Form Gagal!</strong> Silakan isi formulir dengan benar.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    } else {
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'telp' => $telp,
        );

        $where = array('id_pengarang' => $id_pengarang);

        $updated = $this->M_pengarang->update_data('pengarang', $data, $where);

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

    redirect('petugas_data_pengarang');
}

public function delete_data_aksi($id_pengarang)
{
    $where = array('id_pengarang' => $id_pengarang);
    $deleted = $this->M_pengarang->delete_data($where, 'pengarang');

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
    redirect('petugas_data_pengarang');
}

}

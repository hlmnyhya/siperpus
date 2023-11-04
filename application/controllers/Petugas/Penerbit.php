<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerbit extends CI_Controller {

	public function index()
	{
		$data['title'] = 'SIPERPUS';
		$data['penerbit'] = $this->M_penerbit->show_data();
		$this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
		$this->load->view('petugas/penerbit/penerbit',$data);
		$this->load->view('partials/footer');
	}

     public function edit_penerbit($id_penerbit)
	{
		$where = array('id_penerbit' => $id_penerbit);
		$data['users'] = $this->db->query("SELECT * FROM penerbit WHERE id_penerbit = '$id_penerbit'")->result();
		$data['title'] = "SIPERPUS";
		$this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
        $this->load->view('petugas/penerbit/ubah_penerbit',$data);
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

        $inserted = $this->M_penerbit->insert_data($data, 'penerbit');

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

    redirect('petugas_data_penerbit');
}

public function update_data_aksi()
{
    $id_penerbit = $this->input->post('id_penerbit');
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

        $where = array('id_penerbit' => $id_penerbit);

        $updated = $this->M_penerbit->update_data('penerbit', $data, $where);

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

    redirect('petugas_data_penerbit');
}

public function delete_data_aksi($id_penerbit)
{
    $where = array('id_penerbit' => $id_penerbit);
    $deleted = $this->M_penerbit->delete_data($where, 'penerbit');

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
    redirect('petugas_data_penerbit');
}
}

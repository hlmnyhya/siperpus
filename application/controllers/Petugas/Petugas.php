<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	public function index()
	{
		$data['title'] = 'SIPERPUS';
		$data['petugas'] = $this->M_petugas->show_data();
		$this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
		$this->load->view('petugas/petugas/petugas',$data);
		$this->load->view('partials/footer');
	}

    public function edit_petugas($id_petugas)
	{
		$where = array('id_petugas' => $id_petugas);
		$data['users'] = $this->db->query("SELECT * FROM petugas WHERE id_petugas = '$id_petugas'")->result();
		$data['title'] = "SIPERPUS";
		$this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
        $this->load->view('petugas/petugas/ubah_petugas',$data);
        $this->load->view('partials/footer');
	}

    public function tambah_data_aksi()
{
    $nama = htmlspecialchars($this->input->post('nama'));
    $username = htmlspecialchars($this->input->post('username'));
    $password = htmlspecialchars(md5($this->input->post('password')));
    $alamat = htmlspecialchars($this->input->post('alamat'));
    $telp = htmlspecialchars($this->input->post('telp'));

    // Menggunakan $_FILES untuk mendapatkan informasi upload file
    $foto = $_FILES['foto']['name'];

    // Konfigurasi upload gambar profil
    $config_profil['upload_path'] = './uploads/profil/';
    $config_profil['allowed_types'] = 'gif|jpg|jpeg|png';
    $config_profil['max_size'] = 4096;

    $this->load->library('upload', $config_profil);
    $this->upload->initialize($config_profil);

    if (!$this->upload->do_upload('foto')) {
        // Jika upload gagal, atur pesan validasi dan kembali ke halaman sebelumnya
        $error = $this->upload->display_errors();
        $this->session->set_flashdata('error', $error);
    } else {
        $data_gambar = $this->upload->data();
        $gambar = $data_gambar['file_name'];

        // Data untuk disimpan ke database
        $data = array(
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
            'alamat' => $alamat,
            'telp' => $telp,
            'foto' => $gambar // Simpan nama file gambar, bukan $foto yang diambil dari input post
        );

        // Panggil model untuk menyimpan data
        $inserted = $this->M_petugas->insert_data($data, 'petugas');

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

    redirect('petugas_data_petugas');
}

public function update_data_aksi()
{
    $id_petugas = $this->input->post('id_petugas');
    $nama = htmlspecialchars($this->input->post('nama'));
    $username = htmlspecialchars($this->input->post('username'));
    $password = htmlspecialchars(md5($this->input->post('password')));
    $alamat = htmlspecialchars($this->input->post('alamat'));
    $telp = htmlspecialchars($this->input->post('telp'));

    // Menggunakan $_FILES untuk mendapatkan informasi upload file
    $foto = $_FILES['foto']['name'];

    // Konfigurasi upload gambar profil
    $config_profil['upload_path'] = './uploads/profil/';
    $config_profil['allowed_types'] = 'gif|jpg|jpeg|png';
    $config_profil['max_size'] = 4096;

    $this->load->library('upload', $config_profil);
    $this->upload->initialize($config_profil);

    if (!$this->upload->do_upload('foto')) {
        // Jika upload gagal, atur pesan validasi dan kembali ke halaman sebelumnya
        $error = $this->upload->display_errors();
        $this->session->set_flashdata('error', $error);
    } else {
        $data_gambar = $this->upload->data();
        $gambar = $data_gambar['file_name'];

        // Data untuk disimpan ke database
        $data = array(
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
            'alamat' => $alamat,
            'telp' => $telp,
            'foto' => $gambar // Simpan nama file gambar, bukan $foto yang diambil dari input post
        );

        // Kondisi untuk melakukan update berdasarkan id_petugas
        $where = array('id_petugas' => $id_petugas);

        // Panggil model untuk melakukan update data
        $updated = $this->M_petugas->update_data('petugas', $data, $where);

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

    redirect('petugas_data_petugas');
}




	public function delete_data_aksi($id_petugas)
{
    $where = array('id_petugas' => $id_petugas);
    $deleted = $this->M_petugas->delete_data($where, 'petugas');

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
    redirect('petugas_data_petugas');
}


}
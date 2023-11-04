<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function index()
	{
		$data['title'] = 'SIPERPUS';
		$data['anggota'] = $this->M_anggota->show_data();
		$this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
		$this->load->view('petugas/anggota/anggota',$data);
		$this->load->view('partials/footer');
	}

	public function detail_anggota($id_anggota) 
	{
        $data['anggota'] = $this->M_anggota->get_anggota_by_id($id_anggota);
        $data['title'] = "SIPERPUS";
       	$this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
        $this->load->view('petugas/anggota/detail_anggota', $data);
        $this->load->view('partials/footer');
    }

    	public function edit_anggota($id_anggota)
	{
		$where = array('id_anggota' => $id_anggota);
		$data['users'] = $this->db->query("SELECT * FROM anggota WHERE id_anggota = '$id_anggota'")->result();
		$data['title'] = "SIPERPUS";
		$this->load->view('partials/header',$data);
		$this->load->view('partials/navbar');
		$this->load->view('partials/sidebar_petugas');
        $this->load->view('petugas/anggota/ubah_anggota',$data);
        $this->load->view('partials/footer');
	}

public function tambah_data_aksi()
{
    $nama = htmlspecialchars($this->input->post('nama'));
    $nis = htmlspecialchars($this->input->post('nis'));
    $jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin'));
    $tempat_lahir = htmlspecialchars($this->input->post('tempat_lahir'));
    $tanggal_lahir = $this->input->post('tanggal_lahir');
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
            'nis' => $nis,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat' => $alamat,
            'telp' => $telp,
            'foto' => $gambar // Simpan nama file gambar, bukan $foto yang diambil dari input post
        );

        // Panggil model untuk menyimpan data
        $inserted = $this->M_anggota->insert_data($data, 'anggota');

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

    redirect('petugas_data_anggota');
}

public function update_data_aksi()
{
    $id_anggota = $this->input->post('id_anggota');
    $nama = htmlspecialchars($this->input->post('nama'));
    $nis = htmlspecialchars($this->input->post('nis'));
    $jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin'));
    $tempat_lahir = htmlspecialchars($this->input->post('tempat_lahir'));
    $tanggal_lahir = $this->input->post('tanggal_lahir');
    $alamat = htmlspecialchars($this->input->post('alamat'));
    $telp = htmlspecialchars($this->input->post('telp'));

    // Menggunakan $_FILES untuk mendapatkan informasi upload file
    $foto = $_FILES['foto']['name'];

    // Jika ada file foto baru diupload, proses upload
    if (!empty($foto)) {
        // Konfigurasi upload gambar profil
        $config_profil['upload_path'] = './uploads/profil/';
        $config_profil['allowed_types'] = 'gif|jpg|jpeg|png';
        $config_profil['max_size'] = 4096;

        $this->load->library('upload', $config_profil);
        $this->upload->initialize($config_profil);

        if ($this->upload->do_upload('foto')) {
            $data_gambar = $this->upload->data();
            $gambar = $data_gambar['file_name'];

            // Data untuk disimpan ke database, termasuk foto baru
            $data = array(
                'nama' => $nama,
                'nis' => $nis,
                'jenis_kelamin' => $jenis_kelamin,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'alamat' => $alamat,
                'telp' => $telp,
                'foto' => $gambar
            );
        } else {
            // Jika upload gagal, atur pesan validasi dan kembali ke halaman sebelumnya
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('petugas_data_anggota'); // Redirect ke halaman edit dengan ID anggota
            return;
        }
    } else {
        // Jika tidak ada file foto baru diupload, data foto tetap dari database
        $data = array(
            'nama' => $nama,
            'nis' => $nis,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat' => $alamat,
            'telp' => $telp
        );
    }

    // Panggil model untuk mengupdate data
    $updated = $this->M_anggota->update_data($id_anggota, $data, 'anggota');

    if ($updated) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil diperbarui!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    } else {
        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal memperbarui data.</strong> Silakan coba lagi nanti.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    }

    redirect('petugas_data_anggota');
}


	public function delete_data_aksi($id_anggota)
{
    $where = array('id_anggota' => $id_anggota);
    $deleted = $this->M_anggota->delete_data($where, 'anggota');

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
    redirect('petugas_data_anggota');
}


}

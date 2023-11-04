 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengembalian extends CI_Model
{
    public function show_data()
    {
    return $this->db->query("SELECT 
    p.id_peminjaman, 
    p.tanggal_pinjam, 
    p.tanggal_kembali, 
    a.id_anggota, 
    a.nama AS nama_anggota, 
    a.nis, 
    a.jenis_kelamin, 
    a.tempat_lahir, 
    a.tanggal_lahir, 
    a.alamat AS alamat_anggota, 
    a.telp AS telp_anggota, 
    a.foto AS foto_anggota,
    pt.id_petugas, 
    pt.username, 
    pt.password, 
    pt.nama AS nama_petugas, 
    pt.alamat AS alamat_petugas, 
    pt.telp AS telp_petugas, 
    pt.foto AS foto_petugas,
    peng.id_pengembalian,
    peng.tanggal_pengembalian,
    peng.denda
FROM 
    peminjaman p
JOIN 
    anggota a ON p.id_anggota = a.id_anggota
JOIN 
    petugas pt ON p.id_petugas = pt.id_petugas
LEFT JOIN 
    pengembalian peng ON p.id_peminjaman = peng.id_peminjaman;

")->result();
    }
    public function insert_data($data, $table)
    {
       ($this->db->insert($table, $data));
    }

    public function update_data($table, $data, $where)
    {
        return $this->db->update($table, $data, $where);
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_buku_by_id($id_buku) {
        $this->db->where('id_buku', $id_buku);
        $query = $this->db->get('buku');

        // Mengembalikan hasil query berupa objek buku
        return $query->row();
    }

    public function update_jumlah_buku($id_buku, $data) {
        $this->db->where('id_buku', $id_buku);
        $this->db->update('buku', $data);
        
        // Mengembalikan status operasi update
        return $this->db->affected_rows() > 0;
    }
}
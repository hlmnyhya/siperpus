<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_buku extends CI_Model
{
    public function show_data()
    {
    return $this->db->query("SELECT 
    buku.id_buku, 
    buku.judul, 
    buku.tahun_terbit, 
    buku.jumlah, 
    buku.isbn,
    buku.cover, 
    pengarang.nama AS nama_pengarang, 
    pengarang.alamat AS alamat_pengarang, 
    pengarang.telp AS telp_pengarang, 
    penerbit.nama AS nama_penerbit, 
    penerbit.alamat AS alamat_penerbit, 
    penerbit.telp AS telp_penerbit, 
    rak.kode AS kode_rak, 
    rak.lokasi, 
    kategori_buku.kategori
FROM 
    buku
LEFT JOIN 
    pengarang ON buku.id_pengarang = pengarang.id_pengarang
LEFT JOIN 
    penerbit ON buku.id_penerbit = penerbit.id_penerbit
LEFT JOIN 
    rak ON buku.id_rak = rak.id_rak
LEFT JOIN 
    kategori_buku ON buku.id_kategori_buku = kategori_buku.id_kategori_buku;

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

     public function tampil_kategori()
    {
    return $this->db->query("SELECT * FROM kategori_buku;")->result();
    }
     public function tampil_pengarang()
    {
    return $this->db->query("SELECT * FROM pengarang;")->result();
    }
     public function tampil_penerbit()
    {
    return $this->db->query("SELECT * FROM penerbit;")->result();
    }
     public function tampil_rak()
    {
    return $this->db->query("SELECT * FROM rak;")->result();
    }
}
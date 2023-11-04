<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_count extends CI_Model
{
    public function total_anggota()
    {
        return $this->db->count_all('anggota');
    }
    public function total_buku()
    {
        return $this->db->count_all('buku');
    }
    public function total_peminjaman()
    {
        return $this->db->count_all('peminjaman');
    }
    public function total_denda()
    {
    $query = $this->db->query("SELECT SUM(denda) as total_denda FROM pengembalian")->row()->total_denda;
    return $query;
    }

}
 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengembalian extends CI_Model
{
    public function show_data()
    {
    return $this->db->query("SELECT p.`id_peminjaman`, p.`tanggal_pinjam`, p.`tanggal_kembali`, a.`id_anggota`, a.`nama` AS 'nama_anggota', a.`nis`, a.`jenis_kelamin`, a.`tempat_lahir`, a.`tanggal_lahir`, a.`alamat` AS 'alamat_anggota', a.`telp` AS 'telp_anggota', a.`foto` AS 'foto_anggota',
    pt.`id_petugas`, pt.`username`, pt.`password`, pt.`nama` AS 'nama_petugas', pt.`alamat` AS 'alamat_petugas', pt.`telp` AS 'telp_petugas', pt.`foto` AS 'foto_petugas'
FROM `peminjaman` p
JOIN `anggota` a ON p.`id_anggota` = a.`id_anggota`
JOIN `petugas` pt ON p.`id_petugas` = pt.`id_petugas`;")->result();
    }

    public function show_data_status()
    {
  return $this->db->query("
    SELECT 
        p.`id_peminjaman`, 
        p.`tanggal_pinjam`, 
        p.`tanggal_kembali`, 
        a.`id_anggota`, 
        a.`nama` AS 'nama_anggota', 
        a.`nis`, 
        a.`jenis_kelamin`, 
        a.`tempat_lahir`, 
        a.`tanggal_lahir`, 
        a.`alamat` AS 'alamat_anggota', 
        a.`telp` AS 'telp_anggota', 
        a.`foto` AS 'foto_anggota',
        pt.`id_petugas`, 
        pt.`username`, 
        pt.`password`, 
        pt.`nama` AS 'nama_petugas', 
        pt.`alamat` AS 'alamat_petugas', 
        pt.`telp` AS 'telp_petugas', 
        pt.`foto` AS 'foto_petugas',
        pd.`id_buku`,
        pd.`tanggal_pengembalian`,
        pd.`denda`,
        pd.`status`
    FROM `peminjaman` p
    JOIN `anggota` a ON p.`id_anggota` = a.`id_anggota`
    JOIN `petugas` pt ON p.`id_petugas` = pt.`id_petugas`
    JOIN `peminjaman_detail` pd ON p.`id_peminjaman` = pd.`id_peminjaman`
")->result();

    }

    public function detail_buku($id_peminjaman)
    {
        return $this->db->query("SELECT * FROM pengembalian_detail WHERE id_pengembalian = '$id_peminjaman';")->result();
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

    public function getPengembalianId() {
        // Adjust the query based on your actual database structure
        $query = $this->db->query("SELECT id_pengembalian FROM pengembalian ORDER BY id_pengembalian DESC LIMIT 1");

        // Check if the query was successful
        if ($query) {
            $result = $query->row();
            if ($result) {
                return $result->id_pengembalian;
            }
        }

        // Return a default value or handle the case when there's no result
        return 0;
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_anggota extends CI_Model
{
    public function show_data()
    {
        return $this->db->get('anggota')->result();
    }

    public function insert_data($data, $table)
    {
       ($this->db->insert($table, $data));
    }

    public function update_data($id_anggota, $data, $table)
    {
        $this->db->where('id_anggota', $id_anggota);
        return $this->db->update($table, $data);
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_anggota_by_id($id_anggota) 
    {
    $this->db->select('*');
    $this->db->from('anggota');
    $this->db->where('id_anggota', $id_anggota);
    $query = $this->db->get();
    $result = $query->row();
    return $result;
}
}
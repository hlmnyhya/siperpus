<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{
public function cek_login($username, $password)
    {
     $username   = set_value('username');
      $password   = set_value('password');
    
        $this->db->select('*');
    $this->db->from('petugas');
    $this->db->where('username', $username);
    $this->db->where('password', md5($password));
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->row();
    } else {
        return FALSE;
    }
    }
}
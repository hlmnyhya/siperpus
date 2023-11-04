<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model
{

    public function login($data)
    {
        return $this->db->get_where('user', $data);
    }

    public function show_data()
    {
    return $this->db->query("SELECT users.*, divisi.divisi FROM users JOIN divisi ON users.id_divisi = divisi.id_divisi")->result();
    }

    // menampilkan data level
    public function tampil_role()
    {
        return  $this->db->query("SELECT * FROM role");
    }

    public function tampil_pegawai()
    {
        return  $this->db->query("SELECT * FROM pegawai");
    }

    public function get_data($table)
    {
        return $this->db->get($table);
    }

   public function get_user_by_id($user_id) {
    // Pilih kolom yang ingin Anda ambil dari tabel users
    $this->db->select('users.*, divisi.divisi');
    // Tentukan tabel yang akan dijoin dan kondisinya
    $this->db->from('users');
    $this->db->join('divisi', 'users.id_divisi = divisi.id_divisi', 'left');
    // Berikan kondisi WHERE untuk mencocokkan id_users
    $this->db->where('users.id_users', $user_id);
    // Jalankan query dan ambil satu baris hasilnya
    $query = $this->db->get();
    $result = $query->row(); // Mengembalikan objek hasil query
    // var_dump($result); // Periksa hasil query
    return $result;
}

    // public function cek_data($username)
    // {
    // $this->db->select('username');
    // $this->db->where('username',$username);		
    // $query =$this->db->get('user');
    // $row = $query->row();
    // if ($query->num_rows > 0){
    //      return $row->username; 
    // }else{
    //      return "";
    // }
    // }

    public function insert_data($data, $table)
    {
       return $this->db->insert($table, $data);
    }

    public function update_data($table, $data, $where)
    // public function update_data($id)
    {
        return $this->db->update($table, $data, $where);
        // return $this->db->get_where('akun', ['id_akun' => $id])->row_array();
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function detail_data($id_akun)
    {
        $query = $this->db->query("SELECT * FROM user")->row();
        return $query;
    }

    // public function cek_login()
    // {
    //     $username   = set_value('username');
    //     $password   = set_value('password');

    //     $result     = $this->db->where('username', $username)
    //         ->where('password', md5($password))
    //         ->limit(1)
    //         ->get('akun');

    //     if ($result->num_rows() > 0) {
    //         return $result->row();
    //     } else {
    //         return FALSE;
    //     }
    // }
public function cek_login()
{
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    // Memeriksa apakah username dan password tidak kosong
    if (!empty($username) && !empty($password)) {
        // Mengenkripsi password menggunakan md5()
        $password_hashed = md5($password);

        $result = $this->db->where('username', $username)
                           ->where('password', $password_hashed)
                           ->limit(1)
                           ->get('petugas');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return FALSE;
        }
    } else {
        return FALSE; // Mengembalikan FALSE jika username atau password kosong
    }
}



//    public function cek_login($username, $password)
// {
//       $username   = set_value('username');
//       $password   = set_value('password');
    
//     $this->db->select('*');
//     $this->db->from('users');
//     $this->db->where('username', $username);
//     $this->db->where('password', md5($password));
//     $query = $this->db->get();

//     if ($query->num_rows() == 1) {
//         return $query->row();
//     } else {
//         return FALSE;
//     }
// }


    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('role', 'role.id_role=user.id_role');
        $this->db->like('role', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('username', $keyword);
        return $this->db->get()->result();
    }
}
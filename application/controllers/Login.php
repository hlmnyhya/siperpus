<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data['title'] = 'SIPERPUS';
		$this->load->view('login',$data);
	}

	public function process_login() 
	{
        $username = $this->input->post('username');
    	$password = md5($this->input->post('password'));

        $result = $this->M_users->cek_login($username, $password);

        if ($result) {
            $userdata = array(
                'id' => $result->id,
                'nama' => $result->nama,
                'username' => $result->username,
                'foto' => $result->foto
            );
            $this->session->set_userdata($userdata);

            redirect('dashboard_petugas');
        } else {
            $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Login Gagal, Silahkan Periksa Username dan Password !</div>');
            redirect('login');
        }
    }

	  public function logout() {
        // Destroy session and redirect to login page
        $this->session->sess_destroy();
        redirect('login');
    }
}

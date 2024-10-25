<?php

class Auth extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('username', 'username', 'required', [
            'required' => 'Username tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required', [
            'required' => 'Harap masukkan password!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Login Admin";
            $this->load->view('admin/auth', $data);
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $cek = $this->AuthModel->cek_login($username, $password);

            if ($cek == FALSE) {
                $this->session->set_flashdata('massage', 'Username atau Password salah!');
                redirect('admin/auth');
            } else {
                $this->session->set_userdata('hak_akses', $cek->hak_akses);
                $this->session->set_userdata('nama', $cek->nama);
                $this->session->set_userdata('foto', $cek->foto);
                $this->session->set_userdata('id_admin', $cek->id_admin);
                // Switch cek berdasarkan hak akses
                switch ($cek->hak_akses) {
                    case 1:
                        redirect('admin/dashboard');
                        break;
                    default:
                        break;
                }
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/auth');
    }
}

?>
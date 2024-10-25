<?php

class Pendaftaran extends CI_Controller
{
    public function index()
    {
        $id_lowongan = $this->input->post('id_lowongan');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $cv = $_FILES['cv']['name'];
        if ($cv) {
            $config['upload_path'] = './assets/cv/';
            $config['allowed_types'] = 'pdf';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('cv')) {
                $cv = $this->upload->data('file_name');
                $this->db->set('cv', $cv);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $pelamar = array(
            'nama' => $nama,
            'email' => $email,
            'alamat' => $alamat,
            'tgl_lahir' => $tgl_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'cv' => $cv
        );
        $this->db->insert('pelamar', $pelamar);
        $id_pelamar = $this->db->insert_id();

        $data = array(
            'id_pelamar' => $id_pelamar,
            'id_lowongan' => $id_lowongan,
            'status' => 0,
            'jumlah' => 1
        );
        $this->AdminModel->insert_data('detail', $data);
        $this->session->set_flashdata('pesan', 'Lamaran Berhasil Dikirim, Pemberitahuan selanjutnya akan dikirim lewat email');
        redirect('welcome');
    }
}

?>
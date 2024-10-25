<?php

class Pelamar extends CI_Controller
{
    public function index()
    {
        $data['pelamar'] = $this->db->query("SELECT * FROM pelamar, detail, lowongan WHERE lowongan.id_lowongan = detail.id_lowongan AND pelamar.id_pelamar = detail.id_pelamar")->result();

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/pelamar', $data);
        $this->load->view('admin/footer');
    }
    public function cek_pelamar()
    {
        $id_detail = $this->input->post('id_detail');
        $status = $this->input->post('status');

        $data = array(
            'status' => $status
        );

        $where = array(
            'id_detail' => $id_detail
        );

        $this->AdminModel->update_data('detail', $data, $where);
        $this->session->set_flashdata('pesan', 'Berhasil diupdate');
        redirect('admin/pelamar');
    }
    public function kirimEmail()
    {
        $id_detail = $this->input->post('id_detail');
        $id_pelamar = $this->input->post('id_pelamar');
        $email = $this->input->post('email');
        $tgl_tes = $this->input->post('tgl_tes');
        $jam_tes = $this->input->post('jam_tes');

        $data = array(
            'id_detail' => $id_detail,
            'id_pelamar' => $id_pelamar,
            'tgl_tes' => $tgl_tes,
            'jam_tes' => $jam_tes,
            'status_tes' => 0
        );

        $this->AdminModel->insert_data('tes', $data);

        $pelamar['pelamar'] = $this->db->query("SELECT * FROM detail, pelamar, tes WHERE detail.id_pelamar = pelamar.id_pelamar AND detail.id_detail = tes.id_detail AND detail.id_detail = '$id_detail'")->result();
        if (!empty($email)) {
            $config = [
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_user' => 'rezaditpratama12@gmail.com',
                'smtp_pass' => 'aevmvoutlboludjd',
                'smtp_port' => 465,
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'newline' => "\r\n"
            ];
            $this->load->library('email', $config);
            $this->email->initialize($config);

            $this->email->from('rezaditpratama12@gmail.com', 'Tsalitsa Busana');
            $this->email->to($email);
            $this->email->subject('Undangan Lamaran');

            $message = $this->load->view('admin/undangan-tes', $pelamar, true);
            $this->email->message($message);
            $this->email->send();

            $this->session->set_flashdata('pesan', 'Email berhasil dikirim');
            redirect('admin/pelamar');
        }
    }
}

?>
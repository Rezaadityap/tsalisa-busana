<?php

class Tes extends CI_Controller
{
    public function index()
    {
        $data['peserta'] = $this->db->query("SELECT * FROM tes, detail, pelamar WHERE detail.id_detail = tes.id_detail AND pelamar.id_pelamar = tes.id_pelamar")->result();

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/peserta_tes', $data);
        $this->load->view('admin/footer');
    }
    public function cek_tes()
    {
        $id_tes = $this->input->post('id_tes');
        $nilai_tes = $this->input->post('nilai_tes');

        if ($nilai_tes >= 80) {
            $data = array(
                'nilai_tes' => $nilai_tes,
                'status_tes' => 1
            );

            $where = array(
                'id_tes' => $id_tes
            );
            $this->AdminModel->update_data('tes', $data, $where);
        } else {
            $data = array(
                'nilai_tes' => $nilai_tes,
                'status_tes' => 2
            );

            $where = array(
                'id_tes' => $id_tes
            );
            $this->AdminModel->update_data('tes', $data, $where);
        }

        $this->session->set_flashdata('pesan', 'Berhasil diupdate');
        redirect('admin/tes');
    }
    public function kirimEmail()
    {
        $id_tes = $this->input->post('id_tes');
        $id_detail = $this->input->post('id_detail');
        $id_pelamar = $this->input->post('id_pelamar');
        $email = $this->input->post('email');
        $tgl_inter = $this->input->post('tgl_inter');
        $jam_inter = $this->input->post('jam_inter');

        $data = array(
            'id_tes' => $id_tes,
            'id_detail' => $id_detail,
            'id_pelamar' => $id_pelamar,
            'tgl_inter' => $tgl_inter,
            'jam_inter' => $jam_inter,
            'status_inter' => 0
        );

        $this->AdminModel->insert_data('interview', $data);

        $pelamar['pelamar'] = $this->db->query("SELECT * FROM detail, pelamar, tes, interview WHERE detail.id_pelamar = pelamar.id_pelamar AND detail.id_detail = tes.id_detail AND detail.id_detail = interview.id_detail AND detail.id_detail = '$id_detail'")->result();
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
            $this->email->subject('Undangan Interview');

            $message = $this->load->view('admin/undangan-interview', $pelamar, true);
            $this->email->message($message);
            $this->email->send();

            $this->session->set_flashdata('pesan', 'Email berhasil dikirim');
            redirect('admin/tes');
        }
    }
    public function excel()
    {
        $orderdata = $this->db->query("SELECT * FROM tes, detail, pelamar WHERE detail.id_detail = tes.id_detail AND pelamar.id_pelamar = tes.id_pelamar AND tes.status_tes = 1")->result();
        // print_r($orderdata); exit;
        $this->load->library('PHPExcel');
        $objePHPExecel = new PHPExcel();
        $objePHPExecel->setActiveSheetIndex(0);
        $objePHPExecel->getActiveSheet()->SetCellValue('A1', 'No Tes');
        $objePHPExecel->getActiveSheet()->SetCellValue('B1', 'Nama Peserta');
        $objePHPExecel->getActiveSheet()->SetCellValue('C1', 'Email');
        $objePHPExecel->getActiveSheet()->SetCellValue('D1', 'Jenis Kelamin');
        $objePHPExecel->getActiveSheet()->SetCellValue('E1', 'Alamat');
        $objePHPExecel->getActiveSheet()->SetCellValue('F1', 'Nilai');

        $kolom = 2;
        foreach ($orderdata as $val) {
            $objePHPExecel->getActiveSheet()->SetCellValue('A' . $kolom, $val->id_tes);
            $objePHPExecel->getActiveSheet()->SetCellValue('B' . $kolom, $val->nama);
            $objePHPExecel->getActiveSheet()->SetCellValue('C' . $kolom, $val->email);
            $objePHPExecel->getActiveSheet()->SetCellValue('D' . $kolom, $val->jenis_kelamin);
            $objePHPExecel->getActiveSheet()->SetCellValue('E' . $kolom, $val->alamat);
            $objePHPExecel->getActiveSheet()->SetCellValue('F' . $kolom, $val->nilai_tes);

            $kolom++;
        }
        $objWrite = PHPExcel_IOFactory::createWriter($objePHPExecel, 'Excel2007');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Daftar Peserta Lulus Tes.xlsx"');
        header('Cache-Control: max-age=0');
        ob_end_clean();

        $objWrite->save('php://output');
        exit();
    }
}

?>
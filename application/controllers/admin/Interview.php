<?php

class Interview extends CI_Controller
{
    public function index()
    {
        $data['peserta'] = $this->db->query("SELECT * FROM interview, tes, detail, pelamar WHERE detail.id_detail = interview.id_detail AND pelamar.id_pelamar = interview.id_pelamar AND tes.id_tes = interview.id_tes")->result();

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/peserta_interview', $data);
        $this->load->view('admin/footer');
    }
    public function cek_interview()
    {
        $id_inter = $this->input->post('id_inter');
        $status_inter = $this->input->post('status_inter');

        $data = array(
            'status_inter' => $status_inter
        );

        $where = array(
            'id_inter' => $id_inter
        );

        $this->AdminModel->update_data('interview', $data, $where);
        $this->session->set_flashdata('pesan', 'Berhasil diupdate');
        redirect('admin/interview');
    }
    public function kirimEmail()
    {
        $id_inter = $this->input->post('id_inter');
        $id_detail = $this->input->post('id_detail');
        $email = $this->input->post('email');
        $tgl_inter = $this->input->post('tgl_inter');
        $jam_inter = $this->input->post('jam_inter');

        $data = array(
            'tgl_inter' => $tgl_inter,
            'jam_inter' => $jam_inter
        );

        $where = array(
            'id_inter' => $id_inter
        );

        $this->AdminModel->update_data('interview', $data, $where);

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
            $this->email->subject('Undangan Pemanggilan Kerja');

            $message = $this->load->view('admin/undangan-pemanggilan', $pelamar, true);
            $this->email->message($message);
            $this->email->send();

            $this->session->set_flashdata('pesan', 'Email berhasil dikirim');
            redirect('admin/interview');
        }
    }
    public function excel()
    {
        $orderdata = $this->db->query("SELECT * FROM interview, tes, detail, pelamar WHERE detail.id_detail = interview.id_detail AND pelamar.id_pelamar = interview.id_pelamar AND tes.id_tes = interview.id_tes AND interview.id_inter = 1")->result();
        // print_r($orderdata); exit;
        $this->load->library('PHPExcel');
        $objePHPExecel = new PHPExcel();
        $objePHPExecel->setActiveSheetIndex(0);
        $objePHPExecel->getActiveSheet()->SetCellValue('A1', 'No Interview');
        $objePHPExecel->getActiveSheet()->SetCellValue('B1', 'Nama Peserta');
        $objePHPExecel->getActiveSheet()->SetCellValue('C1', 'Email');
        $objePHPExecel->getActiveSheet()->SetCellValue('D1', 'Jenis Kelamin');
        $objePHPExecel->getActiveSheet()->SetCellValue('E1', 'Alamat');

        $kolom = 2;
        foreach ($orderdata as $val) {
            $objePHPExecel->getActiveSheet()->SetCellValue('A' . $kolom, $val->id_inter);
            $objePHPExecel->getActiveSheet()->SetCellValue('B' . $kolom, $val->nama);
            $objePHPExecel->getActiveSheet()->SetCellValue('C' . $kolom, $val->email);
            $objePHPExecel->getActiveSheet()->SetCellValue('D' . $kolom, $val->jenis_kelamin);
            $objePHPExecel->getActiveSheet()->SetCellValue('E' . $kolom, $val->alamat);

            $kolom++;
        }
        $objWrite = PHPExcel_IOFactory::createWriter($objePHPExecel, 'Excel2007');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Daftar Peserta Lulus Interview.xlsx"');
        header('Cache-Control: max-age=0');
        ob_end_clean();

        $objWrite->save('php://output');
        exit();
    }
}

?>
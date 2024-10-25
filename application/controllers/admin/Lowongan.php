<?php

class Lowongan extends CI_Controller
{
    public function index()
    {
        $data['lowongan'] = $this->AdminModel->get_data('lowongan')->result();

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/lowongan', $data);
        $this->load->view('admin/footer');
    }
    public function tambahData()
    {
        $posisi = $this->input->post('posisi');
        $gaji = $this->input->post('gaji');
        $kualifikasi = $this->input->post('kualifikasi');
        $tgl_mulai = $this->input->post('tgl_mulai');
        $tgl_akhir = $this->input->post('tgl_akhir');

        $data = array(
            'posisi' => $posisi,
            'gaji' => $gaji,
            'kualifikasi' => $kualifikasi,
            'tgl_mulai' => $tgl_mulai,
            'tgl_akhir' => $tgl_akhir,
            'jumlah' => 0
        );

        $this->AdminModel->insert_data('lowongan', $data);
        $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan');
        redirect('admin/lowongan');
    }
    public function editData()
    {
        $id_lowongan = $this->input->post('id_lowongan');
        $posisi = $this->input->post('posisi');
        $gaji = $this->input->post('gaji');
        $kualifikasi = $this->input->post('kualifikasi');
        $tgl_mulai = $this->input->post('tgl_mulai');
        $tgl_akhir = $this->input->post('tgl_akhir');

        $data = array(
            'posisi' => $posisi,
            'gaji' => $gaji,
            'kualifikasi' => $kualifikasi,
            'tgl_mulai' => $tgl_mulai,
            'tgl_akhir' => $tgl_akhir
        );

        $where = array(
            'id_lowongan' => $id_lowongan
        );

        $this->AdminModel->update_data('lowongan', $data, $where);
        $this->session->set_flashdata('pesan', 'Data berhasil diupdate');
        redirect('admin/lowongan');
    }
    public function deleteData($id)
    {
        $tables = array('lowongan', 'detail');
        $this->db->where('id_lowongan', $id);
        $this->db->delete($tables);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
        redirect('admin/lowongan');
    }
}

?>
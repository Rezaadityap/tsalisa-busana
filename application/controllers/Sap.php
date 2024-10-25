<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sap extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('sap_odata');
    }

    public function send_data_to_sap() {
        $data = [
            'key1' => 'value1',
            'key2' => 'value2',
            // tambahkan data lainnya sesuai kebutuhan
        ];

        $result = $this->sap_odata->send_data('some/odata/endpoint', $data);

        if ($result) {
            echo "Data berhasil dikirim ke SAP.";
        } else {
            echo "Gagal mengirim data ke SAP.";
        }
    }
}
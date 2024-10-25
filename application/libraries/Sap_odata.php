<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use GuzzleHttp\Client;

class Sap_odata {
    private $client;

    public function __construct() {
        $this->client = new Client([
            'base_uri' => 'https://sap-server.com/odata/',
            'auth' => ['username', 'password'],
        ]);
    }

    public function send_data($endpoint, $data) {
        try {
            $response = $this->client->post($endpoint, [
                'json' => $data
            ]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $e) {
            log_message('error', 'SAP OData Error: ' . $e->getMessage());
            return false;
        }
    }
}
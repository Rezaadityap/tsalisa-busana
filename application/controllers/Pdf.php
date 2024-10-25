<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Inisialisasi Dompdf
$options = new Options();
$options->set('isRemoteEnabled', true); // Mengizinkan pemuatan gambar jarak jauh
$dompdf = new Dompdf($options);

// HTML yang akan dikonversi menjadi PDF
$html = '
<html>
    <head>
        <title>Contoh PDF</title>
    </head>
    <body>
        <h1>Hello, World!</h1>
        <p>Ini adalah contoh PDF yang dibuat menggunakan Dompdf.</p>
    </body>
</html>';

// Memuat konten HTML
$dompdf->loadHtml($html);

// (Opsional) Mengatur ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');

// Merender PDF
$dompdf->render();

// Output PDF ke browser
$dompdf->stream("contoh_pdf", array("Attachment" => 0));
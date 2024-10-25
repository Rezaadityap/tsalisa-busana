<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Pelamar</title>
</head>

<body>
    <p>Selamat Siang,</p>
    <?php foreach ($pelamar as $val): ?>
        <?php $date = $val->tgl_tes; ?>
        <p>
            <b>
                <?= $val->nama ?>
            </b>
        </p>
        <p>Sesuai dengan pendaftaran online yang saudara lakukan di website Tsalitsa Busana, dengan ini kami mengundang
            untuk melakukan test dan verifikasi data Toko Tsalitsa Busana :</p>
        <p>Jadwal:
            <?= date('d F Y', strtotime($date)); ?>
        </p>
        <p> Waktu:
            <?= $val->jam_tes ?> WIB.
        </p>
        <p>Tempat: Toko Tsalitsa Busana</p>
        <p>Berkas yang dibawa : Fotokopi KTP (e-KTP Karawang); Ijazah; Kir Dokter; SKHUN (lulusan 2019 ke belakang) atau
            Transkrip Nilai (Lulusan 2020).
        </p>
        <p>Pakaian bebas rapi dan sopan (Celana panjang dan memakai sepatu); Wajib memakai masker medis;
        </p>
        <p>Demikian kami sampaikan, terimakasih.</p>
        <p>Best Regards,</p>
        <p><b>TSALITSA BUSANA</b></p>
    <?php endforeach; ?>
</body>

</html>
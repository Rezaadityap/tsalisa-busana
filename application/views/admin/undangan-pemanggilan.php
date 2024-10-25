<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Pemanggilan</title>
</head>

<body>
    <p>Selamat Siang,</p>
    <?php foreach ($pelamar as $val): ?>
        <?php $date = $val->tgl_inter; ?>
        <p>
            <b>
                <?= $val->nama ?>
            </b>
        </p>
        <p>Selamat anda dinyatakan lulus Interview, Silahkan datang pada jadwal yang sudah ditentukan untuk mulai bekerja
            pada :</p>
        <p>Jadwal:
            <?= date('d F Y', strtotime($date)); ?>
        </p>
        <p> Waktu:
            <?= $val->jam_inter ?> WIB.
        </p>
        <p>Tempat: Toko Tsalitsa Busana</p>
        <p>Demikian kami sampaikan, terimakasih.</p>
        <p>Best Regards,</p>
        <p><b>TSALITSA BUSANA</b></p>
    <?php endforeach; ?>
</body>

</html>
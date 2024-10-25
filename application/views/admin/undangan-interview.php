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
    <?php $date = $val->tgl_inter; ?>
    <p>
        <b>
            <?= $val->nama ?>
        </b>
    </p>
    <p>Selamat anda dinyatakan lulus tes dengan nilai <b><?= $val->nilai_tes ?></b>, Selanjutnya anda maju ke tahap
        Interview sesuai pada jadwal dibawah ini :</p>
    <p>Jadwal:
        <?= date('d F Y', strtotime($date)); ?>
    </p>
    <p> Waktu:
        <?= $val->jam_inter ?> WIB.
    </p>
    <p>Tempat: Toko Tsalitsa Busana</p>
    <p>Pakaian bebas rapi dan sopan (Celana panjang dan memakai sepatu); Wajib memakai masker medis;
    </p>
    <p>Demikian kami sampaikan, terimakasih.</p>
    <p>Best Regards,</p>
    <p><b>TSALITSA BUSANA</b></p>
    <?php endforeach; ?>
</body>

</html>
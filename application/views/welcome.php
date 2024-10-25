<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tsalitsa Busana</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/icon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url() ?>assets/css/styles.css" rel="stylesheet" />
    <!-- SWAL -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/swal/sweetalert2.min.css">

</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="<?= base_url() ?>assets/icon.ico" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarRespons"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarRespons">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="#produk">Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="#lowongan">Lowongan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('admin/auth') ?>">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Selamat Datang Di</div>
            <div class="masthead-heading text-uppercase">Tsalitsa Busana</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="#tentang">Lihat Kami</a>
        </div>
    </header>
    <!-- Services-->
    <section class="page-section" id="tentang">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Tentang Kami</h2>
                <h3 class="section-subheading text-muted">Tsalitsa Busana</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Belanja Senang</h4>
                    <p class="text-muted">Dapatkan kepuasan belanja ditoko kami, dengan harga yang relatif murah dan
                        nyaman dikantong anda.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-wand-magic-sparkles fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Desain Elegan</h4>
                    <p class="text-muted">Mampu bersaing dengan toko konveksi lainnya, terutama di desain. Desain yang
                        kami buat sangat fantastis dan modern.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-magnifying-glass fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Lowongan Kerja</h4>
                    <p class="text-muted">Bagi kalian yang punya pengalaman dan keahlian dibidang jahit, disini terbuka
                        lowongan yang mampu membantu anda mengasah skill jahit.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Team-->
    <section class="page-section bg-light" id="produk">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Produk Kami</h2>
                <h3 class="section-subheading text-muted">Elegan dan Fantastis</h3>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/produk/baju1.jpg" alt="..." />
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/produk/baju2.jpg" alt="..." />
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/produk/baju3.jpg" alt="..." />
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/produk/baju4.jpg" alt="..." />
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/produk/celana1.jpg" alt="..." />
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/produk/celana2.jpg" alt="..." />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section bg-light" id="lowongan">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Lowongan</h2>
                <h3 class="section-subheading text-muted">Terbaru</h3>
            </div>
            <?php if (empty($lowongan)) { ?>
            <h3>
                <center><img class="mx-auto" style="width: 300px" src="assets/img/admin/opss.png" alt=""></center>
            </h3>
            <?php } else { ?>
            <?php foreach ($lowongan as $l): ?>
            <?php $date = date('Y-m-d'); ?>
            <?php if ($l->tgl_akhir < $date) { ?>
            <center><img class="mx-auto" style="width: 300px" src="assets/img/admin/opss.png" alt=""></center>
            <?php } else { ?>
            <div class="row">
                <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>"></div>
                <div class="col-lg-12 col-md-6 mb-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item overflow-hidden bg-dark d-flex h-100 p-5 ps-0">
                        <div class="ps-4 text-white">
                            <h3>
                                <b>
                                    <?php echo $l->posisi ?>
                                </b>
                            </h3>
                            <p>
                                <i class="fas fa-clipboard"></i>
                                <?= $l->kualifikasi ?>
                            </p>
                            <p>
                                <i class="fas fa-calendar"></i>
                                <?= $l->tgl_mulai ?> -
                                <?= $l->tgl_akhir ?>
                            </p>
                            <p>
                                <i class="fas fa-wallet"></i>
                                Rp.
                                <?php echo number_format((int) $l->gaji, 0, ',', '.') ?>
                            </p>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#pendaftaran<?= $l->id_lowongan ?>">
                                Lamar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php endforeach; ?>
            <?php } ?>
        </div>
    </section>
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="kontak">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-6 mb-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="col-md-13">
                        <div class="box" id="contact">
                            <h1>Hubungi Kami</h1>

                            <p class="lead">Untuk keluhan dan saran silahkan hubungi kami melalui kontak berikut :</p>

                            <hr>

                            <div class="row">
                                <div class="col-sm-4">
                                    <h3><i class="fa fa-map-marker"></i> Alamat</h3>
                                    <p>Jl. ABC
                                        <br>No. 7
                                        <br>DEF
                                        <br>GHI
                                        <br>
                                        <strong>Karawang</strong>
                                    </p>
                                </div>
                                <!-- /.col-sm-4 -->
                                <div class="col-sm-4">
                                    <h3><i class="fa fa-phone"></i> Call center</h3>
                                    <p class="text-muted">Untuk fast respon silahkan hubungi nomer berikut. </p>
                                    <p><strong>+62-822-6058-9693</strong>
                                    </p>
                                </div>
                                <!-- /.col-sm-4 -->
                                <div class="col-sm-4">
                                    <h3><i class="fa fa-envelope"></i> Email</h3>
                                    <p class="text-muted">Gunakan email untuk memberikan saran dan keluhan.</p>
                                    <ul>
                                        <li><strong><a href="mailto:">tsalisabusana@gmail.com</a></strong>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.col-sm-4 -->
                            </div>
                            <!-- /.row -->

                            <hr>
                        </div>


                    </div>
                    <!-- /.col-md-9 -->
                </div>
            </div>
        </div>
    </section>
    <!-- Modal Edit-->
    <?php foreach ($lowongan as $l): ?>
    <div class="modal fade" id="pendaftaran<?= $l->id_lowongan ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?php echo base_url('pendaftaran') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pendaftaran</h5>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12 p-0">
                            <div class="form-popup form-group mb-2">
                                <label>Nama Lengkap</label><span style="color: red;">*</span>
                                <input type="hidden" name="id_lowongan" value="<?= $l->id_lowongan ?>">
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Anda"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-12 p-0">
                            <div class="form-popup form-group mb-2">
                                <label>Email</label><span style="color: red;">*</span>
                                <input type="email" name="email" class="form-control" placeholder="Masukkan Email Anda"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-12 p-0">
                            <div class="form-popup form-group mb-2">
                                <label>Alamat</label><span style="color: red;">*</span>
                                <textarea name="alamat" id="" cols="20" rows="5" class="form-control"
                                    placeholder="Masukkan Alamat Anda" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 p-0">
                            <div class="form-popup form-group mb-2">
                                <label>Tanggal Lahir</label><span style="color: red;">*</span>
                                <input type="date" name="tgl_lahir" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12 p-0">
                            <div class="form-popup form-group mb-2">
                                <label>Jenis Kelamin</label><span style="color: red;">*</span>
                                <select name="jenis_kelamin" class=form-control>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki"> Laki - laki</option>
                                    <option value="perempuan"> Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 p-0">
                            <div class="form-popup form-group mb-2">
                                <label>Upload CV</label><span style="color: red;">*</span>
                                <input type="file" name="cv" class="form-control" required>
                                <small style="color: red;">* File harus pdf</small>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php endforeach; ?>
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="my-3 my-lg-0">Copyright &copy; Tsalitsa Busana 2024</div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
    <script src="<?php echo base_url() ?>/assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SWAL -->
    <script src="<?php echo base_url() ?>assets/swal/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url() ?>assets/swal/sweetalert2.min.js"></script>
    <script src="<?php echo base_url() ?>assets/swal/myscript.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
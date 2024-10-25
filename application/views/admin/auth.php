<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $title ?>
    </title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="	<?php echo base_url('assets/adminlte/') ?>dist/css/adminlte.min.css">
    <!-- SWAL -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/swal/sweetalert2.min.css">
    <!-- icon -->
    <link rel="icon" type="image/x-icon" href="assets/icon.ico" />
</head>

<body class="hold-transition login-page">

    <div class="login-box">
        <div class="dataFlash" data-flashdata="<?php echo $this->session->flashdata('massage'); ?>"></div>
        <div class="login-logo">Tsalitsa Busana</div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Login untuk masuk</p>
                <div class="alert alert-danger d-none"></div>
                <form method="POST" action="<?php echo base_url('admin/auth') ?>">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <?php echo form_error('username', '<div class = "text-small text-danger"></div>') ?>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?php echo form_error('password', '<div class = "text-small text-danger"></div>') ?>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">Login</button>
                        <a href="<?php echo base_url('welcome') ?>" class="btn btn-block btn-secondary">Kembali</a>
                    </div>
                </form>
                <br />
                <div class="social-auth-links text-center mb-3">
                    <p class="text-center text-xs mb-1">
                        &copy; Tsalitsa Busana 2024. All Right Reserved
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/adminlte/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets/adminlte/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js">
    </script>
    <!-- ChartJS -->
    <script src="<?php echo base_url('assets/adminlte/') ?>dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url('assets/adminlte/plugins/jquery-validation/jquery.validate.min.js') ?>">
    </script>
    <!-- SWAL -->
    <script src="<?php echo base_url() ?>assets/swal/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url() ?>assets/swal/sweetalert2.min.js"></script>
    <script src="<?php echo base_url() ?>assets/swal/myscript.js"></script>
</body>

</html>
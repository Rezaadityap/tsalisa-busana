<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?php echo base_url('admin/dashboard') ?>" class="site_title"><i
                                class="fa fa-shopping-cart"></i><span> Tsalitsa
                                Busana</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="<?php echo base_url('assets/img/admin/') . $this->session->userdata('foto') ?>"
                                alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Hallo,</span>
                            <h2>
                                <?php echo $this->session->userdata('nama') ?>
                            </h2>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <ul class="nav side-menu">
                                <li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-home"></i>
                                        Dashboard</a>
                                </li>
                                <li><a href="<?php echo base_url('admin/lowongan') ?>"><i class="fa fa-industry"></i>
                                        Lowongan</a>
                                </li>
                                <li><a href="<?php echo base_url('admin/pelamar') ?>"><i class="fa fa-users"></i>
                                        Pelamar
                                        </span></a>
                                </li>
                                <li><a><i class="fa fa-bars"></i>Pendataan <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?= base_url('admin/tes') ?>">Peserta Tes</a></li>
                                        <li><a href="<?= base_url('admin/interview') ?>">Peserta Interview</a></li>
                                    </ul>
                                </li>
                                <li><a class="tombol-keluar" href="<?php echo base_url('admin/auth/logout') ?>"><i
                                            class="fa fa-sign-out"></i>
                                        Logout
                                        </span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url('assets/img/admin/') . $this->session->userdata('foto') ?>"
                                        alt="">
                                    <?php echo $this->session->userdata('nama') ?>
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item tombol-keluar"
                                        href="<?php echo base_url('admin/auth/logout') ?>"><i
                                            class="fa fa-sign-out pull-right"></i>
                                        Log Out</a>
                                </div>
                            </li>
                            <?php
                            $notifikasi = $this->db->query("SELECT * FROM detail WHERE status = 0")->num_rows();
                            $peserta = $this->db->query("SELECT * FROM detail, pelamar WHERE detail.id_pelamar = pelamar.id_pelamar AND detail.status = 0")->result();
                            ?>
                            <li role="presentation" class="nav-item dropdown open">
                                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1"
                                    data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">
                                        <?= $notifikasi ?>
                                    </span>
                                </a>
                                <ul class="dropdown-menu list-unstyled msg_list" role="menu"
                                    aria-labelledby="navbarDropdown1">
                                    <?php if (empty($peserta)) { ?>
                                        <li class="nav-item">
                                            <p class="text-center">Tidak ada notifikasi pelamar</p>
                                        </li>
                                    <?php } else { ?>
                                        <?php foreach ($peserta as $p): ?>
                                            <li class="nav-item">
                                                <a class="dropdown-item">
                                                    <span>
                                                        <span>
                                                            <?= $p->nama ?>
                                                        </span>
                                                    </span>
                                                    <span class="message">
                                                        <?= $p->alamat ?>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <div class="text-center">
                                                    <a class="dropdown-item" href="<?php echo base_url('admin/pelamar') ?>">
                                                        <strong>Lihat</strong>
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php } ?>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
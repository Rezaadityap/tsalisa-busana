<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Peserta Tes</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <?php if ($peserta) { ?>
                                    <a href="<?= base_url('admin/tes/excel') ?>" class="btn btn-success mb-3"><i
                                            class="fa fa-file-excel-o"></i> Excel</a>
                                <?php } ?>
                                <div class="card-box table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Alamat</th>
                                                <th>Nilai</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <?php if (empty($peserta)) { ?>
                                            <tbody>
                                                <center>
                                                    <p>Belum ada tes.</p>
                                                </center>
                                            </tbody>
                                        <?php } else { ?>
                                            <?php $no = 1;
                                            foreach ($peserta as $p): ?>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <?= $no++ ?>
                                                        </td>
                                                        <td>
                                                            <?= $p->nama ?>
                                                        </td>
                                                        <td>
                                                            <?= $p->email ?>
                                                        </td>
                                                        <td>
                                                            <?= $p->jenis_kelamin ?>
                                                        </td>
                                                        <td>
                                                            <?= $p->alamat ?>
                                                        </td>
                                                        <td>
                                                            <?= $p->nilai_tes ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($p->status_tes == 0) { ?>
                                                                <center><span class="badge badge-pill badge-warning">Menunggu</span>
                                                                </center>
                                                            <?php } ?>
                                                            <?php if ($p->status_tes == 1) { ?>
                                                                <center><span
                                                                        class="badge badge-pill badge-success">Interview</span>
                                                                </center>
                                                            <?php } ?>
                                                            <?php if ($p->status_tes == 2) { ?>
                                                                <center><span class="badge badge-pill badge-danger">Gagal</span>
                                                                </center>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <center>
                                                                <button type="button" class="btn btn-sm btn-info"
                                                                    data-toggle="modal"
                                                                    data-target="#lihatpelamar<?= $p->id_pelamar ?>">
                                                                    <i class="fa fa-eye"></i>
                                                                </button>
                                                                <?php if ($p->status_tes == 1) { ?>
                                                                    <button type="button" class="btn btn-sm btn-danger"
                                                                        data-toggle="modal"
                                                                        data-target="#sendemail<?= $p->id_pelamar ?>">
                                                                        <i class="fa fa-envelope-o"></i>
                                                                    </button>
                                                                <?php } ?>
                                                            </center>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            <?php endforeach; ?>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<!-- Modal Lihat-->
<?php foreach ($peserta as $p): ?>
    <div class="modal fade" id="lihatpelamar<?= $p->id_pelamar ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Pelamar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/tes/cek_tes') ?>" method="post">
                    <div class="modal-body">
                        <div class="col-md-12 p-0">
                            <div class="form-popup form-group mb-2">
                                <label>Nama Pelamar</label>
                                <input type="text" name="pelamar" value="<?= $p->nama ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-12 p-0">
                            <div class="form-popup form-group mb-2">
                                <label>Email</label>
                                <input type="text" name="email" value="<?= $p->email ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-12 p-0">
                            <div class="form-popup form-group mb-2">
                                <label>Nilai Tes <span style="color:red;">*</span></label>
                                <input type="number" name="nilai_tes" class="form-control" placeholder="Masukkan Nilai"
                                    required>
                                <input type="hidden" name="id_tes" value="<?= $p->id_tes ?>" class="form-control">
                                <small style="color: red">*Nilai lebih dari sama dengan 80 = Lulus</small>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- Modal Email-->
<?php foreach ($peserta as $p): ?>
    <div class="modal fade" id="sendemail<?= $p->id_pelamar ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kirim Email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/tes/kirimEmail') ?>" method="post">
                    <div class="modal-body">
                        <div class="col-md-12 p-0">
                            <div class="form-popup form-group mb-2">
                                <label>Nama Pelamar</label>
                                <input type="text" name="nama" value="<?= $p->nama ?>" class="form-control" readonly>
                                <input type="hidden" name="id_detail" value="<?= $p->id_detail ?>" id="">
                                <input type="hidden" name="id_tes" value="<?= $p->id_tes ?>" id="">
                                <input type="hidden" name="id_pelamar" value="<?= $p->id_pelamar ?>" id="">
                            </div>
                        </div>
                        <div class="col-md-12 p-0">
                            <div class="form-popup form-group mb-2">
                                <label>Email</label>
                                <input type="text" name="email" value="<?= $p->email ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-12 p-0">
                            <div class="form-popup form-group mb-2">
                                <label>Tanggal Interview <span style="color: red;">*</span></label>
                                <input type="date" name="tgl_inter" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 p-0">
                            <div class="form-popup form-group mb-2">
                                <label>Jam Interview <span style="color: red;">*</span></label>
                                <input type="time" name="jam_inter" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
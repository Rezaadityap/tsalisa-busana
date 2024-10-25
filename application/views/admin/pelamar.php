<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>"></div>
        <a href="<?= base_url('Sap/send_data_to_sap')?>" class="btn btn-danger">Send Data</a>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data pelamar</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>CV</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <?php if (empty($pelamar)) { ?>
                                        <tbody>
                                            <center>
                                                <p>Belum ada pelamar.</p>
                                            </center>
                                        </tbody>
                                        <?php } else { ?>
                                        <?php $no = 1;
                                            foreach ($pelamar as $p): ?>
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
                                                <td><a href="<?= base_url('assets/cv/' . $p->cv) ?>" target="_blank">
                                                        <?= $p->cv ?>
                                                    </a></td>
                                                <td>
                                                    <?php if ($p->status == 0) { ?>
                                                    <center><span class="badge badge-pill badge-warning">Menunggu</span>
                                                    </center>
                                                    <?php } elseif ($p->status == 1) { ?>
                                                    <center><span class="badge badge-pill badge-success">Seleksi</span>
                                                    </center>
                                                    <?php } else { ?>
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
                                                        <?php if ($p->status == 1) { ?>
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
<?php foreach ($pelamar as $p): ?>
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
            <form action="<?= base_url('admin/pelamar/cek_pelamar') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="col-md-12 p-0">
                        <div class="form-popup form-group mb-2">
                            <label>Nama Pelamar</label>
                            <input type="text" name="pelamar" value="<?= $p->nama ?>" class="form-control" readonly>
                            <input type="hidden" name="id_detail" value="<?= $p->id_detail ?>" id="">
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
                            <label>Alamat</label>
                            <input type="text" name="alamat" value="<?= $p->alamat ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-12 p-0">
                        <div class="form-popup form-group mb-2">
                            <label>Tanggal Lahir</label>
                            <input type="text" name="tgl_lahir" value="<?= $p->tgl_lahir ?>" class="form-control"
                                readonly>
                        </div>
                    </div>
                    <div class="col-md-12 p-0">
                        <div class="form-popup form-group mb-2">
                            <label>Jenis Kelamin</label>
                            <input type="text" name="jenis_kelamin" value="<?= $p->jenis_kelamin ?>"
                                class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-12 p-0">
                        <div class="form-popup form-group mb-2">
                            <label>Posisi</label>
                            <input type="text" name="posisi" value="<?= $p->posisi ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-12 p-0">
                        <div class="form-popup form-group mb-2">
                            <label for="">Status <span style="color: red;">*</span></label>
                            <select name="status" class=form-control>
                                <option value="">-- Pilih Status --</option>
                                <option value="1"> Sesuai</option>
                                <option value="2"> Tidak Sesuai</option>
                            </select>
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
<?php foreach ($pelamar as $p): ?>
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
            <form action="<?= base_url('admin/pelamar/kirimEmail') ?>" method="post">
                <div class="modal-body">
                    <div class="col-md-12 p-0">
                        <div class="form-popup form-group mb-2">
                            <label>Nama Pelamar</label>
                            <input type="text" name="pelamar" value="<?= $p->nama ?>" class="form-control" readonly>
                            <input type="hidden" name="id_detail" value="<?= $p->id_detail ?>" id="">
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
                            <label>Tanggal Tes <span style="color: red;">*</span></label>
                            <input type="date" name="tgl_tes" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 p-0">
                        <div class="form-popup form-group mb-2">
                            <label>Jam Tes <span style="color: red;">*</span></label>
                            <input type="time" name="jam_tes" class="form-control">
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
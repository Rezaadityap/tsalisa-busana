<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>"></div>

        <div class="row">
            <div class="col-md-12 col-sm-6  ">
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                    Tambah Data
                </button>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Lowongan</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Posisi</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Akhir</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <?php if(empty($lowongan)) { ?>
                            <tbody>
                                <center>Belum ada lowongan.</center>
                            </tbody>
                            <?php } else { ?>
                            <?php $no = 1;
                            foreach ($lowongan as $l): ?>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <?php echo $no++ ?>
                                    </th>
                                    <td>
                                        <?= $l->posisi ?>
                                    </td>
                                    <td>
                                        <?= $l->tgl_mulai ?>
                                    </td>
                                    <td>
                                        <?= $l->tgl_akhir ?>
                                    </td>
                                    <td>
                                        <center>
                                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                                                data-target="#lihatsurat<?= $l->id_lowongan ?>">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                                data-target="#editdata<?= $l->id_lowongan ?>">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <a href="<?= base_url('admin/lowongan/deleteData/' . $l->id_lowongan) ?>"
                                                class="btn btn-sm btn-danger tombol-hapus"><i
                                                    class="fa fa-trash"></i></a>
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

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- /page content -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo base_url('admin/lowongan/tambahData') ?>" method="POST"
                enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Lowongan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 p-0">
                        <div class="form-popup form-group mb-2">
                            <label>Posisi</label>
                            <input type="text" name="posisi" class="form-control" placeholder="Masukkan Posisi"
                                required>
                        </div>
                    </div>
                    <div class="col-md-12 p-0">
                        <div class="form-popup form-group mb-2">
                            <label>Gaji</label>
                            <input type="number" name="gaji" class="form-control" placeholder="Masukkan Gaji" required>
                        </div>
                    </div>
                    <div class="col-md-12 p-0">
                        <div class="form-popup form-group mb-2">
                            <label>Kualifikasi</label>
                            <textarea name="kualifikasi" id="" cols="20" rows="5" class="form-control"
                                placeholder="Masukkan Kualifikasi"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 p-0">
                        <div class="form-popup form-group mb-2">
                            <label>Tanggal Mulai</label>
                            <input type="date" name="tgl_mulai" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12 p-0">
                        <div class="form-popup form-group mb-2">
                            <label>Tanggal Akhir</label>
                            <input type="date" name="tgl_akhir" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Lihat-->
<?php foreach ($lowongan as $l): ?>
<div class="modal fade" id="lihatsurat<?= $l->id_lowongan ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 p-0">
                    <div class="form-popup form-group mb-2">
                        <label>Posisi</label>
                        <input type="text" name="posisi" value="<?= $l->posisi ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-md-12 p-0">
                    <div class="form-popup form-group mb-2">
                        <label>Gaji</label>
                        <input type="text" name="gaji"
                            value="Rp. <?php echo number_format((int) $l->gaji, 0, ',', '.') ?>" class="form-control"
                            readonly>
                    </div>
                </div>
                <div class="col-md-12 p-0">
                    <div class="form-popup form-group mb-2">
                        <label>Kualifikasi</label>
                        <input type="text" name="kualifikasi" value="<?= $l->kualifikasi ?>" class="form-control"
                            readonly>
                    </div>
                </div>
                <div class="col-md-12 p-0">
                    <div class="form-popup form-group mb-2">
                        <label>Tanggal Mulai</label>
                        <input type="text" name="tgl_mulai" value="<?= $l->tgl_mulai ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-md-12 p-0">
                    <div class="form-popup form-group mb-2">
                        <label>Tanggal Akhir</label>
                        <input type="text" name="tgl_akhir" value="<?= $l->tgl_akhir ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-md-12 p-0">
                    <div class="form-popup form-group mb-2">
                        <label>Jumlah Pelamar</label>
                        <input type="text" name="jumlah" value="<?= $l->jumlah ?>" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- Modal Edit-->
<?php foreach ($lowongan as $l): ?>
<div class="modal fade" id="editdata<?= $l->id_lowongan ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?php echo base_url('admin/lowongan/editData') ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Lowongan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 p-0">
                        <div class="form-popup form-group mb-2">
                            <label>Posisi</label>
                            <input type="hidden" name="id_lowongan" value="<?= $l->id_lowongan ?>">
                            <input type="text" name="posisi" value="<?= $l->posisi ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 p-0">
                        <div class="form-popup form-group mb-2">
                            <label>Gaji</label>
                            <input type="number" name="gaji" value="<?= $l->gaji ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 p-0">
                        <div class="form-popup form-group mb-2">
                            <label>Kualifikasi</label>
                            <input type="text" name="kualifikasi" value="<?= $l->kualifikasi ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 p-0">
                        <div class="form-popup form-group mb-2">
                            <label>Tanggal Mulai</label>
                            <input type="date" name="tgl_mulai" value="<?= $l->tgl_mulai ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 p-0">
                        <div class="form-popup form-group mb-2">
                            <label>Tanggal Akhir</label>
                            <input type="date" name="tgl_akhir" value="<?= $l->tgl_akhir ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php endforeach; ?>
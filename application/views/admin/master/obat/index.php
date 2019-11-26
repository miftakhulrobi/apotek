<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card card-table-data">
                    <div class="card-header">
                        <h4 class="card-title">Aneka Obat
                            <a href="<?= base_url('obat_a/create') ?>" class="btn btn-success btn-sm float-right btn-hover">Tambah Obat</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="data-obat">
                                <thead class="bg-warning text-white">
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Nama Obat
                                        </th>
                                        <th>
                                            Kategori Obat
                                        </th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($obat as $o) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $o->obatname ?></td>
                                            <td><?= $o->kategoriname ?></td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#detail" class="btn btn-success btn-sm btn-hover detail-obat" data-id="<?= $o->obat_id ?>">Detail Obat</a>
                                                <a href="#" data-toggle="modal" data-target="#edit" class="btn btn-warning btn-sm btn-hover edit-obat" data-id="<?= $o->obat_id ?>">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm btn-hover hapus-obat" data-id="<?= $o->obat_id ?>">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019
                <a href="#" target="_blank"><?= $this->auths->app()->by ?></a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
                <i class="mdi mdi-heart text-danger"></i>
            </span>
        </div>
    </footer>
</div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-warning" id="editLabel">Edit Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('obat_a/update') ?>" method="POST">
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <div class="input-box">
                            <input type="text" name="obatname" class="form-control" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-hover">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-warning" id="detailLabel">Detail Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('obat_a/updateobat') ?>" method="POST">
                    <input type="hidden" name="obat_id">
                    <div class="form-group">
                        <label for="">Harga Bijian</label>
                        <div class="input-box">
                            <input type="number" name="biji" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Harga 1 Kaplet</label>
                        <div class="input-box">
                            <input type="number" name="kaplet" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Harga 1 Box</label>
                        <div class="input-box">
                            <input type="number" name="box" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Harga 1 Botol</label>
                        <div class="input-box">
                            <input type="number" name="botol" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Harga 1 Dus</label>
                        <div class="input-box">
                            <input type="number" name="dus" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <div class="input-box">
                            <textarea type="text" name="desc" class="form-control"></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-hover">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
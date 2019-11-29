<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card card-table-data">
                    <div class="card-header">
                        <h4 class="card-title">Kategori Obat
                            <a href="#" data-toggle="modal" data-target="#create" class="btn btn-success btn-sm float-right btn-hover">Tambah Kategori</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="bg-warning">
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Nama Kategori
                                        </th>
                                        <th>
                                            Jumlah Obat
                                        </th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($kategori as $k) : ?>
                                        <tr>
                                            <td>
                                                <?= $no++ ?>
                                            </td>
                                            <td>
                                                <?= $k->kategoriname ?>
                                            </td>
                                            <td>
                                                <?= $k->cobat ?>
                                            </td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#edit" data-id="<?= $k->kategori_id ?>" data-kategoriname="<?= $k->kategoriname ?>" class="btn btn-warning btn-sm btn-hover edit">Edit</a>
                                                <?php if ($k->cobat == 0) : ?>
                                                    <a href="#" class="btn btn-danger btn-sm btn-hover hapus-kategori" data-id="<?= $k->kategori_id ?>">Hapus</a>
                                                <?php endif ?>
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

<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-warning" id="createLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('kategori_a/store') ?>" method="POST">
                    <div class="form-group">
                        <div class="input-box">
                            <input type="text" name="kategoriname" class="form-control" required>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-hover">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-warning" id="editLabel">Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('kategori_a/update') ?>" method="POST">
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <div class="input-box">
                            <input type="text" name="kategoriname" class="form-control" required>
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
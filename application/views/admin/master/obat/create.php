<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card card-table-data">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Obat
                            <a href="<?= base_url('obat_a') ?>" class="btn btn-success btn-sm float-right btn-hover">Kembali</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="<?= base_url('obat_a/store') ?>" method="POST">
                                <div class="form-group">
                                    <label for="">Nama Obat</label>
                                    <div class="input-box">
                                        <input type="text" name="obatname" class="form-control" placeholder="Nama Obat" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Keterangan</label>
                                    <div class="input-box">
                                        <textarea type="text" name="desc" class="form-control" placeholder="Keterangan"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Kategori Obat</label>
                                    <div class="input-group col-xs-12">
                                        <input type="hidden" name="kategori_id">
                                        <input type="text" name="kategoriname" class="form-control file-upload-info" placeholder="Kategori Obat" readonly>
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-info" type="button" data-toggle="modal" data-target="#create">Pilih Kategori</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-hover mt-2">Tambah</button>
                                </div>
                            </form>
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
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-warning" id="createLabel">Pilih Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-hover" id="data-kategori">
                    <thead class="bg-warning text-white">
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Nama Kategori
                            </th>
                            <th>
                                Total Product
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kategori as $k) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>
                                    <a href="#" class="pilih-kategori" data-kategori_id="<?= $k->kategori_id ?>" data-kategoriname="<?= $k->kategoriname ?>">
                                        <?= $k->kategoriname ?>
                                    </a>
                                </td>
                                <td><?= $k->cobat ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 grid-margin stretch-card">
                <div class="card card-statistics card-table-data">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <i class="mdi mdi-cube text-danger icon-lg"></i>
                            </div>
                            <div class="float-right">
                                <p class="mb-0 text-right">Saldo Sekarang</p>
                                <div class="fluid-container">
                                    <h1 class="font-weight-medium text-right mb-0">Rp<?= number_format($saldo->saldos) ?></h1>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted mt-5 mb-0">
                            <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Ketika melakukan transaksi penjualan Saldo akan otomatis bertambah, dan berkurang ketika melakukan input Pengeluaran!
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 grid-margin stretch-card">
                <div class="card card-statistics card-table-data">
                    <div class="card-body">
                        <form action="<?= base_url('keuangan_a/store') ?>" method="POST">
                            <div class="form-group">
                                <div class="input-box">
                                    <input type="number" name="total" class="form-control" placeholder="Pengeluaran" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-box">
                                    <textarea type="text" name="keperluan" class="form-control" placeholder="Keperluan" required></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-hover">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card">
                <div class="card card-statistics card-table-data">
                    <div class="card-header">
                        <div class="card-title">
                            Data Pengeluaran
                            <a href="#" class="btn btn-danger btn-sm float-right btn-hover truncate-pengeluaran">Hapus Semua Pengeluaran</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="data-pengeluaran">
                                <thead class="bg-warning text-white">
                                    <tr>
                                        <th>
                                            Total
                                        </th>
                                        <th>
                                            Keperluan
                                        </th>
                                        <th>
                                            Waktu
                                        </th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pengeluaran as $p) : ?>
                                        <tr>
                                            <td>Rp<?= number_format($p->total) ?></td>
                                            <td><?= $p->keperluan ?></td>
                                            <td><?= date('dMY H:i', strtotime($p->created_at)) ?></td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-sm btn-hover hapus-pengeluaran" data-id="<?= $p->pengeluaran_id ?>">Hapus</a>
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
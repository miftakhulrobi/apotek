<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card card-table-data">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-box">
                                        <input type="text" name="obatname" class="form-control" placeholder="Nama Product" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-box">
                                        <select name="harga" id="harga" class="form-control" required>
                                            <option value="">-Type Product-</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-box">
                                        <input type="text" name="qty" class="form-control" placeholder="Qty">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-box">
                                        <input type="text" name="total" class="form-control" placeholder="Total" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-cari-product btn-hover" data-toggle="modal" data-target="#create">Cari Product</button>
                        <button type="button" class="btn btn-warning btn-sm float-right batal-item btn-hover">Batal Item</button>
                        <button type="button" class="btn btn-success btn-sm float-right mr-1 simpan-item btn-hover">Simpan Item</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card card-table-data">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="bg-warning">
                                    <tr>
                                        <th>
                                            Product
                                        </th>
                                        <th>
                                            Harga
                                        </th>
                                        <th>
                                            Qty
                                        </th>
                                        <th>
                                            Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="table-target">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 grid-margin stretch-card">
                <div class="card card-table-data">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="input-box">
                                <input type="text" name="subtotal" class="form-control" placeholder="Sub Total" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-box">
                                        <input type="text" name="discount" class="form-control" placeholder="Discount 0%">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-box">
                                        <input type="text" name="totaldiscount" class="form-control" placeholder="Rp." readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-box">
                                <input type="text" name="resulttotal" class="form-control" placeholder="Total" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 grid-margin stretch-card">
                <div class="card card-table-data">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="input-box">
                                <input type="text" name="bayar" class="form-control" placeholder="Bayar" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-box">
                                <input type="text" name="kembalian" class="form-control" placeholder="Kembalian" readonly>
                            </div>
                        </div>
                        <div class="form-group">

                            <input type="hidden" name="pricemoney">
                            <input type="hidden" name="pricetotal">
                            <input type="hidden" name="pricediscount">
                            <input type="hidden" name="pricebayar" required>
                            <input type="hidden" name="pricekembalian">
                            <button type="button" class="btn btn-success btn-sm btn-hover btn-simpan-transaksi">Simpan Transaksi</button>
                            <button type="button" class="btn btn-danger btn-sm btn-hover btn-reset-transaksi">Reset</button>
                            <a target="_blank" class="btn btn-success btn-sm btn-hover btn-print-transaksi" style="display:none">Cetak Transaksi</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 grid-margin stretch-card">
                <div class="card card-table-data">
                    <p class="text-center bg-success text-white">Total Belanja</p>
                    <h1 class="text-center mb-4 mt-2"><span class="total-belanja" data-totalbelanja=""></span></h1>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="text-center bg-warning text-white">Bayar</p>
                            <h3 class="text-center"><span class="bayar"></span></h3>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-center bg-danger text-white">Kembalian</p>
                            <h3 class="text-center"><span class="kembalian"></span></h3>
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-warning" id="createLabel">Pilih Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="data-obat">
                        <thead class="bg-warning text-white">
                            <tr>
                                <th>
                                    Nama Obat
                                </th>
                                <th>
                                    Kategori Obat
                                </th>
                                <th>
                                    Keterangan
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($obat as $o) : ?>
                                <tr>
                                    <td>
                                        <a href="#" data-id="<?= $o->obat_id ?>" class="pilih-obat"><?= $o->obatname ?></a>
                                    </td>
                                    <td><?= $o->kategoriname ?></td>
                                    <td>
                                        <?= $o->desc ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
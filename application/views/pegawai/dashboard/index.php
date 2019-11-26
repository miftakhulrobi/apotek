<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics card-table-data">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="mdi mdi-cube text-danger icon-lg"></i>
              </div>
              <div class="float-right">
                <p class="mb-0 text-right">Pendptn Hari ini</p>
                <div class="fluid-container">
                  <h3 class="font-weight-medium text-right mb-0"><?= number_format($pendapatan) ?></h3>
                </div>
              </div>
            </div>
            <p class="text-muted mt-3 mb-0">
              <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Omset penjualan
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics card-table-data">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="mdi mdi-account-location text-warning icon-lg"></i>
              </div>
              <div class="float-right">
                <p class="mb-0 text-right">Transaksi Hari ini</p>
                <div class="fluid-container">
                  <h3 class="font-weight-medium text-right mb-0"><?= $ctransaksi ?></h3>
                </div>
              </div>
            </div>
            <p class="text-muted mt-3 mb-0">
              <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Data penjualan
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics card-table-data">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="mdi mdi-folder-open text-success icon-lg"></i>
              </div>
              <div class="float-right">
                <p class="mb-0 text-right">Pendptn Kemarin</p>
                <div class="fluid-container">
                  <h3 class="font-weight-medium text-right mb-0"><?= $pkemarin ?></h3>
                </div>
              </div>
            </div>
            <p class="text-muted mt-3 mb-0">
              <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> <?= $tglkemarin ?>
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics card-table-data">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="mdi mdi-poll-box text-info icon-lg"></i>
              </div>
              <div class="float-right">
                <p class="mb-0 text-right">Pendptn Minggu ini</p>
                <div class="fluid-container">
                  <h3 class="font-weight-medium text-right mb-0"><?= number_format($pseminggu) ?></h3>
                </div>
              </div>
            </div>
            <p class="text-muted mt-3 mb-0">
              <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Seminggu termasuk hari ini
            </p>
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
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 grid-margin stretch-card">
                <div class="card card-statistics card-table-data">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="text-center">
                                <?php if (!$this->auths->user()->avatar) : ?>
                                    <img src="<?= base_url('admin') ?>/images/faces/admin.jpg" alt="" class="img-thumbnail img-responsive img-avatar-user">
                                <?php else : ?>
                                    <img src="<?= base_url('admin') ?>/images/user/<?= $this->auths->user()->avatar ?>" alt="" class="img-thumbnail img-responsive img-avatar-user">
                                <?php endif ?>
                            </div>
                        </div>
                        <hr>
                        <h3 class="text-center text-primary"><?= $this->auths->user()->name ?></h3>
                        <p class="text-muted text-center mb-0">
                            Jabatan : <?= $this->auths->user()->email ?>
                        </p>
                        <p class="text-center mb-0">
                            Jabatan : <?= $this->auths->user()->role ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 grid-margin stretch-card">
                <div class="card card-statistics card-table-data">
                    <div class="card-header">
                        <div class="card-title">Profile Saya</div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('profile_p/update') ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="input-box">
                                    <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="<?= $this->auths->user()->name ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-box">
                                    <textarea type="text" name="address" class="form-control" placeholder="Alamat"><?= $this->auths->user()->address ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-box">
                                    <input type="number" name="phone" class="form-control" placeholder="Telepon" value="<?= $this->auths->user()->phone ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-box">
                                    <input type="file" name="avatar" class="form-control" placeholder="Avatar">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-hover float-right">Update</button>
                            </div>
                        </form>
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
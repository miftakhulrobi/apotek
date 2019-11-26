<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $this->auths->app()->appname ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('admin') ?>/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url('admin') ?>/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url('admin') ?>/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('admin') ?>/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url('admin') ?>/images/apotek.png" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <style>
        .btn-hover:hover {
            transform: scale(1.04);
            box-shadow: 0px 10px 8px -5px rgba(0, 0, 0, .50);
        }

        .input-box {
            border: 1px solid lime;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
            <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <h3 class="text-center text-white mb-4 text-success">
                            <img src="<?= base_url('admin') ?>/images/apotek1.png" alt="" class="text-center img-responsive" width="400" height="60">
                        </h3>
                        <div class="auto-form-wrapper">
                            <h5 class="text-center mb-4">Silahkan Login!</h5>
                            <hr class="mb-4">
                            <form action="<?= base_url('auth/postlogin') ?>" method="POST">
                                <div class="form-group">
                                    <label class="label">Email</label>
                                    <div class="input-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="label">Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control" placeholder="*********" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success submit-btn btn-block mt-4 mb-5 btn-hover">Login</button>
                                </div>
                            </form>
                        </div>

                        <p class="footer-text text-center mt-4">copyright © 2019 <span class="text-success"><?= $this->auths->app()->by ?></span>. All rights reserved.</p>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url('admin') ?>/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= base_url('admin') ?>/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="<?= base_url('admin') ?>/js/off-canvas.js"></script>
    <script src="<?= base_url('admin') ?>/js/misc.js"></script>
    <!-- endinject -->
    <!-- Code injected by live-server -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        const success = '<?= $this->session->flashdata('success') ?>';
        const error = '<?= $this->session->flashdata('error') ?>';
        if (success) {
            toastr.success("<?= $this->session->flashdata('success') ?>")
        }
        if (error) {
            toastr.error("<?= $this->session->flashdata('error') ?>")
        }
    </script>
</body>

</html>
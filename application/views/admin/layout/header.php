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
        .card-table-data {
            box-shadow: 0px 5px 10px 5px rgba(0, 0, 0, .10);
        }

        .btn-hover:hover {
            transform: scale(1.04);
            box-shadow: 0px 10px 8px -5px rgba(0, 0, 0, .50);
        }

        .list-box {
            background-color: #cdfbdd;
            padding: 5px;
            border-top-right-radius: 10px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            min-height: 200px;
            overflow: auto;
        }

        .input-box {
            border: 1px solid lime;
        }

        .badge-transaksi-baru-animation {
            animation: badge-transaksi-baru-animation 2s ease infinite;
        }

        .icon-date {
            animation: iconDate 5s ease 2s infinite;
        }

        .img-avatar-hover:hover {
            transform: rotate(30deg) scale(1.1);
            transition: 1s;
        }

        .icon-link-dashboard:hover,
        .icon-link-master:hover,
        .icon-link-keuangan:hover {
            transform: rotate(360deg) scale(1.1);
            transition: .5s;
        }

        .img-avatar-user {
            width: 180px;
            border-radius: 90%;
        }

        .avatar-user-login {
            width: 200px;
            height: 200px;
            border-radius: 90%;
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center;
            border: 1px solid lime;
        }

        @keyframes badge-transaksi-baru-animation {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes iconDate {
            0% {
                color: white;
            }

            15% {
                color: white;
            }

            30% {
                color: white;
            }

            45% {
                color: white;
            }

            60% {
                color: white;
            }

            75% {
                color: white;
            }

            90% {
                color: white;
            }

            95% {
                color: salmon;
            }

            100% {
                color: salmon;
            }
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:<?= base_url('admin') ?>/partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
                <a class="navbar-brand brand-logo" href="#">
                    <img src="<?= base_url('admin') ?>/images/apotek1.png" alt="logo" />
                </a>
                <a class="navbar-brand brand-logo-mini" href="#">
                    <img src="<?= base_url('admin') ?>/images/apotek.png" alt="logo" />
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center">
                <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Transaksi
                            <span class="badge badge-success ml-1 badge-transaksi-baru" style="opacity: 0">Baru</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a href="#" class="nav-link">
                            <i class="mdi mdi-calendar icon-date"></i><?= date('d m Y') ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="mdi mdi-clock icon-date"></i>
                            <span id="jam"></span>:
                            <span id="menit"></span>:
                            <span id="detik"></span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown d-none d-xl-inline-block">
                        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <span class="profile-text">Hallo, <?= $this->session->userdata('name') ?> !</span>
                            <?php if (!$this->auths->user()->avatar) : ?>
                                <img class="img-xs rounded-circle btn-hover" src="<?= base_url('admin') ?>/images/faces/admin.jpg" alt="Profile image">
                            <?php else : ?>
                                <img class="img-xs rounded-circle btn-hover" src="<?= base_url('admin') ?>/images/user/<?= $this->auths->user()->avatar ?>" alt="Profile image">
                            <?php endif ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <a class="dropdown-item p-0">
                                <div class="d-flex border-bottom">
                                    <a href="<?= base_url('transaction_a') ?>">
                                        <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                            <i class="mdi mdi-bookmark-plus-outline mr-0 text-success"></i>
                                        </div>
                                    </a>
                                    <a href="<?= base_url('profile_a') ?>">
                                        <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                                            <i class="mdi mdi-account-outline mr-0 text-success"></i>
                                        </div>
                                    </a>
                                    <a href="<?= base_url('auth/logout') ?>">
                                        <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                            <i class="mdi mdi-arrow-right mr-0 text-danger"></i>
                                        </div>
                                    </a>
                                </div>
                            </a>
                            <a href="<?= base_url('profile_a') ?>" class="dropdown-item">
                                Profile Saya
                            </a>
                            <a href="<?= base_url('auth/logout') ?>" class="dropdown-item">
                                Sign Out
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:<?= base_url('admin') ?>/partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas card-table-data" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <div class="nav-link">
                            <div class="user-wrapper">
                                <div class="profile-image img-avatar-hover">
                                    <?php if (!$this->auths->user()->avatar) : ?>
                                        <img src="<?= base_url('admin') ?>/images/faces/admin.jpg" alt="profile image">
                                    <?php else : ?>
                                        <img class="img-xs rounded-circle btn-hover" src="<?= base_url('admin') ?>/images/user/<?= $this->auths->user()->avatar ?>" alt="Profile image">
                                    <?php endif ?>
                                </div>
                                <div class="text-wrapper">
                                    <p class="profile-name"><?= $this->session->userdata('name') ?></p>
                                    <div>
                                        <small class="designation text-muted"><?= $this->session->userdata('role') ?></small>
                                        <span class="status-indicator online"></span>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= base_url('transaction_a') ?>" class="btn btn-success btn-block btn-hover">Transaksi Baru
                                <i class="mdi mdi-plus"></i>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('dashboard_a') ?>">
                            <i class="menu-icon mdi mdi-television icon-link-dashboard"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="menu-icon mdi mdi-content-copy icon-link-master"></i>
                            <span class="menu-title">Masters</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('kategori_a') ?>">Kategori Obat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('obat_a') ?>">Aneka Obat</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('keuangan_a') ?>">
                            <i class="menu-icon mdi mdi-backup-restore icon-link-keuangan"></i>
                            <span class="menu-title">Keuangan</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
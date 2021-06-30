<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/images/favicon/favicon.ico">

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Libs CSS -->
    <link href="<?= base_url() ?>assets/fonts/feather/feather.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/libs/dragula/dist/dragula.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/libs/prismjs/themes/prism.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/libs/%40yaireo/tagify/dist/tagify.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/libs/tippy.js/dist/tippy.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/theme.min.css">

    <title>Cars | RentalKuy</title>
</head>

<body>
    <div id="db-wrapper">
        <!-- Sidebar -->
        <nav class="navbar-vertical navbar">
            <div class="nav-scroller">
                <!-- Brand logo -->
                <a class="navbar-brand" href=""><img src="<?= base_url() ?>assets/images/logo-negative.png" alt="" width="200" /></a>

                <!-- Navbar nav -->
                <ul class="navbar-nav flex-column" id="sideNavbar">
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url() ?>">
                            <i class="nav-icon fa fa-car mr-2"></i>Your Cars
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url('staff/new-car') ?>">
                            <i class="nav-icon fa fa-plus mr-2"></i>Add Car
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url('staff/rating') ?>">
                            <i class="nav-icon fa fa-star mr-2"></i> Lihat Rating
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Page Content -->
        <div id="page-content">
            <div class="header">
                <!-- navbar -->
                <nav class="navbar-default navbar navbar-expand-lg">
                    <a id="nav-toggle" href="#!"><i class="fe fe-menu"></i></a>
                    <ul class="navbar-nav navbar-right-wrap ml-auto  d-flex nav-top-wrap ">
                        <li class="dropdown ml-2">
                            <a class="rounded-circle " href="#!" role="button" id="dropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="avatar avatar-md">
                                    <span class="rounded-circle avatar-warning">
                                        <span class="avatar-initials rounded-circle"><?= $foto_profile ?></span>
                                    </span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownUser">
                                <div class="dropdown-item">
                                    <div class="d-flex">
                                        <div class="avatar avatar-md">
                                            <span class="rounded-circle avatar-warning">
                                                <span class="avatar-initials rounded-circle"><?= $foto_profile ?></span>
                                            </span>
                                        </div>
                                        <div class="ml-3 lh-1">
                                            <h5 class="mb-1"><?= $user['nama_lengkap'] ?></h5>
                                            <p class="mb-0 text-muted"><?= $user['email'] ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <ul class="list-unstyled">
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url('edit/profile') ?>">
                                            <i class="fe fe-user mr-2"></i>Profile
                                        </a>
                                    </li>
                                    <div class="dropdown-divider"></div>
                                    <ul class="list-unstyled">
                                        <li>
                                            <a class="dropdown-item" href="<?= base_url('logout') ?>">
                                                <i class="fe fe-power mr-2"></i>Sign Out
                                            </a>
                                        </li>
                                    </ul>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
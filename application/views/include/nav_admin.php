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
                    <li class="nav-item ">
                        <a class="nav-link active" href="<?= base_url() ?>">
                            <i class="nav-icon fa fa-car mr-2"></i>Cars
                        </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url('admin/staff') ?>">
                            <i class="nav-icon fe fe-user-check mr-2"></i>Garage Staffs
                        </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url('admin/penyewa') ?>">
                            <i class="nav-icon fe fe-user mr-2"></i>Renter
                        </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/promo') ?>">
                            <i class="nav-icon fe fe-percent mr-2"></i>Promo
                        </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url('confirm-payment') ?>">
                            <i class="nav-icon fe fe-percent mr-2"></i>Confirm Payment
                        </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item ">
                        <div class="nav-divider">
                        </div>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url('logout') ?>">
                            <i class="nav-icon fe fe-power mr-2"></i>Sign Out
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Page Content -->
        <div id="page-content">
            <div class="header">
                <!-- navbar -->
                <nav class="navbar navbar-expand-lg navbar-default">
                    <div class="container-fluid px-0">
                        <!-- Mobile view nav wrap -->
                        <?php
                        if (!empty($user)) {
                            ?>
                            <ul class="navbar-nav navbar-right-wrap ml-auto d-lg-none d-flex nav-top-wrap ">
                                <li class="dropdown ml-2">
                                    <div class="dropdown-item">
                                        <div class="d-flex">
                                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                                <span class="rounded-circle avatar-warning">
                                                    <span class="avatar-initials rounded-circle"><?= $foto_profile ?></span>
                                                </span>
                                            </div>
                                            <div class="ml-3 lh-1">
                                                <h5 class="mb-1"><?= $user["nama_lengkap"] ?></h5>
                                                <p class="mb-0 text-muted"><?= $user["email"] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="dropdownUser">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a class="dropdown-item" href="./index.html">
                                                    <i class="fe fe-power mr-2"></i>Sign Out
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        <?php } ?>
                        <!-- Button -->
                        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar top-bar mt-0"></span>
                            <span class="icon-bar middle-bar"></span>
                            <span class="icon-bar bottom-bar"></span>
                        </button>
                        <!-- Collapse -->
                        <div class="collapse navbar-collapse" id="navbar-default">


                            <?php
                            if (empty($user)) {
                                ?>
                                <ul class="navbar-nav navbar-right-wrap ml-auto d-none d-lg-block">
                                    <li class="dropdown d-inline-block stopevent">
                                        <a href="<?= base_url('login') ?>" class="btn btn-primary">Login</a>
                                    </li>
                                    <li class="dropdown ml-2 d-inline-block">
                                        <a href="<?= base_url('register') ?>" class="btn btn-white">Register</a>
                                    </li>
                                </ul>
                            <?php } else { ?>
                                <ul class="navbar-nav navbar-right-wrap ml-auto d-none d-lg-block">
                                    <li class="dropdown ml-2 d-inline-block">
                                        <a class="rounded-circle" href="#!" role="button" id="dropdownUserProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                                <span class="rounded-circle avatar-warning">
                                                    <span class="avatar-initials rounded-circle"><?= $foto_profile ?></span>
                                                </span>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownUserProfile">
                                            <div class="dropdown-item">
                                                <div class="d-flex">
                                                    <div class="avatar avatar-md avatar-indicators avatar-online">
                                                        <span class="rounded-circle avatar-warning">
                                                            <span class="avatar-initials rounded-circle"><?= $foto_profile ?></span>
                                                        </span>
                                                    </div>
                                                    <div class="ml-3 lh-1">
                                                        <h5 class="mb-1"><?= $user["nama_lengkap"] ?></h5>
                                                        <p class="mb-0 text-muted"><?= $user["email"] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <ul class="list-unstyled">
                                                <?php
                                                    if (($level == "Penyewa") || ($level == "Staff Garasi")) {
                                                        ?>
                                                    <li>
                                                        <a class="dropdown-item" href="<?= base_url('edit/profile') ?>">
                                                            <i class="fe fe-user mr-2"></i>Profile
                                                        </a>
                                                    </li>
                                                <?php
                                                    }
                                                    ?>
                                            </ul>
                                            <div class="dropdown-divider"></div>
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a class="dropdown-item" href="<?= base_url('logout') ?>">
                                                        <i class="fe fe-power mr-2"></i>Sign Out
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>
                </nav>
            </div>
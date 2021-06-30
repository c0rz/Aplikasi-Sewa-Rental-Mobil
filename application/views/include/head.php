<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/images/favicon/favicon.ico">


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
    <title>RentalKuy | Your Car Rental Solution</title>
</head>

<body>
    <!-- Navbar -->
    <?php
    if (!empty($user)) {
        if (($level == "Penyewa") || ($level == "Staff Garasi")) {
            $ket = "";
        } else if ($level == "admin") {
            $ket = "hidden";
        }
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-default">
        <div class="container-fluid px-0">
            <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url('assets/images/logo.png') ?>" alt="" width="200" /></a>
            <!-- Mobile view nav wrap -->
            <?php
            if (!empty($user)) {
                ?>
                <ul class="navbar-nav navbar-right-wrap ml-auto d-lg-none d-flex nav-top-wrap ">
                    <li class="dropdown stopevent">
                        <a class="btn btn-light btn-icon rounded-circle text-muted indicator indicator-primary" href="#!" role="button" id="dropdownNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-bell"> </i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="dropdownNotification">
                            <div>
                                <div class="border-bottom px-3 pt-1 pb-3 d-flex justify-content-between align-items-center">
                                    <span class="h5 mb-0">Notifications</span>
                                    <a href="# " class="text-muted"><span class="align-middle"><i class="fe fe-settings mr-1"></i></span></a>
                                </div>
                                <ul class="list-group list-group-flush notification-list-scroll">
                                    <li class="list-group-item bg-light">
                                        <div class="row">
                                            <div class="col">
                                                <div class="d-flex">
                                                    <img src="./assets/images/avatar/avatar-1.jpg" alt="" class="avatar-md rounded-circle" />
                                                    <div class="ml-3">
                                                        <h5 class="font-weight-bold mb-1">Kristin Watson:</h5>
                                                        <p class="mb-3">
                                                            Krisitn Watsan like your comment on course Javascript
                                                            Introduction!
                                                        </p>
                                                        <span class="font-size-xs text-muted">
                                                            <span><span class="fe fe-thumbs-up text-success mr-1"></span>2 hours ago,</span>
                                                            <span class="ml-1">2:19 PM</span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <a class="stretched-link" href="#!"></a>
                                            </div>
                                            <div class="col-auto text-center">
                                                <a href="#!" class="badge-dot badge-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark as read">
                                                </a>
                                                <div>
                                                    <a href="#!" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove">
                                                        <i class="fe fe-x text-muted"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                <div class="d-flex">
                                                    <img src="./assets/images/avatar/avatar-2.jpg" alt="" class="avatar-md rounded-circle" />
                                                    <div class="ml-3">
                                                        <h5 class="font-weight-bold mb-1">Brooklyn Simmons</h5>
                                                        <p class="mb-3">
                                                            Just launched a new Courses React for Beginner.
                                                        </p>
                                                        <span class="font-size-xs text-muted">
                                                            <span><span class="fe fe-thumbs-up text-success mr-1"></span>Oct 9,</span>
                                                            <span class="ml-1">1:20 PM</span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <a class="stretched-link" href="#!"></a>
                                            </div>
                                            <div class="col-auto text-center">
                                                <a href="#!" class="badge-dot badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark as unread">
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                <div class="d-flex">
                                                    <img src="./assets/images/avatar/avatar-3.jpg" alt="" class="avatar-md rounded-circle" />
                                                    <div class="ml-3">
                                                        <h5 class="font-weight-bold mb-1">Jenny Wilson</h5>
                                                        <p class="mb-3">
                                                            Krisitn Watsan like your comment on course Javascript
                                                            Introduction!
                                                        </p>
                                                        <span class="font-size-xs text-muted">
                                                            <span><span class="fe fe-thumbs-up text-info mr-1"></span>Oct 9,</span>
                                                            <span class="ml-1">1:56 PM</span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <a class="stretched-link" href="#!"></a>
                                            </div>
                                            <div class="col-auto text-center">
                                                <a href="#!" class="badge-dot badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark as unread">
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                <div class="d-flex">
                                                    <img src="./assets/images/avatar/avatar-4.jpg" alt="" class="avatar-md rounded-circle" />
                                                    <div class="ml-3">
                                                        <h5 class="font-weight-bold mb-1">Sina Ray</h5>
                                                        <p class="mb-3">
                                                            You earn new certificate for complete the Javascript
                                                            Beginner course.
                                                        </p>
                                                        <span class="font-size-xs text-muted">
                                                            <span><span class="fe fe-award text-warning mr-1"></span>Oct 9,</span>
                                                            <span class="ml-1">1:56 PM</span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <a class="stretched-link" href="#!"></a>
                                            </div>
                                            <div class="col-auto text-center">
                                                <a href="#!" class="badge-dot badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark as unread">
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="border-top px-3 pt-3 pb-0">
                                    <a href="./pages/notification-history.html" class="text-muted">See all Notifications</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown ml-2">
                        <a class="rounded-circle" href="#!" role="button" id="dropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                <img alt="avatar" src="./assets/images/avatar/avatar-1.jpg" class="rounded-circle" />
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="dropdownUser">
                            <div class="dropdown-item">
                                <div class="d-flex">
                                    <div class="avatar avatar-md avatar-indicators avatar-online">
                                        <img alt="avatar" src="./assets/images/avatar/avatar-1.jpg" class="rounded-circle" />
                                    </div>
                                    <div class="ml-3 lh-1">
                                        <h5 class="mb-1">Annette Black</h5>
                                        <p class="mb-0 text-muted">annette@geeksui.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <ul class="list-unstyled">
                                <li class="dropdown-submenu dropleft-lg">
                                    <a class="dropdown-item dropdown-list-group-item dropdown-toggle" href="#!">
                                        <i class="fe fe-circle mr-2"></i>Status
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="#!">
                                                <span class="badge-dot bg-success mr-2"></span>Online
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#!">
                                                <span class="badge-dot bg-secondary mr-2"></span>Offline
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#!">
                                                <span class="badge-dot bg-warning mr-2"></span>Away
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#!">
                                                <span class="badge-dot bg-danger mr-2"></span>Busy
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./pages/profile-edit.html">
                                        <i class="fe fe-user mr-2"></i>Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./pages/student-subscriptions.html">
                                        <i class="fe fe-star mr-2"></i>Subscription
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#!">
                                        <i class="fe fe-settings mr-2"></i>Settings
                                    </a>
                                </li>
                            </ul>
                            <div class="dropdown-divider"></div>
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
                                <ul class="list-unstyled" <?= $ket ?>>
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url('edit/profile') ?>">
                                            <i class="fe fe-user mr-2"></i>Profile
                                        </a>
                                    </li>
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
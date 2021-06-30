<?php
defined('BASEPATH') or exit('No direct script access allowed');
$db_saldo = $this->Database->getData($sql, array("id" => $user['id']));
?>
<div class="row align-items-center">
    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
        <!-- Bg -->
        <div class="pt-16 rounded-top" style="
								background: url(<?= base_url('assets/images/background/profile-bg.jpg') ?>) no-repeat;
								background-size: cover;
							"></div>
        <div class="d-flex align-items-end justify-content-between bg-white px-4 pt-2 pb-4 rounded-none rounded-bottom shadow-sm">
            <div class="d-flex align-items-center">
                <div class="mr-2 position-relative d-flex justify-content-end align-items-end mt-n5">
                    <span class="avatar-xl rounded-circle avatar-warning border-width-4 border-white">
                        <span class="avatar-initials rounded-circle"><?= $foto_profile ?></span>
                    </span>
                </div>
                <div class="lh-1">
                    <h2 class="mb-0">
                        <?= $user["nama_lengkap"] ?>
                        <a href="#!" class="text-decoration-none" data-toggle="tooltip" data-placement="top" title="<?= $level ?>">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE"></rect>
                                <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
                                <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                            </svg>
                        </a>
                    </h2>
                    <p class="mb-0 d-block"><?= $level ?></p>
                </div>
            </div>
            <div>
                <a href="<?= base_url() ?>" class="btn btn-outline-primary btn-sm d-none d-md-block">Go to
                    Dashboard</a>
            </div>
        </div>
    </div>
</div>

<!-- Content -->

<div class="row mt-4">
    <div class="col-lg-3 col-md-4 col-12">
        <div class="mb-lg-0 mb-3 ">
            <div class="card mb-4">
                <!-- Card header -->
                <div class="card-header">
                    <span>My Saldo</span>
                    <h3 class="mb-1">Rp. <?= number_format($db_saldo["saldo"], 0, ',', '.') ?></h3>
                    <a type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modal_topup">Top Up</a>
                    <!-- Modal "Topup"-->
                    <div class="modal fade" id="modal_topup" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalScrollableTitle">Topup Saldo
                                    </h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form -->
                                    <form class="form-row" method="POST" action="<?= base_url('topup') ?>">
                                        <!-- Full name  -->
                                        <input type="hidden" class="form-control mb-2" name="id_penyewa" id="id_penyewa" value="<?= $user['id'] ?>">
                                        <div class="form-group col-12 col-md-12">
                                            <label class="form-label" for="nominal">Nominal</label>
                                            <input type="number" id="nominal" name="nominal" class="form-control" placeholder="Nominal" value="" required>
                                            <input type="hidden" class="form-control mb-2" name="saldo" id="saldo" value="<?= $db_saldo['saldo'] ?>" readonly="readonly" style="border: 0">
                                        </div>
                                        <!-- Radio -->
                                        <h4 class="form-label col-12 col-md-12 mb-2">Payment Method</h4>
                                        <!-- Custom control -->
                                        <div class="form-group col-12 col-md-12 mb-1 p-0">
                                            <div class="custom-control custom-radio ">
                                                <input type="radio" class="custom-control-input" id="ovo" name="pay" value="OVO Payment">
                                                <label class="custom-control-label" for="ovo"><img src="<?= base_url() ?>assets/images/pembayaran/ovo.png" width="60">
                                                </label>
                                            </div>
                                        </div>
                                        <!-- Custom control -->
                                        <div class="form-group col-12 col-md-12 mb-1 p-0">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="gopay" name="pay" value="GOPAY Payment">
                                                <label class="custom-control-label" for="gopay"><img src="<?= base_url() ?>assets/images/pembayaran/gopay.png" width="90">
                                                </label>
                                            </div>
                                        </div>
                                        <!-- Custom control -->
                                        <div class="form-group col-12 col-md-12 mb-1 p-0">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="dana" name="pay" value="DANA Payment">
                                                <label class="custom-control-label" for="dana"><img src="<?= base_url() ?>assets/images/pembayaran/dana.jfif" width="70">
                                                </label>
                                            </div>
                                        </div>
                                        <button class="btn btn-secondary btn-sm my-3" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success btn-sm m-3">Submit</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End Modal "Topup" -->
                </div>
            </div>
        </div>
        <!-- Side navbar -->
        <nav class="navbar navbar-expand-md navbar-light shadow-sm mb-4 mb-lg-0 sidenav">
            <!-- Menu -->
            <a class="d-xl-none d-lg-none d-md-none text-inherit font-weight-bold" href="#!">Menu</a>
            <!-- Button -->
            <button class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light" type="button" data-toggle="collapse" data-target="#sidenav" aria-controls="sidenav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fe fe-menu"></span>
            </button>
            <!-- Collapse navbar -->
            <div class="collapse navbar-collapse" id="sidenav">
                <div class="navbar-nav flex-column">
                    <span class="navbar-header">History</span>
                    <ul class="list-unstyled ml-n2 mb-4">
                        <!-- Nav item -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('history') ?>"><i class="fe fe-calendar nav-icon"></i>Car History
                            </a>
                        </li>
                        <!-- Nav item -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('invoice') ?>"><i class="fe fe-credit-card nav-icon"></i>Payment History</a>
                        </li>
                    </ul>
                    <!-- Navbar header -->
                    <span class="navbar-header">Account Settings</span>
                    <ul class="list-unstyled ml-n2 mb-0">
                        <!-- Nav item -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('edit/profile') ?>"><i class="fe fe-settings nav-icon"></i>Edit Profile</a>
                        </li>
                        <!-- Nav item -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('change/password') ?>"><i class="fe fe-lock nav-icon"></i>Change Password</a>
                        </li>
                        <!-- Nav item -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('logout') ?>"><i class="fe fe-power nav-icon"></i>Sign Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
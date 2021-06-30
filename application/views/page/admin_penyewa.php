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

    <title>Renters | RentalKuy</title>
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
                        <a class="nav-link " href="<?= base_url() ?>">
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
                        <a class="nav-link active" href="<?= base_url('admin/penyewa') ?>">
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
            <!-- Container fluid -->
            <div class="container-fluid p-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Page Header -->
                        <div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
                            <div class="mb-2 mb-lg-0">
                                <h1 class="mb-1 h2 font-weight-bold">Renters</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card rounded-lg">
                            <!-- Card header -->
                            <div class="card-header border-bottom-0 p-0 bg-white">
                            </div>
                            <div>
                                <!-- Table -->
                                <div class="tab-content" id="tabContent">
                                    <!--Tab pane -->
                                    <div class="tab-pane fade show active" id="renters" role="tabpanel" aria-labelledby="renters-tab">
                                        <div class="table-responsive border-0 overflow-y-hidden">
                                            <table class="table mb-0 ">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="border-0 text-uppercase">
                                                            FULL NAME
                                                        </th>
                                                        <th scope="col" class="border-0 text-uppercase">
                                                            EMAIL
                                                        </th>
                                                        <th scope="col" class="border-0 text-uppercase">
                                                            ACTION
                                                        </th>
                                                        <th scope="col" class="border-0 text-uppercase"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($penyewa as $p) {
                                                        ?>
                                                        <tr></tr>
                                                        <td class="align-middle border-top-0">
                                                            <div class="d-flex align-items-center">
                                                                <h5 class="mb-0"><?= $p['nama_lengkap'] ?></h5>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle border-top-0">
                                                            <div class="d-flex align-items-center">
                                                                <h5 class="mb-0"><?= $p['email'] ?></h5>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle border-top-0">
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_detail<?= $p['id'] ?>">
                                                                Detail
                                                            </button>
                                                            <!-- Modal "Detail" -->
                                                            <div class="modal fade" id="modal_detail<?= $p['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="title_detail" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title h3 " id="title_detail">Renter Detail</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form>
                                                                                <div class="form-group">
                                                                                    <label for="nama_lengkap" class="col-form-label">Full Name:</label>
                                                                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" readonly value="<?= $p['nama_lengkap'] ?>">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="phone" class="col-form-label">Phone:</label>
                                                                                    <input type="text" class="form-control" id="phone" name="phone" readonly value="<?= $p['phone'] ?>">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="address" class="col-form-label">Address:</label>
                                                                                    <input type="text" class="form-control" id="address" name="address" readonly value="<?= $p['address'] . ", " . $p['city'] . ", " . $p['province'] ?>">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="nik" class="col-form-label">NIK:</label>
                                                                                    <input type="text" class="form-control" id="nik" readonly name="nik" value="<?= $p['nik'] ?>">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="sim" class="col-form-label">SIM:</label>
                                                                                    <input type="text" class="form-control" id="sim" readonly name="sim" value="<?= $p['sim'] ?>">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="saldo" class="col-form-label">Saldo:</label>
                                                                                    <input type="text" class="form-control" id="saldo" readonly name="saldo" value="<?= $p['saldo'] ?>">
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Modal "Detail" -->

                                                        </td>
                                                        </tr>
                                                    <?php
                                                    }

                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!--Tab pane -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <!-- Libs JS -->
    <script src="<?= base_url() ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/odometer/odometer.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/flatpickr/dist/flatpickr.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/quill/dist/quill.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/dragula/dist/dragula.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/dropzone/dist/min/dropzone.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/jQuery.print/jQuery.print.js"></script>
    <script src="<?= base_url() ?>assets/libs/prismjs/prism.js"></script>
    <script src="<?= base_url() ?>assets/libs/prismjs/components/prism-scss.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/%40yaireo/tagify/dist/tagify.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
    <script src="<?= base_url() ?>assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/typed.js/lib/typed.min.js"></script>


    <!-- clipboard -->
    <script src="../../../cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>


    <!-- Theme JS -->
    <script src="<?= base_url() ?>assets/js/theme.min.js"></script>

</body>

</html>
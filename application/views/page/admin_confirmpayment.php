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

    <title>Payment | RentalKuy</title>
</head>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
function tanggal_indonesia($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}
?>

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
                        <a class="nav-link active" href="<?= base_url('confirm-payment') ?>">
                            <i class="nav-icon fe fe-check mr-2"></i>Confirm Payment
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
                                <h1 class="mb-1 h2 font-weight-bold">Ongoing</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card rounded-lg">
                            <!-- Card header -->
                            <div class="card-header border-bottom-0 p-0 bg-white">
                            </div>
                            <div>

                                <!-- Table 2 -->
                                <div class="table-invoice table-responsive border-0">
                                    <table class="table mb-0 text-nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="border-bottom-0">ORDER ID</th>
                                                <th scope="col" class="border-bottom-0">DATE</th>
                                                <th scope="col" class="border-bottom-0">DESCRIPTION</th>
                                                <th scope="col" class="border-bottom-0">STATUS</th>
                                                <th scope="col" class="border-bottom-0">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($database as $data) {
                                                if (($data['tipe_riwayat'] == "Topup") || ($data['tipe_riwayat'] == "Withdraw")) {
                                                    $orderid = "DEPO-" . $data['id'];
                                                    if ($data['tipe_riwayat'] == 'Topup') {
                                                        $deskripsi = "Pay with " . $data['pembayaran'];
                                                    } else if ($data['tipe_riwayat'] == 'Withdraw') {
                                                        $deskripsi = "Send to " . $data['pembayaran'];
                                                    }
                                                    $tanggal = tanggal_indonesia($data['dibuat']);
                                                    $status = '<span class="badge badge-warning">Not Confirmed</span>';
                                                    $button = '<a href="' . base_url() . 'Admin/confirm/' . $orderid . '" class="btn btn-success btn-sm">Confirm</a>';
                                                    ?>
                                                    <tr>
                                                        <td><a href="">#<?= $orderid ?></a></td>
                                                        <td><?= $tanggal ?></td>
                                                        <td><?= $deskripsi ?></td>
                                                        <td><?= $status ?></td>
                                                        <td><?= $button ?></td>
                                                    </tr>

                                            <?php }
                                            } ?>
                                        </tbody>
                                    </table>
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
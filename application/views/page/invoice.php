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
    <!-- Page Content -->
    <div class="pt-5 pb-5">
        <div class="container">
            <!-- User info -->
            <?php
            if ($level == "Penyewa") {
                $this->load->view('include/nav');
            } else if ($level == "Staff Garasi") {
                $this->load->view('include/nav_side');
            }
            ?>
            <div class="col-lg-9 col-md-8 col-12">
                <!-- Card -->
                <div class="card border-0">
                    <!-- Card header -->
                    <div class="card-header d-lg-flex justify-content-between align-items-center">
                        <div class="mb-3 mb-lg-0">
                            <h3 class="mb-0">Invoices</h3>
                            <p class="mb-0">
                                You can find all of your order Invoices.
                            </p>
                        </div>
                    </div>
                    <!-- Table -->
                    <!-- Table -->
                    <div class="table-invoice table-responsive border-0">
                        <table class="table mb-0 text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-bottom-0">ORDER ID</th>
                                    <th scope="col" class="border-bottom-0">DATE</th>
                                    <th scope="col" class="border-bottom-0">DESCRIPTION</th>
                                    <th scope="col" class="border-bottom-0">STATUS</th>
                                    <th scope="col" class="border-bottom-0"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($database as $data) {
                                    if ($data['tanggal_mulai']) {
                                        $orderid = "SEWA-" . $data['id'];
                                        $tanggal = tanggal_indonesia($data['dibuat']);
                                        foreach ($mobil as $kendaraan) {
                                            if ($data['id_mobil'] == $kendaraan['id'])
                                                $deskripsi = "Do car rental " . $kendaraan['nama_mobil'];
                                        }
                                    } else {
                                        $orderid = "DEPO-" . $data['id'];
                                        if ($level == "Penyewa") {
                                            $deskripsi = "Pay with " . $data['pembayaran'];
                                        } else if ($level == "Staff Garasi") {
                                            $deskripsi = "Send to " . $data['pembayaran'];
                                        }
                                        $tanggal = tanggal_indonesia($data['dibuat']);
                                    }
                                    if ($data['status'] == "0" || $data['status'] == "2" || $data['status'] == "1.5" || $data['status'] == "1") {
                                        $status = '<span class="badge badge-success">Success</span>';
                                    } else {
                                        $status = '<span class="badge badge-danger">Waiting for payment</span>';
                                    }
                                    ?>
                                    <tr>
                                        <td><a href="<?= base_url('invoice/' . $data['id_url']) ?>">#<?= $orderid ?></a></td>
                                        <td><?= $tanggal ?></td>
                                        <td><?= $deskripsi ?></td>
                                        <td><?= $status ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->

    <div class="footer">
        <div class="container">
            <div class="row align-items-center no-gutters border-top py-2">
                <!-- Desc -->
                <div class="col-md-6 col-12 text-center text-md-left">
                    <span>© 2021 <?= $web_config['nama_website'] ?>. All Rights Reserved.</span>
                </div>
                <!-- Links -->
                <div class="col-12 col-md-6">
                    <nav class="nav nav-footer justify-content-center justify-content-md-end">
                        <a class="nav-link active pl-0" href="">Privacy</a>
                        <a class="nav-link" href="">Terms </a>
                        <a class="nav-link" href="">Feedback</a>
                        <a class="nav-link" href="">Support</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Untuk sunting
            $('#edit-data').on('show.bs.modal', function(event) {
                var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                var modal = $(this)

                // Isi nilai pada field
                modal.find('#id').attr("value", div.data('id'));
            });
        });
    </script>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/odometer/odometer.min.js"></script>
    <script src="assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="assets/libs/flatpickr/dist/flatpickr.min.js"></script>
    <script src="assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
    <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="assets/libs/quill/dist/quill.min.js"></script>
    <script src="assets/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js"></script>
    <script src="assets/libs/dragula/dist/dragula.min.js"></script>
    <script src="assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="assets/libs/dropzone/dist/min/dropzone.min.js"></script>
    <script src="assets/libs/jQuery.print/jQuery.print.js"></script>
    <script src="assets/libs/prismjs/prism.js"></script>
    <script src="assets/libs/prismjs/components/prism-scss.min.js"></script>
    <script src="assets/libs/%40yaireo/tagify/dist/tagify.min.js"></script>
    <script src="assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
    <script src="assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
    <script src="assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
    <script src="assets/libs/typed.js/lib/typed.min.js"></script>

    <!-- clipboard -->
    <script src="cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>


    <!-- Theme JS -->
    <script src="assets/js/theme.min.js"></script>

</body>

</html>
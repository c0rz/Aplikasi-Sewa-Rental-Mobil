<?php
defined('BASEPATH') or exit('No direct script access allowed');
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
            <?php $this->load->view('include/nav') ?>
            <div class="col-lg-9 col-md-8 col-12">
                <!-- Card -->
                <div class="card border-0">
                    <!-- Card header -->
                    <div class="card-header d-lg-flex justify-content-between align-items-center">
                        <div class="mb-3 mb-lg-0">
                            <h3 class="mb-0">Car History</h3>
                            <p class="mb-0">
                                Here is list of cars that you rent.
                            </p>
                        </div>
                    </div>
                    <!-- Table -->
                    <div class="tab-content" id="tabContent">
                        <!--Tab pane -->
                        <div class="tab-pane fade show active" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                            <div class="table-responsive border-0 overflow-y-hidden">
                                <table class="table mb-0 ">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="border-0 text-uppercase">
                                                CARS
                                            </th>
                                            <th scope="col" class="border-0 text-uppercase">
                                                STATUS
                                            </th>
                                            <th scope="col" class="border-0 text-uppercase">
                                                RATE
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($orderan)) {
                                            foreach ($orderan as $sewa) {
                                                foreach ($mobil as $kendaraan) {
                                                    if ($kendaraan['id'] ==  $sewa['id_mobil']) {
                                                        $nama_ken = $kendaraan['nama_mobil'];
                                                        $jenis = $kendaraan['jenis'];
                                                        $gambar = $kendaraan['gambar'];

                                                        ?>
                                                        <tr>
                                                            <td class="border-top-0">
                                                                <div class="text-inherit">
                                                                    <div class="d-lg-flex align-items-center">
                                                                        <div>
                                                                            <img src="assets/images/mobil/<?= $gambar ?>" alt="" class="img-4by3-lg rounded" />
                                                                        </div>
                                                                        <div class="ml-lg-3 mt-2 mt-lg-0">
                                                                            <h4 class="mb-1 text-primary-hover">
                                                                                (CAR-<?= $kendaraan['id'] ?>) <?= $nama_ken ?>
                                                                            </h4>
                                                                            <span class="text-inherit">Returned on <?= tanggal_indonesia($sewa['tanggal_selesai']); ?></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="align-middle border-top-0">
                                                                <?php
                                                                                if ($sewa['status'] == 1) {
                                                                                    $status = '<span class="badge badge-success">Returned</span>';
                                                                                } else if ($sewa['status'] == 0) {
                                                                                    $status = '<span class="badge badge-success">Returned</span>';
                                                                                } else if ($sewa['status'] == 1.5) {
                                                                                    $status = '<span class="badge badge-warning">Ongoing</span>';
                                                                                } else if ($sewa['status'] == 2) {
                                                                                    $status = '<span class="badge badge-warning">Waiting</span>';
                                                                                } else if ($sewa['status'] == 3) {
                                                                                    $status = '<span class="badge badge-danger">Late</span>';
                                                                                }
                                                                                echo $status;
                                                                                ?>
                                                            </td>
                                                            <td class="align-middle border-top-0">
                                                                <?php
                                                                                if ($sewa['status'] == 1 || $sewa['status'] == 3) {
                                                                                    $button = '<a href="javascript:;" data-toggle="modal" data-target="#edit-data' . $sewa['id'] . '" class="btn btn-sm btn-success">Rate Now</a>';
                                                                                } else if ((int) $sewa['status'] == 0) {
                                                                                    $button = '<span class="text-warning">' . $sewa['rate'] . '<i class="mdi mdi-star"></i></span>';
                                                                                } else {
                                                                                    $button = '';
                                                                                }
                                                                                echo $button; ?>
                                                            </td>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="edit-data<?= $sewa['id'] ?>" role="dialog">
                                                                <div class="modal-dialog">
                                                                    <!-- Modal content-->
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Rate Now</h4>
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form method="POST" action="<?= base_url('rating') ?>">
                                                                                <input type="hidden" class="form-control mb-2" name="id_sewa" id="id_sewa" value="<?= $sewa['id'] ?>">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="radio" name="rating" id="bintang1" value="1">
                                                                                    <label class="form-check-label" for="bintang1">1</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="radio" name="rating" id="bintang2" value="2">
                                                                                    <label class="form-check-label" for="bintang2">2</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="radio" name="rating" id="bintang3" value="3">
                                                                                    <label class="form-check-label" for="bintang3">3</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="radio" name="rating" id="bintang4" value="4">
                                                                                    <label class="form-check-label" for="bintang4">4</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="radio" name="rating" id="bintang5" value="5">
                                                                                    <label class="form-check-label" for="bintang5">5</label>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="note">Review</label>
                                                                                    <textarea class="form-control" id="note" rows="3" name="note"></textarea>
                                                                                </div>
                                                                                <div><button type="submit" class="btn btn-success btn-sm mt-3">Submit</button></div>
                                                                            </form>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </tr>
                                        <?php }
                                                }
                                            }
                                        } ?>
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
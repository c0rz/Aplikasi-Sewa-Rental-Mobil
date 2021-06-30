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
$harga = number_format((int) $detail_mobil['harga'], 0, ',', '.');
if ($detail_mobil['tipe_riwayat'] == "Rent") {
    $mobil = $this->Database->getData("mobil", array("id" => $detail_mobil['id_mobil']));
}
?>
<!-- Page Content -->
<div class="pt-5 pb-5">
    <div class="container">
        <!-- User info -->
        <div class="col-lg-12">
            <!-- Card -->
            <div class="card border-0" id="invoice">
                <!-- Card body -->
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-6">
                        <div>
                            <!-- Img -->
                            <h2 class=" mb-0"><?= $web_config['nama_website'] ?></h2>
                            <small>INVOICE ID: #<?= $detail_mobil['id'] ?></small>
                        </div>
                    </div>
                    <!-- Row -->
                    <div class="row">
                        <div class="col-md-8 col-12">
                            <span class="font-size-xs">Type Invoice</span>
                            <h5 class="mb-3"><?= $detail_mobil['tipe_riwayat'] ?></h5>
                        </div>
                    </div>
                    <!-- Table -->
                    <div class="table-responsive mb-12">
                        <table class="table mb-0 text-nowrap table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-dark">
                                    <?php if ($detail_mobil['tipe_riwayat'] == "Rent") { ?>
                                        <td class="py-2"><?= $mobil['nama_mobil'] ?> <span class="font-size-xs text-muted">(<?= tanggal_indonesia($detail_mobil['tanggal_mulai']) ?>
                                                to <?= tanggal_indonesia($detail_mobil['tanggal_selesai']) ?>)</span></td>
                                        <td class="py-2"></td>
                                        <td class="py-2"></td>
                                        <td class="py-2">IDR <?= $harga ?></td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="text-dark">
                                    <td colspan="2" class="py-2"></td>
                                    <td colspan="1" class="pb-0">Total</td>
                                    <td class="pb-0">IDR <?= $harga ?></td>
                                </tr>
                                <tr class="text-dark">
                                </tr>
                                <tr class="text-dark">
                                    <td colspan="2" class="py-2"></td>
                                    <td colspan="1" class="pt-0">Tax*</td>
                                    <td class="pt-0">IDR <?= explode(".", $harga)[1] ?></td>
                                </tr>
                                <tr class="text-dark">
                                    <td colspan="2" class="py-2"></td>
                                    <td colspan="1" class="border-top py-1 font-weight-bold">Grand Total</td>
                                    <td class="border-top py-1 font-weight-bold">IDR <?= $harga ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- Short note -->
                    <p class="border-top pt-3 mb-0 ">Notes: Invoice was created on a computer and is valid
                        without the signature and seal.</p>
                </div>
            </div>
        </div>
    </div>
</div>
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
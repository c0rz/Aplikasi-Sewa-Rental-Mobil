<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
$jumlah = count($nama_dipisah);
if ($jumlah > 2) {
    $j = 0;
    $n_depan = array();
    $ar_bl = array();
    foreach ($nama_dipisah as $nl) {
        if ($j == 1) {
            array_push($ar_bl, $nl);
        } else {
            $j++;
            $n_depan = $nl;
        }
    }
    $ta = false;
    foreach ($ar_bl as $d) {
        if ($ta) {
            $n_belakang .= " ";
            $ta = false;
        }
        $n_belakang .= $d;
        $ta = true;
    }
} else {
    $n_depan = $nama_dipisah[0];
    $n_belakang = $nama_dipisah[1];
}
?>
<div class="pt-5 pb-5">
    <div class="container">
        <!-- User info -->
        <?php
        if ($level == "Penyewa") {
            $this->load->view('include/nav');
            $ket = "required";
        } else if ($level == "Staff Garasi") {
            $this->load->view('include/nav_side');
            $ket = "disabled";
        }
        ?>
        <div class="col-lg-9 col-md-8 col-12">
            <!-- Card -->
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Personal Details</h3>
                    <p class="mb-0">
                        Edit your personal information and address.
                    </p>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <div>
                        <form class="form-row" method="POST" autocomplete="off">
                            <?php if ($laporan) : ?>
                                <div class="form-group col-12 col-md-12">
                                    <?= $laporan ?>
                                </div>
                            <?php endif; ?>
                            <div class="form-group col-12 col-md-6">
                                <label class="form-label" for="fname">First Name</label>
                                <input type="text" name="fname" class="form-control" placeholder="First Name" value="<?= $n_depan ?>" required />
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label class="form-label" for="lname">Last Name</label>
                                <input type="text" name="lname" class="form-control" placeholder="Last Name" value="<?= $n_belakang ?>" required />
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label class="form-label" for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="Phone" value="<?= $user["phone"] ?>" <?= $ket ?> />
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label class="form-label" for="address">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Address" value="<?= $user["address"] ?>" <?= $ket ?> />
                            </div>
                            <div class="form-group col-12 col-md-12">
                                <label class="form-label">City</label>
                                <input type="text" name="city" class="form-control" placeholder="Address" value="<?= $user["city"] ?>" <?= $ket ?> />
                            </div>
                            <div class="form-group col-12 col-md-12">
                                <label class="form-label">NIK</label>
                                <input type="text" id="address" class="form-control" value="<?= $user["nik"] ?>" disabled />
                            </div>
                            <div class="form-group col-12 col-md-12">
                                <label class="form-label">SIM</label>
                                <input type="text" id="address" class="form-control" value="<?= $user["sim"] ?>" disabled />
                            </div>
                            <div class="col-12">
                                <!-- Button -->
                                <button class="btn btn-primary" type="submit">
                                    Update Profile
                                </button>
                            </div>
                        </form>
                    </div>
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
                    <a class="nav-link active pl-0" href="#!">Privacy</a>
                    <a class="nav-link" href="#!">Terms </a>
                    <a class="nav-link" href="#!">Feedback</a>
                    <a class="nav-link" href="#!">Support</a>
                </nav>
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
<script src="<?= base_url() ?>//cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>


<!-- Theme JS -->
<script src="<?= base_url() ?>assets/js/theme.min.js"></script>


</body>

</html>
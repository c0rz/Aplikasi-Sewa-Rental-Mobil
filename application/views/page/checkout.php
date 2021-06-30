<?php
defined('BASEPATH') or exit('No direct script access allowed');
$rand = rand(000, 999);
$harga_acak = $mobil['harga'] + $rand;
?>
<!-- Page header -->
<div class="py-lg-6 py-4 bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <div>
                    <h1 class="text-white display-4 mb-0">Checkout Page</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content -->
<div class="py-6">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12">
                <!-- Card -->
                <div class="card  mb-3 mb-lg-0">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Payment Method</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form action="<?= base_url() ?>Mobil/cek" method="POST">
                            <input type="hidden" name="id_mobil" value="<?= $mobil['id'] ?>">
                            <input type="hidden" name="harga" value="<?= $harga_acak ?>" id="hargainput">
                            <div class="form-group col-12 col-md-12">
                                <label class="form-label" for="nama">Name</label>
                                <input type="text" name="nama" id="nama" class="form-control" required>
                            </div>
                            <label class="form-label col-12 col-md-12 mb-2">Services</label>
                            <div class="form-group custom-control custom-radio custom-control-inline ml-3">
                                <input type="radio" id="self" name="service" value="Self Service" class="custom-control-input">
                                <label class="custom-control-label " for="self"><span class="text-dark">Self Service</span></label>
                            </div>
                            <div class="form-group custom-control custom-radio custom-control-inline">
                                <input type="radio" id="staff" name="service" value="Staff Service" class="custom-control-input">
                                <label class="custom-control-label" for="staff"><span class="text-dark">Staff Service</span></label>
                            </div>
                            <div class="form-group col-12 col-md-12">
                                <label class="form-label" for="alamat">Address</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" required>
                            </div>
                            <div class="form-group col-12 col-md-12 mb-3">
                                <label class="form-label" for="tgl_mulai">Start Date</label>
                                <input type="date" id="tgl_mulai" class="form-control" name="mulainya" required>
                            </div>
                            <div class="form-group col-12 col-md-12 mb-3">
                                <label class="form-label" for="tgl_selesai">End Date</label>
                                <input type="date" id="tgl_selesai" class="form-control" name="sewanya" required>
                            </div>
                            <label class="form-label col-12 col-md-12 mb-2">Method</label>
                            <div class="form-group custom-control custom-radio custom-control-inline ml-3">
                                <input type="radio" id="saldo" name="metode" value="Saldo" class="custom-control-input">
                                <label class="custom-control-label " for="saldo"><span class="text-dark">Saldo</span></label>
                            </div>
                            <div class="form-group custom-control custom-radio custom-control-inline">
                                <input type="radio" id="cod" name="metode" value="COD" class="custom-control-input">
                                <label class="custom-control-label" for="cod"><span class="text-dark">COD</span></label>
                            </div>
                            <div class="form-group col-12 col-md-12"><button name="submit" value="0" class="btn btn-success btn-sm">Submit</button></div>
                        </form>
                        <form class="form-header" action="http://127.0.0.1/rpl/source-code/kupon/" role="form" method="POST" id="kuponmobil">
                            <div class="form-group col-12 col-md-12">
                                <div id="mutiara"></div>
                                <input type="hidden" name="harganow" value="<?= $harga_acak ?>" id="harganow">
                                <label class="form-label" for="promo">Coupon</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter your code" name="kode" id="kode">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" name="submit" value="1" placeholder="Apply">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12">
                <!-- Card -->
                <div class="card  border-0 mb-3">
                    <!-- Card body -->
                    <div class="p-5 text-center">
                        <span class="badge badge-warning">Selected Plan</span>
                        <div class="mb-5 mt-3">
                            <div class="d-flex justify-content-center position-relative rounded py-15 border-white border rounded-lg bg-cover" style="background-image: url(<?= base_url('assets/images/mobil/' . $mobil['gambar']) ?>);">
                            </div>
                            <h1 class="font-weight-bold"><?= $mobil['nama_mobil'] ?></h1>
                        </div>
                        <div class="d-flex justify-content-center">
                            <span class="h3 mb-0 font-weight-bold text-primary">IDR</span>
                            <div class="display-4 font-weight-bold text-primary" id="harga"><?= number_format($harga_acak, 0, ',', '.') ?></div>
                            <span class=" align-self-end mb-1">/day</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<!-- Footer -->
<div class="footer">
    <div class="container">
        <div class="row align-items-center no-gutters border-top py-2">
            <!-- Desc -->
            <div class="col-md-6 col-12 text-center text-md-left">
                <span>© 2021 Rental Kuy. All Rights Reserved.</span>
            </div>
            <!-- Links -->
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
<script src="<?= base_url() ?>assets/libs/@yaireo/tagify/dist/tagify.min.js"></script>
<script src="<?= base_url() ?>assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
<script src="<?= base_url() ?>assets/libs/@popperjs/core/dist/umd/popper.min.js"></script>
<script src="<?= base_url() ?>assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
<script src="<?= base_url() ?>assets/libs/typed.js/lib/typed.min.js"></script>
<script src="<?= base_url() ?>assets/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
<script src="<?= base_url() ?>assets/libs/jsvectormap/dist/maps/world.js"></script>
<script>
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
    $(document).ready(function() {
        $("#kuponmobil").submit(function() {
            if ($('#kode').val().length > 3) {
                var pdata = $(this).serialize();
                var purl = $(this).attr('action');
                $.ajax({
                    url: purl,
                    data: pdata,
                    timeout: false,
                    type: 'POST',
                    dataType: 'JSON',
                    success: function(hasil) {
                        $("#kode").removeAttr("disabled", "disabled");
                        $("button").removeAttr("disabled", "disabled");
                        $("#btn-login").html('Masuk');
                        $("#mutiara").html(hasil.result ? "<div class='alert alert-success' role='alert'>" + hasil.content + "</div>" : "<div class='alert alert-warning' role='alert'>" + hasil.content + "</div>")
                        if (hasil.price) {
                            var harga_sekarang = $('#harganow').attr("value");
                            $("#harga").html(numberWithCommas(harga_sekarang - hasil.price));
                            $("#harga_awal").attr('value', harga_sekarang - hasil.price);
                            $("#hargainput").attr('value', harga_sekarang - hasil.price);
                            console.log(harga_sekarang);
                            console.log(hasil.price);
                        }
                    },
                    error: function(a, b, c) {
                        $("#kode").removeAttr("disabled", "disabled");
                        $("button").removeAttr("disabled", "disabled");
                        $("#mutiara").html('<div class="alert alert-warning" role="alert">' + c + '</div>')
                    }
                })
            }
            return false
        })
    });

    function test() {
        var total = 0;
        var day = document.getElementById('hari').value;
        var harga = document.getElementById('harga_awal').value;
        total = day * harga;
        console.log(total);
        console.log(harga);
        $("#harga").html(numberWithCommas(total));
        $('#harga').attr('value', total);
    }
</script>


<!-- clipboard -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>


<!-- Theme JS -->
<script src="<?= base_url() ?>assets/js/theme.min.js"></script>
</body>

</html>
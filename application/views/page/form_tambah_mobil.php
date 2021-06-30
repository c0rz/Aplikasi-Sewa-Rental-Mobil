</div>
<!-- Container fluid -->
<div class="container-fluid p-4">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page Header -->
            <div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
                <div class="mb-2 mb-lg-0">
                    <h1 class="mb-1 h2 font-weight-bold">Cars</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Card -->
            <div class="card mb-4">
                <!-- Card Header -->
                <div class="card-header">
                    <h3 class="mb-0">Add New Car</h3>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Form -->
                    <form class="form-row" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="nama_mobil">Car Name</label>
                            <input type="text" name="nama_mobil" class="form-control" placeholder="Car Name" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="stnk">STNK</label>
                            <input type="number" name="stnk" class="form-control" placeholder="STNK" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label">Fuel Type</label>
                            <select class="selectpicker" name="tipe" data-width="100%">
                                <option value="">Select Type</option>
                                <option value="Bensin">Bensin</option>
                                <option value="Diesel">Diesel</option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="harga">Price</label>
                            <input type="text" name="harga" class="form-control" placeholder="Price" required>
                        </div>
                        <div class="form-group col-12 col-md-12">
                            <label for="gambar">Upload Picture</label>
                            <input type="file" class="form-control" size="20" name="gambarnya" multiple="multiple" required="" />
                        </div>
                        <button type="submit" class="btn btn-success">Add Car</button>
                    </form>
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
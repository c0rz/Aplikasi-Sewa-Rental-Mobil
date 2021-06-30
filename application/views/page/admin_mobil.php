<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
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
      <div class="card rounded-lg">
        <!-- Card header -->
        <div class="card-header border-bottom-0 p-0 bg-white">
        </div>
        <div class="p-4 row">
          <!-- Form -->
          <form class="d-flex align-items-center col-12 col-md-12 col-lg-12">
            <span class="position-absolute pl-3 search-icon">
              <i class="fe fe-search"></i>
            </span>
            <input type="search" class="form-control pl-6" placeholder="Search Car" />
          </form>
        </div>
        <div>
          <!-- Table -->
          <div class="tab-content" id="tabContent">
            <!--Tab pane -->
            <div class="tab-pane fade show active" id="cars" role="tabpanel" aria-labelledby="cars-tab">
              <div class="table-responsive border-0 overflow-y-hidden">
                <table class="table mb-0 ">
                  <thead>
                    <tr>
                      <th scope="col" class="border-0 text-uppercase">
                        CARS
                      </th>
                      <th scope="col" class="border-0 text-uppercase">
                        GARAGE STAFF
                      </th>
                      <th scope="col" class="border-0 text-uppercase">
                        DRIVER LICENSE
                      </th>
                      <th scope="col" class="border-0 text-uppercase">
                        TYPE
                      </th>
                      <th scope="col" class="border-0 text-uppercase">
                        PRICE
                      </th>
                      <th scope="col" class="border-0 text-uppercase">
                        RATING
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($pemilik as $staff) {
                      foreach ($mobil as $kendaraan) {
                        if ($kendaraan['id_staff'] == $staff['id']) {
                          foreach ($rating as $rate) {
                            $r = 0;
                            if ($kendaraan['id'] == $rate['id_mobil']) {
                              $r = $rate['avg'];
                              ?>
                              <tr>
                                <td class="border-top-0">
                                  <div class="text-inherit">
                                    <div class="d-lg-flex align-items-center">
                                      <div>
                                        <img src="<?= base_url() ?>assets/images/mobil/<?= $kendaraan['gambar'] ?>" alt="" class="img-4by3-lg rounded" />
                                      </div>
                                      <div class="ml-lg-3 mt-2 mt-lg-0">
                                        <h4 class="mb-1 text-primary-hover">
                                          (CAR-<?= $kendaraan['id'] ?>) <?= $kendaraan['nama_mobil'] ?>
                                        </h4>
                                        <span class="text-inherit">Added on 27 March, 2021</span>
                                      </div>
                                    </div>
                                  </div>
                                </td>
                                <td class="align-middle border-top-0">
                                  <div class="d-flex align-items-center">
                                    <img src="<?= base_url() ?>assets/images/avatar/avatar-2.jpg" alt="" class="rounded-circle avatar-xs mr-2" />
                                    <h5 class="mb-0"><?= $staff['nama_lengkap'] ?></h5>
                                  </div>
                                </td>
                                <!-- ce -->
                                <td class="align-middle border-top-0">
                                  <div class="d-flex align-items-center">
                                    <h5 class="mb-0"><?= $kendaraan['stnk'] ?></h5>
                                  </div>
                                </td>
                                <td class="align-middle border-top-0">
                                  <div class="d-flex align-items-center">
                                    <h5 class="mb-0"><?= $kendaraan['jenis'] ?></h5>
                                  </div>
                                </td>
                                <td class="align-middle border-top-0">
                                  <div class="d-flex align-items-center">
                                    <h5 class="mb-0"><?= $kendaraan['harga'] ?></h5>
                                  </div>
                                </td>
                                <td class="align-middle border-top-0">
                                  <div class="d-flex align-items-center">
                                    <h5 class="mb-0"><?= $r ?><span class="mdi mdi-star text-warning ml-2"></span></h5>
                                  </div>
                                </td>
                              </tr>
                    <?php
                            }
                          }
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
</div>
</div>
<!-- Scripts -->
<!-- Libs JS -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/libs/odometer/odometer.min.js"></script>
<script src="../assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<script src="../assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="../assets/libs/flatpickr/dist/flatpickr.min.js"></script>
<script src="../assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
<script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="../assets/libs/quill/dist/quill.min.js"></script>
<script src="../assets/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js"></script>
<script src="../assets/libs/dragula/dist/dragula.min.js"></script>
<script src="../assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
<script src="../assets/libs/dropzone/dist/min/dropzone.min.js"></script>
<script src="../assets/libs/jQuery.print/jQuery.print.js"></script>
<script src="../assets/libs/prismjs/prism.js"></script>
<script src="../assets/libs/prismjs/components/prism-scss.min.js"></script>
<script src="../assets/libs/%40yaireo/tagify/dist/tagify.min.js"></script>
<script src="../assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
<script src="../assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
<script src="../assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
<script src="../assets/libs/typed.js/lib/typed.min.js"></script>


<!-- clipboard -->
<script src="../../../cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>


<!-- Theme JS -->
<script src="../assets/js/theme.min.js"></script>

</body>

</html>
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
          <!-- Table -->
          <div class="tab-content" id="tabContent">
            <!--Tab pane -->
            <div class="tab-pane fade show active" id="courses" role="tabpanel" aria-labelledby="courses-tab">
              <div class="table-responsive border-0 overflow-y-hidden">
                <table class="table mb-0 ">
                  <thead>
                    <tr>
                      <th scope="col" class="border-0 text-uppercase">
                        CAR NAME
                      </th>
                      <th scope="col" class="border-0 text-uppercase">
                        DATE
                      </th>
                      <th scope="col" class="border-0 text-uppercase">
                        DESCRIPTION
                      </th>
                      <th scope="col" class="border-0 text-uppercase">
                        SERVICE
                      </th>
                      <th scope="col" class="border-0 text-uppercase">
                        ADDRESS
                      </th>
                      <th scope="col" class="border-0 text-uppercase">
                        STATUS
                      </th>
                      <th scope="col" class="border-0 text-uppercase">
                        ACTION
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($database as $data) {
                      if ($data['tipe_riwayat'] == "Rent") {
                        if (($data['status'] == 2) || ($data['status'] == 1.5)) {
                          $orderid = "SEWA-" . $data['id'];
                          $tanggal = tanggal_indonesia($data['dibuat']);
                          $service = $data['service'];
                          $alamat = $data['alamat'];
                          if ($data['pembayaran'] == "Saldo") {
                            $deskripsi = "Pay with " . $data['pembayaran'];
                          } else {
                            $deskripsi = "Pay " . $data['pembayaran'];
                          }
                          if ($data['status'] == 2) {
                            $status = '<span class="badge badge-warning">Waiting</span>';
                            $button = '<a href="' . base_url() . 'Staff/confirm/' . $orderid . '" class="btn btn-warning btn-sm">Confirm</a>';
                          } else if ($data['status'] == 1.5) {
                            $status = '<span class="badge badge-warning">Wait for Return</span>';
                            $button = '<a href="' . base_url() . 'Staff/returned/' . $orderid . '" class="btn btn-success btn-sm">Return</a>';
                          }
                          ?>
                          <tr>
                            <td><a href="">#<?= $orderid ?></a></td>
                            <td><?= $tanggal ?></td>
                            <td><?= $deskripsi ?></td>
                            <td><?= $service ?></td>
                            <td><?= $alamat ?></>
                            <td><?= $status ?></td>
                            <td><?= $button ?></td>
                          </tr>

                    <?php
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
  <div class="row ">
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
            <div class="tab-pane fade show active" id="courses" role="tabpanel" aria-labelledby="courses-tab">
              <div class="table-responsive border-0 overflow-y-hidden">
                <table class="table mb-0 ">
                  <thead>
                    <tr>
                      <th scope="col" class="border-0 text-uppercase">
                        CAR NAME
                      </th>
                      <th scope="col" class="border-0 text-uppercase">
                        STNK
                      </th>
                      <th scope="col" class="border-0 text-uppercase">
                        PRICE
                      </th>
                      <th scope="col" class="border-0 text-uppercase">
                        TYPE
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($mobil as $pemilik) { ?>
                      <tr>
                        <td class="border-top-0">
                          <div class="text-inherit">
                            <div class="d-lg-flex align-items-center">
                              <div>
                                <img src="assets/images/mobil/<?= $pemilik['gambar'] ?>" alt="<?= $pemilik['nama_mobil'] ?>" class="img-4by3-lg rounded" />
                              </div>
                              <div class="ml-lg-3 mt-2 mt-lg-0">
                                <h4 class="mb-1 text-primary-hover">
                                  <?= $pemilik['nama_mobil'] ?>
                                </h4>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle border-top-0">
                          <div class="d-flex align-items-center">
                            <?= $pemilik['stnk'] ?>
                          </div>
                        </td>
                        <td class="align-middle border-top-0">
                          <div class="d-flex align-items-center">
                            Rp. <?= number_format($pemilik['harga'], 0, ',', '.') ?>
                          </div>
                        </td>
                        <td class="align-middle border-top-0">
                          <div class="d-flex align-items-center">
                            <?= $pemilik['jenis'] ?>
                          </div>
                        </td>
                      </tr>
                    <?php } ?>
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
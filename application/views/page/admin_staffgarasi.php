<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <!-- Favicon icon-->
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/') ?>images/favicon/favicon.ico">

  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <!-- Libs CSS -->
  <link href="<?= base_url('assets/') ?>fonts/feather/feather.css" rel="stylesheet" />
  <link href="<?= base_url('assets/') ?>libs/dragula/dist/dragula.min.css" rel="stylesheet" />
  <link href="<?= base_url('assets/') ?>libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
  <link href="<?= base_url('assets/') ?>libs/prismjs/themes/prism.css" rel="stylesheet" />
  <link href="<?= base_url('assets/') ?>libs/dropzone/dist/dropzone.css" rel="stylesheet" />
  <link href="<?= base_url('assets/') ?>libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet" />
  <link href="<?= base_url('assets/') ?>libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>libs/%40yaireo/tagify/dist/tagify.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>libs/tippy.js/dist/tippy.css" rel="stylesheet">

  <!-- Theme CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/theme.min.css">
  <title>Garage Staff | RentalKuy</title>
</head>

<body>
  <!-- Wrapper -->
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
            <a class="nav-link active" href="<?= base_url('admin/staff') ?>">
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
    <!-- sidebar -->
    <!-- Page Content -->
    <div id="page-content">
      <!-- Container fluid -->
      <div class="container-fluid p-4">
        <div class="row">
          <!-- Page Header -->
          <div class="col-lg-12 col-md-12 col-12">
            <div class="border-bottom pb-4 mb-4 d-flex justify-content-between align-items-center">
              <div class="mb-2 mb-lg-0">
                <h1 class="mb-1 h2 font-weight-bold">
                  Garage Staff
                </h1>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-12">
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
                  <input type="search" class="form-control pl-6" placeholder="Search Staff" />
                </form>
              </div>
              <div>
                <!-- Tab -->
                <div class="tab-content" id="tabContent">
                  <div class="tab-pane fade show active" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                    <div class="table-responsive border-0 overflow-y-hidden">
                      <table class="table mb-0 ">
                        <thead>
                          <tr>
                            <th scope="col" class="border-0 text-uppercase">
                              Full Name
                            </th>
                            <th scope="col" class="border-0 text-uppercase">
                              Identity Number
                            </th>
                            <th scope="col" class="border-0 text-uppercase">
                              Driver License
                            </th>
                            <th scope="col" class="border-0 text-uppercase">
                              Email
                            </th>
                            <th scope="col" class="border-0 text-uppercase">
                              Status
                            </th>
                            <th scope="col" class="border-0 text-uppercase">
                              Action
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach ($pemilik as $staff) {
                            ?>
                            <tr>
                              <td class="border-top-0">
                                <h4 class="mb-1 text-primary-hover">
                                  <?= $staff['nama_lengkap'] ?>
                                </h4>
                              </td>
                              <td class="align-middle border-top-0">
                                <div class="d-flex align-items-center">
                                  <?= $staff['nik'] ?>
                                </div>
                              </td>
                              <td class="align-middle border-top-0">
                                <?= $staff['sim'] ?>
                              </td>
                              <td class="align-middle border-top-0">
                                <?= $staff['email'] ?>
                              </td>
                              <td class="align-middle border-top-0">
                                <?php
                                  if ($staff['status'] == 'PENDING') {
                                    $status = '<span class="badge-dot bg-warning mr-1 d-inline-block align-middle"></span>Pending';
                                  } else if ($staff['status'] == 'AKTIF') {
                                    $status = '<span class="badge-dot bg-success mr-1 d-inline-block align-middle"></span>Verified';
                                  } else if ($staff['status'] == 'REJECT') {
                                    $status = '<span class="badge-dot bg-danger mr-1 d-inline-block align-middle"></span>Rejected';
                                  }
                                  echo $status;
                                  ?>
                              </td>
                              <td class="align-middle border-top-0">
                                <?php
                                  if ($staff['status'] == 'PENDING') {
                                    $button = '<a href="' . base_url() . 'Admin/reject_status/' . $staff['id'] . '" class="btn btn-outline-white btn-sm">Reject</a>
                                    <a href="' . base_url() . 'Admin/approve_status/' . $staff['id'] . '" class="btn btn-success btn-sm">Approved</a>';
                                  } else if ($staff['status'] == 'AKTIF') {
                                    $button = '<a type="button" class="btn btn-secondary btn-sm mb-1" data-toggle="modal" data-target="#modal_change_status' . $staff['id'] . '">Change Status</a>
                                    <a href="' . base_url() . 'Admin/delete_staff/' . $staff['id'] . '" class="btn btn-danger btn-sm">Delete</a>';
                                  } else {
                                    $button = '';
                                  }
                                  echo $button;
                                  ?>
                              </td>
                              <!-- Modal -->
                              <div class="modal fade" id="modal_change_status<?= $staff['id'] ?>" role="dialog">
                                <div class="modal-dialog">
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Change Staff Status</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="POST" action="<?= base_url('admin/change-status') ?>">
                                        <input type="hidden" class="form-control mb-2" name="id_staff" id="id_staff" value="<?= $staff['id'] ?>">
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="status" id="pending" value="PENDING" <?php if ($staff['status'] == 'PENDING') {
                                                                                                                                      echo "checked";
                                                                                                                                    } ?>>
                                          <label class="form-check-label" for="pending">Pending</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="status" id="aktif" value="AKTIF" <?php if ($staff['status'] == 'AKTIF') {
                                                                                                                                  echo "checked";
                                                                                                                                } ?>>
                                          <label class="form-check-label" for="aktif">Verified</label>
                                        </div>

                                        <div><button type="submit" class="btn btn-success btn-sm mt-3">Submit</button></div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </tr>

                          <?php
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
    </div>
  </div>
  <!-- /#page-content-wrapper -->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!-- Libs JS -->
  <script src="<?= base_url('assets/') ?>libs/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url('assets/') ?>libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/') ?>libs/odometer/odometer.min.js"></script>
  <script src="<?= base_url('assets/') ?>libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?= base_url('assets/') ?>libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
  <script src="<?= base_url('assets/') ?>libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
  <script src="<?= base_url('assets/') ?>libs/flatpickr/dist/flatpickr.min.js"></script>
  <script src="<?= base_url('assets/') ?>libs/inputmask/dist/jquery.inputmask.min.js"></script>
  <script src="<?= base_url('assets/') ?>libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="<?= base_url('assets/') ?>libs/quill/dist/quill.min.js"></script>
  <script src="<?= base_url('assets/') ?>libs/file-upload-with-preview/dist/file-upload-with-preview.min.js"></script>
  <script src="<?= base_url('assets/') ?>libs/dragula/dist/dragula.min.js"></script>
  <script src="<?= base_url('assets/') ?>libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
  <script src="<?= base_url('assets/') ?>libs/dropzone/dist/min/dropzone.min.js"></script>
  <script src="<?= base_url('assets/') ?>libs/jQuery.print/jQuery.print.js"></script>
  <script src="<?= base_url('assets/') ?>libs/prismjs/prism.js"></script>
  <script src="<?= base_url('assets/') ?>libs/prismjs/components/prism-scss.min.js"></script>
  <script src="<?= base_url('assets/') ?>libs/%40yaireo/tagify/dist/tagify.min.js"></script>
  <script src="<?= base_url('assets/') ?>libs/tiny-slider/dist/min/tiny-slider.js"></script>
  <script src="<?= base_url('assets/') ?>libs/%40popperjs/core/dist/umd/popper.min.js"></script>
  <script src="<?= base_url('assets/') ?>libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
  <script src="<?= base_url('assets/') ?>libs/typed.js/lib/typed.min.js"></script>

  <!-- clipboard -->
  <script src="../../../cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>


  <!-- Theme JS -->
  <script src="<?= base_url('assets/') ?>js/theme.min.js"></script>


</body>

</html>
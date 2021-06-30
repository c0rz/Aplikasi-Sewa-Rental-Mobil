<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Page Content -->
<div class="bg-primary">
	<div class="container">
		<br /><br /><br /><br />

		<!-- Hero Section -->
		<div class="row align-items-center no-gutters">
			<div class="col-xl-5 col-lg-6 col-md-12">
				<div class="py-5 py-lg-0">
					<h1 class="text-white display-4 font-weight-bold">We Provide Best Car
					</h1>
					<p class="text-white-50 mb-4 lead">
						We give you the best of the best of our services. We provide facts that you need to know. From car rating, what's included and pick-up information
					</p>
				</div>
			</div>
			<div class=" col-xl-7 col-lg-6 col-md-12 text-lg-right text-center">
				<img src="<?= base_url('assets/images/gambar-depan.png') ?>" alt="" class="img-fluid" />
			</div>
		</div>
		<br /><br /><br /><br />
	</div>
</div>
<div class="bg-white py-4 shadow-sm">
	<div class="container">
		<div class="row align-items-center no-gutters">
			<!-- Features -->
			<div class="col-xl-4 col-lg-4 col-md-6 mb-lg-0 mb-4">
				<div class="d-flex align-items-center">
					<span class="icon-sahpe icon-lg bg-light-warning rounded-circle text-center text-dark-warning font-size-md "> <i class="fe fe-video"> </i></span>
					<div class="ml-3">
						<h4 class="mb-0 font-weight-semi-bold">30,000 cars ready</h4>
						<p class="mb-0">Enjoy a variety of fresh topics</p>
					</div>
				</div>
			</div>
			<!-- Features -->
			<div class="col-xl-4 col-lg-4 col-md-6 mb-lg-0 mb-4">
				<div class="d-flex align-items-center">
					<span class="icon-sahpe icon-lg bg-light-warning rounded-circle text-center text-dark-warning font-size-md "> <i class="fe fe-users"> </i></span>
					<div class="ml-3">
						<h4 class="mb-0 font-weight-semi-bold">Expert instruction</h4>
						<p class="mb-0">Find the right instructor for you</p>
					</div>
				</div>
			</div>
			<!-- Features -->
			<div class="col-xl-4 col-lg-4 col-md-12">
				<div class="d-flex align-items-center">
					<span class="icon-sahpe icon-lg bg-light-warning rounded-circle text-center text-dark-warning font-size-md "> <i class="fe fe-clock"> </i></span>
					<div class="ml-3">
						<h4 class="mb-0 font-weight-semi-bold">Lifetime access</h4>
						<p class="mb-0">Learn on your schedule</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Content -->

<div class="pt-lg-12 pb-lg-3">
	<div class="container">
		<div class="row mb-4">
			<div class="col">
				<h2 class="mb-0">COUPON PROMO</h2>
			</div>
		</div>
		<?php
		if (!empty($promo)) {
			foreach ($promo as $diskon) {
		?>
				<div class="position-relative">
					<div class="card mb-4 card-hover">
						<div class="card-body p-3 pb-0">
							<div class="bg mb-3 mr-2">
								<h3 class="mb-0 text-truncate-line-2">Discount <?= $diskon['diskon'] ?>
								</h3>
								<p class="mb-0 text-truncate-line-2">Desc : <?= $diskon['deskripsi'] ?>
								</p>
							</div>
							<div class="bg mb-1 mr-2">
								<button class="btn btn-success btn-sm"><?= $diskon['kode_promo'] ?></button>
							</div>
						</div>
					</div>
				</div>
		<?php
			}
		} ?>
	</div>
</div>
<?php
if (!empty($orderan)) {
	foreach ($mobil as $sewa) {
		foreach ($pemilik as $kendaraan) {
			if ($kendaraan['id'] ==  $sewa['id_staff']) {
				$nama_ken = $sewa['nama_mobil'];
				$jenis = $sewa['jenis'];
				$gambar = $sewa['gambar'];
				$price = $sewa['harga'];
				$view_detail = $sewa['url_view'];
				$punya = $kendaraan['nama_lengkap'];
			}
		}
?>
		<div class="pt-lg-12 pb-lg-3 pt-8 pb-6">
			<div class="container">
				<div class="row mb-4">
					<div class="col">
						<h2 class="mb-0">Rent The Cars Again</h2>
					</div>
				</div>
				<div class="position-relative">
					<ul class="controls " id="sliderFirstControls">
						<li class="prev">
							<i class="fe fe-chevron-left"></i>
						</li>
						<li class="next">
							<i class="fe fe-chevron-right"></i>
						</li>
					</ul>
					<div class="sliderFirst">
						<div class="item">
							<!-- Card -->
							<div class="card mb-4 card-hover">
								<a class="card-img-top">
									<img src="assets/images/mobil/<?= $gambar ?>" alt="..." class="card-img-top rounded-top" style="height: 200px">
								</a> <!-- Card Body -->
								<div class="card-body p-3 pb-0">
									<h4 class="mb-2 text-truncate-line-2 "><a href="<?= base_url('cars/detail/' . $view_detail) ?>" class=" text-inherit"><?= $nama_ken ?></a></h4>
									<div class="">
										<div class="bg mb-2 mr-2">
											<span>
												<i class="fe fe-users mr-1"></i>
												<span class="font-size-xs text-muted mr-2"><?= $punya ?></span>
												<i class="fe fe-bar-chart mr-1"></i>
												<span class="font-size-xs text-muted mr-2"><?= $jenis ?></span><br />
											</span>
										</div>
										<div class="bg mb-3 mr-2">
											<h3 class="mb-0 text-truncate-line-2">Rp. <?= number_format($price, 0, ',', '.') ?><span class="font-size-xs text-muted">/ day</span>
											</h3>
										</div>
										<div class="bg mb-1 mr-2">
											<a href="<?= base_url('cars/detail/' . $view_detail) ?>" class="btn btn-success btn-sm">Rent again</a>
										</div>
									</div>
								</div>
							</div>
						</div>
				<?php
			}
		}
				?>
					</div>
				</div>
			</div>
		</div>
		<div class="pb-lg-3 pt-lg-3">
			<div class="container">
				<div class="row mb-4">
					<div class="col">
						<h2 class="mb-0">Recommendations for you</h2>
					</div>
				</div>
				<div class="position-relative">
					<ul class="controls " id="sliderSecondControls">
						<li class="prev">
							<i class="fe fe-chevron-left"></i>
						</li>
						<li class="next">
							<i class="fe fe-chevron-right"></i>
						</li>
					</ul>
					<div class="sliderSecond">
						<?php
						foreach ($mobil_rekomendasi as $sewa) {
							foreach ($pemilik as $kendaraan) {
								if ($kendaraan['id'] ==  $sewa['id_staff']) {
									$nama_ken = $sewa['nama_mobil'];
									$jenis = $sewa['jenis'];
									$gambar = $sewa['gambar'];
									$price = $sewa['harga'];
									$view_detail = $sewa['url_view'];
									$punya = $kendaraan['nama_lengkap'];
								}
							}
						?>
							<div class="item">
								<!-- Card -->
								<div class="card mb-4 card-hover">
									<a class="card-img-top">
										<img src="assets/images/mobil/<?= $gambar ?>" alt="..." class="card-img-top rounded-top" style="height: 200px">
									</a> <!-- Card Body -->
									<div class="card-body p-3 pb-0">
										<h4 class="mb-2 text-truncate-line-2 "><a href="<?= base_url('cars/detail/' . $view_detail) ?>" class="text-inherit"><?= $nama_ken ?></a></h4>
										<div class="">
											<div class="bg mb-2 mr-2">
												<span>
													<i class="fe fe-users mr-1"></i>
													<span class="font-size-xs text-muted mr-2"><?= $punya ?></span>
													<i class="fe fe-bar-chart mr-1"></i>
													<span class="font-size-xs text-muted mr-2"><?= $jenis ?></span><br />
												</span>
											</div>
											<div class="bg mb-3 mr-2">
												<h3 class="mb-0 text-truncate-line-2">Rp. <?= number_format($price, 0, ',', '.') ?><span class="font-size-xs text-muted">/ day</span>
												</h3>
											</div>
											<div class="bg mb-1 mr-2">
												<a href="<?= base_url('cars/detail/' . $view_detail) ?>" class="btn btn-success btn-sm">Rent Car</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php
						}
						?>
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
						<span>© 2020 Geeks. All Rights Reserved.</span>
					</div>
					<!-- Links -->
				</div>
			</div>
		</div>


		<!-- Scripts -->
		<!-- Libs JS -->
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
		<script src="//cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>


		<!-- Theme JS -->
		<script src="assets/js/theme.min.js"></script>


		</body>

		</html>
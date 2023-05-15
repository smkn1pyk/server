<?php
if(!$this->session->userdata('akun')){
	$this->session->sess_destroy();
	redirect('.','refresh');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title><?= $title ?> - SERVER</title>
	<link rel="icon" type="image/jpg" href="<?= base_url('assets/img/logo.jpg') ?>">
	<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/all.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/summernote.css') ?>">
	<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.css">
	<script src="<?= base_url('assets/js/htmx.js') ?>"></script>
	<style type="text/css">
		.bg-donker{
			background: #7db9e8; /* Old browsers */
			background: -moz-linear-gradient(top,  #7db9e8 0%, #2989d8 0%, #2989d8 33%, #207cca 44%, #1e5799 91%); /* FF3.6-15 */
			background: -webkit-linear-gradient(top,  #7db9e8 0%,#2989d8 0%,#2989d8 33%,#207cca 44%,#1e5799 91%); /* Chrome10-25,Safari5.1-6 */
			background: linear-gradient(to bottom,  #7db9e8 0%,#2989d8 0%,#2989d8 33%,#207cca 44%,#1e5799 91%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7db9e8', endColorstr='#1e5799',GradientType=0 ); /* IE6-9 */
		}
		.spinner{
			background-color: #333;
			opacity: 0-5;
		}

		.htmx-indicator{
			position: fixed;
			z-index: 1;
		}

		#spinner{
			margin-top: 10%;
			width: 10%;
		}

		.alert{
			position: fixed;
			top: 1em;
			right: 1em;
			z-index: 2000;
			max-width: 300px;
		}
	</style>
</head>
<body class="sb-nav-fixed">
	<?php
	if($this->session->userdata('peran_id_str')=='Peserta Didik'){
		?> <div class="alert-danger text-center p-5 mt-3"> Mohon maaf <b><i><?= $this->session->userdata('nama') ?></i></b>, anda tidak diizinkan mengakses halaman ini ! <br> <a href="<?= base_url('auth/logout') ?>" class="btn btn-dark"><i class="fas fa-sign-out"></i> Logout </a> </div> <?php
		exit();
	}
	?>
	<?php require('layout/top_nav.php'); ?>
	<div id="layoutSidenav">
		<?php require('layout/side_nav.php') ?>
		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid px-4">
					<h3 class="mt-4"><?= $title ?></h3>
					<hr>
					<div hx-get="<?= $dataget ?>" hx-target="#data" hx-trigger='load'>
						<div id="data"><div class="text-center"><img class="htmx-indicator" style="width: 100px;height: 100px;" src="<?= base_url('assets/img/') ?>spinner.gif"></div></div>
					</div>

				</div>
			</main>
			<footer class="py-4 bg-light mt-auto">
				<div class="container-fluid px-4">
					<div class="d-flex align-items-center justify-content-between small">
						<div class="text-muted">Copyright &copy; Your Website 2022</div>
						<div>
							<a href="#">Privacy Policy</a>
							&middot;
							<a href="#">Terms &amp; Conditions</a>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-donker text-light">
					<h5 class="modal-title" id="exampleModalLabel"><i class="fab fa-wpforms"></i> <?= $title ?></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="text-center">
						<img  id="spinner" class="htmx-indicator" src="<?= base_url('assets/img/spinner.gif') ?>" width="150px"/>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<script src="<?= base_url('assets/js/jquery.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.bundle.js') ?>"></script>
	<script src="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.js"></script>
	<script src="<?= base_url('assets/js/style.js') ?>"></script>
	<script src="<?= base_url('assets/js/summernote.js') ?>"></script>
	<script type="text/javascript">
		setInterval(function(){$('.alert').addClass('d-none')}, 5000);
	</script>
</body>
</html>

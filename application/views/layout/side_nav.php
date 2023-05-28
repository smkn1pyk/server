<div id="layoutSidenav_nav" class="border-right bg-light">
	<nav class="sb-sidenav accordion" id="sidenavAccordion">
		<div class="sb-sidenav-menu">
			<div class="nav">
				<div class="sb-sidenav-menu-heading">Core</div>
				<a class="nav-link" href="<?= base_url() ?>">
					<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
					Dashboard
				</a>
				<div class="sb-sidenav-menu-heading">Interface</div>
				<?php
				if($this->session->userdata('ptk_id')){
					?>
					<a class="nav-link" href="<?= base_url('webservice') ?>">
						<div class="sb-nav-link-icon"><i class="fas fa-sync-alt"></i></div>
						Singkronisasi Data
					</a>
					<?php
				}
				?>

				<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
					<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
					Data Ref Dapodik
					<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
				</a>
				<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
					<nav class="sb-sidenav-menu-nested nav">
						<?php
						if($this->session->userdata('ptk_id')){
							?>
							<a class="nav-link" href="<?= base_url('data_ref_dapodik/sekolah') ?>">Sekolah</a>
							<a class="nav-link" href="<?= base_url('data_ref_dapodik/gtk') ?>">GTK</a>
							<a class="nav-link" href="<?= base_url('data_ref_dapodik/pd') ?>">Peserta Didik</a>
							<a class="nav-link" href="<?= base_url('data_ref_dapodik/rombel') ?>">Rombongan Belajar</a>
							<a class="nav-link" href="<?= base_url('data_ref_dapodik/anggota_rombel') ?>">Anggota Rombel</a>
							<?php
						}
						?>
						<a class="nav-link" href="<?= base_url('data_ref_dapodik/pembelajaran') ?>">Pembelajaran</a>
						<?php
						if($this->session->userdata('ptk_id')){
							?>
							<a class="nav-link" href="<?= base_url('data_ref_dapodik/pengguna') ?>">Pengguna</a>
							<?php
						}
						?>
					</nav>
				</div>
				<?php
				if($this->session->userdata('ptk_id')){
					?>
					<!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#exam" aria-expanded="false" aria-controls="collapseLayouts">
						<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
						Exam
						<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
					</a>
					<div class="collapse" id="exam" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
						<nav class="sb-sidenav-menu-nested nav">
							<a class="nav-link" href="<?= base_url('exam/tes') ?>">Data Tes</a>
							<a class="nav-link" href="<?= base_url('exam/paket_soal') ?>">Paket Soal</a>
							<a class="nav-link" href="<?= base_url('exam/jadwal_tes') ?>">Jadwal Tes</a>
						</nav>
					</div> -->

					<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#kelulusan" aria-expanded="false" aria-controls="collapseLayouts">
						<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
						Kelulusan
						<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
					</a>
					<div class="collapse" id="kelulusan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
						<nav class="sb-sidenav-menu-nested nav">
							<a class="nav-link" href="<?= base_url('kelulusan') ?>">Informasi</a>
							<a class="nav-link" href="<?= base_url('kelulusan/data_lulusan') ?>">Data Lulusan</a>
						</nav>
					</div>
					<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#keuangan" aria-expanded="false" aria-controls="collapseLayouts">
						<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
						Keuangan Peserta Didik
						<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
					</a>
					<div class="collapse" id="keuangan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
						<nav class="sb-sidenav-menu-nested nav">
							<a class="nav-link" href="<?= base_url('keuangan/data_iuran') ?>">Jenis Iuran</a>
							<a class="nav-link" href="<?= base_url('keuangan/mapping') ?>">Mapping Iuran</a>
						</nav>
					</div>
					<?php
				}
				?>
			</div>
		</div>
		<div class="sb-sidenav-footer">
			<div class="small">Logged in as:</div>
			<?=  $this->session->userdata('akun')[0]['nama']; ?>
		</div>
	</nav>
</div>
<div class="card">
	<div class="card-header bg-donker">
		<button class="btn btn-light" disabled>
			<i class="fas fa-cogs"></i> <?= $this->session->userdata('semester_id'); ?>
		</button>
		<button class="btn btn-secondary" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/data_ref_dapodik/webservice') ?>" hx-target=".modal-body"><i class="fas fa-cloud-download"></i></button>
		<button class="btn btn-secondary" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/data_ref_dapodik/kirim_data') ?>" hx-target=".modal-body"><i class="fas fa-cloud-upload"></i></button>
	</div>
	<div class="card-body">
		<?php if($webservice){ ?>
			<table class="table table-sm">
				<tr>
					<td>Sekolah</td>
					<td><?= $sekolah['jml'] ?></td>
					<td>
						<button class="btn btn-primary" hx-post="<?= base_url('form/getdapodik/getSekolah') ?>" hx-target=".modal-body" data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-cloud-download-alt"></i></button>
					</td>
					<td>
						<button class="btn btn-primary" hx-post="<?= base_url('form/postdapodik/getSekolah') ?>" hx-target=".modal-body" data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-cloud-upload-alt"></i></button>
					</td>
				</tr>
				<tr>
					<td>PTK</td>
					<td><?= $gtk['jml'] ?></td>
					<td>
						<button class="btn btn-primary" hx-post="<?= base_url('form/getdapodik/getGtk') ?>" hx-target=".modal-body" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-indicator=""><i class="fas fa-cloud-download-alt"></i></button>
					</td>
					<td>
						<button class="btn btn-primary" hx-post="<?= base_url('form/postdapodik/getgtk') ?>" hx-target=".modal-body" data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-cloud-upload-alt"></i></button>
					</td>
				</tr>
				<tr>
					<td>Rwy Pendidikan</td>
					<td><?= $rwy_pend_formal['jml'] ?></td>
					<td></td>
					<td>
						<button class="btn btn-primary" hx-post="<?= base_url('form/postdapodik/rwy_pend_formal') ?>" hx-target=".modal-body" data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-cloud-upload-alt"></i></button>
					</td>
				</tr>
				<tr>
					<td>Rwy Kepangkatan</td>
					<td><?= $rwy_kepangkatan['jml'] ?></td>
					<td></td>
					<td>
						<button class="btn btn-primary" hx-post="<?= base_url('form/postdapodik/rwy_kepangkatan') ?>" hx-target=".modal-body" data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-cloud-upload-alt"></i></button>
					</td>
				</tr>
				<tr>
					<td>Peserta Didik</td>
					<td><?= $pd['jml'] ?></td>
					<td>
						<button class="btn btn-primary" hx-post="<?= base_url('form/getdapodik/getPesertaDidik') ?>" hx-target=".modal-body" data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-cloud-download-alt"></i></button>
						<td>
							<button class="btn btn-primary" hx-post="<?= base_url('form/postdapodik/getPesertaDidik') ?>" hx-target=".modal-body" data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-cloud-upload-alt"></i></button>
						</td>
					</td>
				</tr>
				<tr>
					<td>Rombongan Belajar</td>
					<td><?= $rombel['jml'] ?></td>
					<td>
						<button class="btn btn-primary" hx-post="<?= base_url('form/getdapodik/getRombonganBelajar') ?>" hx-target=".modal-body" data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-cloud-download-alt"></i></button>
					</td>
					<td>
						<button class="btn btn-primary" hx-post="<?= base_url('form/postdapodik/getRombonganBelajar') ?>" hx-target=".modal-body" data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-cloud-upload-alt"></i></button>
					</td>
				</tr>
				<tr>
					<td>Anggota Rombel</td>
					<td><?= $anggota_rombel['jml'] ?></td>
					<td></td>
					<td>
						<button class="btn btn-primary" hx-post="<?= base_url('form/postdapodik/anggota_rombel') ?>" hx-target=".modal-body" data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-cloud-upload-alt"></i></button>
					</td>
				</tr>
				<tr>
					<td>Pembelajaran</td>
					<td><?= $pembelajaran['jml'] ?></td>
					<td></td>
					<td>
						<button class="btn btn-primary" hx-post="<?= base_url('form/postdapodik/pembelajaran') ?>" hx-target=".modal-body" data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-cloud-upload-alt"></i></button>
					</td>
				</tr>
				<tr>
					<td>Pengguna</td>
					<td><?= $pengguna['jml'] ?></td>
					<td>
						<button class="btn btn-primary" hx-post="<?= base_url('form/getdapodik/getPengguna') ?>" hx-target=".modal-body" data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-cloud-download-alt"></i></button>
					</td>
					<td>
						<button class="btn btn-primary" hx-post="<?= base_url('form/postdapodik/getPengguna') ?>" hx-target=".modal-body" data-bs-target="#exampleModal" data-bs-toggle="modal"><i class="fas fa-cloud-upload-alt"></i></button>
					</td>
				</tr>
			</table>
		<?php }else{ ?>
			<div class="alert-danger p-5">Belum ada data koneksi ke webservice dapodik </div>
		<?php } ?>
	</div>
</div>
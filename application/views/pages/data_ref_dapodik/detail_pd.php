
<div class="card mb-3">
	<div class="card-header">
		<button class="btn btn-info" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/detail_pd/biodata/'.$id) ?>" hx-target=".modal-body"><i class="fas fa-user-graduate"></i> Biodata</button>
		<button class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/detail_pd/alamat/'.$id) ?>" hx-target=".modal-body"><i class="fas fa-map"></i> Alamat</button>
		<button class="btn btn-success" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/detail_pd/kesejahteraan/'.$id) ?>" hx-target=".modal-body"><i class="fas fa-user-shield"></i> Kesejahteraan</button>
		<button class="btn btn-dark" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/detail_pd/registrasi/'.$id) ?>" hx-target=".modal-body"><i class="fas fa-user-plus"></i> Registrasi</button>
		<button class="btn btn-secondary" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/detail_pd/orang_tua/'.$id) ?>" hx-target=".modal-body"><i class="fas fa-users"></i> Orang Tua</button>
	</div>
	<div class="card-body">
		<?php
		if($detail_pd){
			?>
			<!-- <div class="card">
				<div class="card-header"><h3>Biodata Siswa</h3></div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped">
							<tr>
								<td>Nama</td>
								<td><?= $detail_pd['nama'] ?></td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td><?= $detail_pd['jenis_kelamin'] ?></td>
							</tr>
							<tr>
								<td>NISN</td>
								<td><?= $detail_pd['nisn'] ?></td>
							</tr>
							<tr>
								<td>Tempat/Tanggal Lahir</td>
								<td><?= $detail_pd['tempat_lahir'] ?>/<?= date('d-m-Y', strtotime($detail_pd['tanggal_lahir'])) ?></td>
							</tr>
							<tr>
								<td>Tingkat Pendidikan</td>
								<td><?= $detail_pd['tingkat_pendidikan_id'] ?></td>
							</tr>
							<tr>
								<td>Kurikulum</td>
								<td><?= $detail_pd['kurikulum_id'].'/'.$detail_pd['kurikulum_id_str'] ?></td>
							</tr>
							<tr>
								<td>Rombel</td>
								<td><?= $detail_pd['nama_rombel'] ?></td>
							</tr>
							<tr>
								<td>Telepon</td>
								<td><?= $detail_pd['telepon'] ?></td>
							</tr>
							<tr>
								<td>HP</td>
								<td><?= $detail_pd['hp'] ?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><?= $detail_pd['email'] ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div> -->
			<?php
			echo "<pre>";
			print_r ($keuangan_rombel);
			echo "</pre>";
		}else{
			?> <div class="alert-danger p-3"> Terjadi kesalahan sistem, data tidak ditemukan </div> <?php
		}
		?>
	</div>
</div>
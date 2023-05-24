
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
			<div class="card">
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
								<td>NIK</td>
								<td><?= $detail_pd['nik'] ?></td>
							</tr>
							<tr>
								<td>NO KK</td>
								<td><?= $detail_pd['no_kk'] ?></td>
							</tr>
							<tr>
								<td>Tempat/Tanggal Lahir</td>
								<td><?= $detail_pd['tempat_lahir'] ?>/<?= date('d-m-Y', strtotime($detail_pd['tanggal_lahir'])) ?></td>
							</tr>
							<tr>
								<td>No Registrasi Akta Lahir</td>
								<td><?= $detail_pd['No_Registrasi_Akta_Lahir'] ?></td>
							</tr>
							<tr>
								<td>Kebutuhan Khusus</td>
								<td><?= $detail_pd['Kebutuhan_Khusus'] ?></td>
							</tr>
							<tr>
								<td>Agama</td>
								<td><?= $detail_pd['agama_id_str'] ?></td>
							</tr>
							<tr>
								<td>Tinggi Badan</td>
								<td><?= $detail_pd['tinggi_badan'] ?></td>
							</tr>
							<tr>
								<td>Berat Badan</td>
								<td><?= $detail_pd['berat_badan'] ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<?php
		}else{
			?> <div class="alert-danger p-3"> Terjadi kesalahan sistem, data tidak ditemukan </div> <?php
		}
		?>
	</div>
</div>
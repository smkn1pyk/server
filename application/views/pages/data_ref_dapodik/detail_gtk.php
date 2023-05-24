<div class="card">
	<div class="card-header">
		<button class="btn btn-info" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/detail_gtk/biodata/'.$id) ?>" hx-target=".modal-body"><i class="fas fa-user-graduate"></i> Biodata</button>
		<button class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/detail_gtk/anggota_keluarga/'.$id) ?>" hx-target=".modal-body"><i class="fas fa-users"></i> Anggota Keluarga</button>
		<button class="btn btn-success" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/detail_gtk/alamat/'.$id) ?>" hx-target=".modal-body"><i class="fas fa-map"></i> Alamat</button>
		<button class="btn btn-warning" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/detail_gtk/kepegawaian/'.$id) ?>" hx-target=".modal-body"><i class="fas fa-user-graduate"></i> Kepegawaian</button>
		<button class="btn btn-dark" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/detail_gtk/rwy_pend_formal/'.$id) ?>" hx-target=".modal-body"><i class="fas fa-user-graduate"></i> Rwy Pendidikan</button>
		<button class="btn btn-secondary" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/detail_gtk/rwy_kepangkatan/'.$id) ?>" hx-target=".modal-body"><i class="fas fa-user-graduate"></i> Rwy Kepangkatan</button>
		
	</div>
	<div class="card-body">
		<?php
		if($detail_gtk){
			?>
			<div class="table-responsive">
				<table class="table table-striped">
					<tr>
						<td>Nama</td>
						<td><?= $detail_gtk['nama'] ?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td><?= $detail_gtk['jenis_kelamin'] ?></td>
					</tr>
					<tr>
						<td>NIK</td>
						<td><?= $detail_gtk['nik'] ?></td>
					</tr>
					<tr>
						<td>NIP</td>
						<td><?= $detail_gtk['nip'] ?></td>
					</tr>
				</table>
			</div>
			<?php
		}else{
			?> <div class="alert-danger p-3">Terjadi kesalahan sistem, data tidak ditemukan! </div> <?php
		}
		?>
	</div>
</div>
<?php
exit();
if($detail_gtk){
	?>
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header">Biodata</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table table-striped">
							<?php foreach ($detail_gtk as $key => $value): ?>
								<?php
								if($key!=='id'&&$key!='ptk_id'&&$key!='ptk_terdaftar_id'&&$key!='tahun_ajaran_id'&&$key!='status'){
									?>
									<tr>
										<td><?= ucwords(str_replace(['_str', '_id', '_'], ' ', $key)) ?></td>
										<td><?= $value ?></td>
									</tr>
									<?php
								}
								?>
							<?php endforeach ?>
						</table>
					</div>
				</div>
			</div>
		</div>
		<?php
		if($rwy_pend_formal){
			?>
			<div class="col">
				<div class="card">
					<div class="card-header">Riwayat Pendidikan</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Satuan Pendidikan</th>
										<th>Bidang Studi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($rwy_pend_formal as $key => $value): $key++; ?>
										<tr>
											<td><?= $key ?></td>
											<td><?= $value->satuan_pendidikan_formal ?></td>
											<td><?= $value->bidang_studi_id_str ?></td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>

		<?php
		if($rwy_kepangkatan){
			?>
			<div class="col">
				<div class="card">
					<div class="card-header">Riwayat Kepangkatan</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Pangkat/Golongan</th>
										<th>Nomor SK</th>
										<th>TMT</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($rwy_kepangkatan as $key => $value): $key++; ?>
										<tr>
											<td><?= $key ?></td>
											<td><?= $value->pangkat_golongan_id_str ?></td>
											<td><?= $value->nomor_sk ?></td>
											<td><?= $value->tmt_pangkat ?></td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	<?php
}else{
	?> <div class="alert-danger p-3"> Tidak ditemukan data GTK </div> <?php
}
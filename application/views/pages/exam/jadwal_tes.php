<div class="card">
	<div class="card-header">
		<button class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/exam/tambah_jadwal_tes') ?>" hx-target=".modal-body"><i class="fas fa-plus"></i> Tambah Data</button>
	</div>
	<div class="card-body">
		<?php
		if($jadwal_tes){
			?>
			<div class="table-responsive">
				<table class="table table-sm table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Waktu Mulai</th>
							<th>Waktu Selesai</th>
							<th>Jenis Tes</th>
							<th>Tingkat Pendidikan</th>
							<th>Nama Matpel</th>
							<th>Nama GTK</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($jadwal_tes as $key => $value): $key++ ?>
							<?php
							$detailTes = $this->db->get_where('data_tes', ['uniq'=>$value->uniq_tes,'semester_id'=>$value->semester_id])->row_array();
							$detailPembelajaran = $this->db->get_where('getpembelajaran', ['mata_pelajaran_id'=>$value->mata_pelajaran_id, 'ptk_terdaftar_id'=>$value->ptk_terdaftar_id, 'semester_id'=>$value->semester_id])->row_array();
							?>
							<tr>
								<td><?= $key ?></td>
								<td><?= date('d-m-Y H:i:s', strtotime($value->waktu_mulai)) ?></td>
								<td><?= date('d-m-Y H:i:s', strtotime($value->waktu_selesai)) ?></td>
								<td><?= $detailTes['nama'] ?></td>
								<td><?= $value->tingkat_pendidikan_id ?></td>
								<td><?= $detailPembelajaran['mata_pelajaran_id_str'] ?></td>
								<td><?= $detailPembelajaran['nama_gtk'] ?></td>
								<td class="text-center">
									<button class="btn btn-sm btn-success" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/exam/edit_jadwal_tes/'.$value->uniq) ?>" hx-target=".modal-body"><i class="fas fa-edit"></i></button>
									<button class="btn btn-sm btn-danger" hx-post="<?= base_url('exam/data_jadwal_tes/hapus/'.$value->uniq) ?>" hx-target="#data" hx-confirm="Yakin ?"><i class="fas fa-trash"></i></button>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
			<?php
		}else{
			?> <div class="alert-danger p-5">Belum ada data untuk ditampilkan</div> <?php
		}
		?>
	</div>
</div>
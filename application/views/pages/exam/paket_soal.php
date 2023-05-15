<div class="card">
	<div class="card-header">
		<button class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-target=".modal-body" hx-post="<?= base_url('form/get/exam/tambah_paket_soal') ?>" title="Tambah Paket Soal"><i class="fas fa-plus"></i></button>
	</div>
	<div class="card-body">
		<?php if($paket_soal){ ?>
			<div class="table-responsive">
				<table class="table table-sm">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Tes</th>
							<th>Nama Matpel</th>
							<th>Tingkat Pendidikan</th>
							<th>Jumlah Soal</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($paket_soal as $key => $value): $key++ ?>
							<?php
							$cekTes = $this->db->get_where('data_tes', ['uniq'=>$value->uniq_tes])->row_array();
							$cekMatpel = $this->db->get_where('pembelajaran', ['mata_pelajaran_id'=>$value->mata_pelajaran_id])->row_array();
							$jmlSoal = $this->db->query("SELECT count(uniq) as jml from list_soal where uniq_paket='$value->uniq'")->row_array();
							?>
							<tr>
								<td><?= $key ?></td>
								<td><?= $cekTes['nama'] ?></td>
								<td><?= $cekMatpel['mata_pelajaran_id_str'] ?></td>
								<td><?= $value->tingkat_pendidikan_id ?></td>
								<td><?= $jmlSoal['jml'] ?></td>
								<td><?= $value->status ?></td>
								<td>
									<a href="<?= base_url('exam/list_soal/'.$value->uniq) ?>" class="btn btn-primary btn-sm" title="List Soal"><i class="fas fa-list"></i></a>
									<button class="btn btn-success btn-sm" hx-post="<?= base_url('form/get/exam/edit_paket_soal/'.$value->uniq) ?>" hx-target=".modal-body" data-bs-target="#exampleModal" data-bs-toggle="modal" title="Edit"><i class="fas fa-edit"></i></button>
									<button class="btn btn-sm btn-danger" hx-post="<?= base_url('exam/data_paket_soal/hapus/'.$value->uniq) ?>" hx-target='#data' hx-confirm="Yakin ?" title="Hapus"><i class="fas fa-trash"></i></button>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		<?php }else{ ?>
			<div class="alert-danger p-5">Belum ada data untuk ditampilkan</div>
		<?php } ?>
	</div>
</div>
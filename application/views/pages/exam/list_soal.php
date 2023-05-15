<div class="card">
	<div class="card-header">
		<button class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/exam/tambah_soal/'.$dataID) ?>" hx-target=".modal-body" title="Tambah Soal"><i class="fas fa-plus"></i></button>
		<button class="btn btn-success" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/exam/edit_paket_soal/'.$dataID) ?>" hx-target=".modal-body"><i class="fas fa-edit"></i></button>
		<button class="btn btn-info" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/exam/tambah_jadwal_tes/'.$dataID) ?>" hx-target=".modal-body" title="Jadwal"><i class="fas fa-calendar-alt"></i></button>
		<a href="<?= base_url('exam/paket_soal') ?>" class="btn btn-secondary" title="Kembali"><i class="fas fa-arrow-circle-left"></i></a>
		
	</div>
	<div class="card-body">
		<?php
		if($list_soal){
			?>
			<?php foreach ($list_soal as $key => $value): ?>
				<div class="card mb-3">
					<div class="card-header">
						<button class="btn btn-success btn-sm" data-bs-target="#exampleModal" data-bs-toggle='modal' hx-post="<?= base_url('form/get/exam/edit_soal/'.$dataID.'/'.$value->uniq.'/'.$value->jenis_soal) ?>" hx-target=".modal-body"><i class="fas fa-edit"></i></button>
						<button class="btn btn-sm btn-danger" hx-post="<?= base_url('exam/data_list_soal/'.$dataID.'/hapus/'.$value->uniq) ?>" hx-target="#data" hx-confirm="Yakin ?"><i class="fas fa-trash"></i></button>
						<?php
						if($value->jenis_soal=='1'){
							?>
							<button class="btn btn-primary btn-sm" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/exam/tambah_objektif/'.$dataID.'/'.$value->uniq) ?>" hx-target=".modal-body"><i class="fas fa-list-alt"></i></button>
							<button class="btn btn-info btn-sm" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/exam/tambah_kunci_objektif/'.$dataID.'/'.$value->uniq) ?>" hx-target=".modal-body"><i class="fas fa-key"></i></button>
							<?php
						}
						?>
					</div>
					<div class="card-body">
						<div class="pertanyaan">
							<?= htmlspecialchars_decode($value->pertanyaan) ?>
						</div>
						<?php
						if($value->jenis_soal=='1'){
							$this->db->order_by('id', 'desc');
							$cekObjektif = $this->db->get_where('objektif_soal', ['uniq_list'=>$value->uniq])->result();
							$cekKunci = $this->db->get_where('kunci_objektif', ['list_soal'=>$value->uniq])->row_array();
							if($cekObjektif){
								?>
								<div class="objektif" style="clear: both;">
									<table class="table table-sm">
										<?php foreach ($cekObjektif as $key1 => $value1): $key1++ ?>
											<tr>
												<td class="align-middle"><?= $key1 ?></td>
												<td class="align-middle"><?= htmlspecialchars_decode($value1->objektif) ?></td>
												<td class="text-center">
													<button class="btn btn-sm btn-success" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/exam/edit_objektif/'.$dataID.'/'.$value1->uniq) ?>" hx-target=".modal-body"><i class="fas fa-edit"></i></button>
													<button class="btn btn-danger btn-sm" hx-post="<?= base_url('exam/data_list_soal/'.$dataID.'/hapus_objektif/'.$value1->uniq) ?>" hx-confirm="Yakin ?"><i class="fas fa-trash"></i></button>
												</td>
											</tr>
										<?php endforeach ?>
									</table>
								</div>
								<div class="kunci_objektif">
									<?php
									if($cekKunci){
										$detailKunci = $this->db->get_where('objektif_soal', ['uniq_paket'=>$cekKunci['uniq_paket'],'uniq_list'=>$cekKunci['list_soal'],'uniq'=>$cekKunci['kunci_jawaban']])->row_array();
										?>
										<div class="d-inline-flex"><i class="fas fa-key"></i> <?= htmlspecialchars_decode($detailKunci['objektif']) ?></div>
										<?php
									}else{
										?> <div class="alert-danger p-3"> 0 Results </div> <?php
									}
									?>
								</div>
								<?php
							}
						}
						?>
					</div>
				</div>
			<?php endforeach ?>
			<?php
		}else{
			?> <div class="alert-danger p-5">Belum ada data soal untuk ditampilkan</div> <?php
		}
		?>
	</div>
</div>
<div class="card">
	<div class="card-header">
		<button class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/exam/tambah_data_tes') ?>" hx-target=".modal-body"><i class="fas fa-plus"></i></button>
	</div>
	<div class="card-body">
		<?php
		if($data_tes){
			?>
			<table class="table table-sm table-bordered table-striped">
				<tbody>
					<?php foreach ($data_tes as $key => $value): $key++ ?>
						<tr>
							<td><?= $key ?></td>
							<td><?= $value->nama ?></td>
							<td><?= $value->semester_id ?></td>
							<td class="text-center">
								<?php
								if($this->session->userdata('ptk_terdaftar_id')==$value->ptk_terdaftar_id){
									?>
									<button class="btn btn-success btn-sm" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/exam/edit_data_tes/'.$value->uniq) ?>" hx-target=".modal-body"><i class="fas fa-edit"></i></button>
									<button class="btn btn-danger btn-sm" hx-post="<?= base_url('exam/data_tes/hapus/'.$value->uniq) ?>" hx-target="#data" hx-confirm="Yakin ?"><i class="fas fa-trash"></i></button>
									<?php
								}
								?>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<?php
		}else{
			?> <div class="alert-danger p-5">Belum ada data untuk ditampilkan</div> <?php
		}
		?>
	</div>
</div>
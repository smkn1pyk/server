<div class="card">
	<div class="card-header">
		<button class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-target=".modal-body" hx-post="<?= base_url('form/get/keuangan/tambah_mapping') ?>"><i class="fas fa-plus"></i></button>
	</div>
	<div class="card-body">
		<?php
		if($mapping){
			?>
			<div class="table-responsive">
				<table class="table table-striped">
					<tbody>
						<?php foreach ($mapping as $key => $value): $key++; ?>
							<tr>
								<td><?= $key ?></td>
								<td><?= $value->tingkat_pendidikan_id ?></td>
								<td><?= $value->nama_rombel ?></td>
								<td><?= $value->nama_iuran ?></td>
								<td><?= number_format($value->nominal, 0, ',', '.') ?></td>
								<td>
									<button class="btn btn-success btn-sm" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-target=".modal-body" hx-post="<?= base_url('form/get/keuangan/edit_mapping/'.$value->uniq) ?>"><i class="fas fa-edit"></i></button>
									<button class="btn btn-danger btn-sm" hx-target="#data" hx-confirm="Yakin ?" hx-post="<?= base_url('keuangan/data_mapping/hapus/'.$value->uniq) ?>"><i class="fas fa-trash"></i></button>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
			<?php
		}else{
			?> <div class="alert-danger p-3"> 0 Results </div> <?php
		}
		?>
	</div>
</div>
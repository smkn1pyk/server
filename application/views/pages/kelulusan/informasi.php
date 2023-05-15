<div class="card">
	<div class="card-header">
		<button class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/kelulusan/tambah_data_informasi') ?>" hx-target=".modal-body"><i class="fas fa-plus"></i></button>
	</div>
	<div class="card-body">
		<?php
		if($informasi){
			?>
			<div class="table-responsive">
				<table class="table table-striped">
					<tbody>
						<?php foreach ($informasi as $key => $value): $key++; ?>
							<tr>
								<td><?= $key ?></td>
								<td><?= $value->judul ?></td>
								<td><?= htmlspecialchars_decode($value->isi) ?></td>
								<td>
									<button class="btn btn-success btn-sm" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/kelulusan/edit_data_informasi/'.$value->uniq) ?>" hx-target=".modal-body"><i class="fas fa-edit"></i></button>
									<button class="btn btn-danger btn-sm" hx-post="<?= base_url('kelulusan/data_informasi/hapus/'.$value->uniq) ?>" hx-target="#data" hx-confirm="Yakin ?"><i class="fas fa-trash"></i></button>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
			<?php
		}else{
			?> <div class="p-3 alert-danger"> 0 Results </div> <?php
		}
		?>
	</div>
</div>
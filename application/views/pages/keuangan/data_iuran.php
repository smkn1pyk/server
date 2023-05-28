<div class="card">
	<div class="card-header">
		<button class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/keuangan/tambah_data_iuran') ?>" hx-target=".modal-body"><i class="fas fa-plus"></i> Tambah Data</button>
	</div>
	<div class="card-body">
		<?php
		if($data_iuran){
			?>
			<div class="table-responsive">
				<table class="table table-striped">
					<tbody>
						<?php foreach ($data_iuran as $key => $value): $key++ ?>
							<tr>
								<td><?= $key ?></td>
								<td><?= $value->nama ?></td>
								<td>Rp. <?= number_format($value->nominal, 0, ',', '.') ?></td>
								<td>
									<button class="btn btn-success btn-sm" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-target=".modal-body" hx-post="<?= base_url('form/get/keuangan/edit_data_iuran/'.$value->uniq) ?>"><i class="fas fa-edit"></i></button>
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
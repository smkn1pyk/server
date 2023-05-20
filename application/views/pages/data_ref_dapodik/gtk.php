<div class="card">
	<div class="card-header">
		<?php
		if($jenis_ptk){
			?>
			<div class="form-floating">
				<select class="form-select" name="jenis_ptk" hx-get="<?= base_url('data_ref_dapodik/data_gtk') ?>" hx-target="#data">
					<option value="">...</option>
					<?php foreach ($jenis_ptk as $key => $value): ?>
						<?php
						if($this->input->get('jenis_ptk')){
							if($value->jenis_ptk_id==$this->input->get('jenis_ptk')){
								?> <option value="<?= $value->jenis_ptk_id ?>" selected><?= $value->jenis_ptk_id_str ?></option> <?php
							}else{
								?> <option value="<?= $value->jenis_ptk_id ?>"><?= $value->jenis_ptk_id_str ?></option> <?php
							}
						}else{
							?> <option value="<?= $value->jenis_ptk_id ?>"><?= $value->jenis_ptk_id_str ?></option> <?php
						}
						?>
					<?php endforeach ?>
				</select>
				<label>Jenis Ptk</label>
			</div>
			<?php
		}
		?>
	</div>
	<div class="card-body">
		<?php if($gtk){ ?>
			Jumlah: <?= count($gtk) ?> Data
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>NIP</th>
							<th>Jenis PTK</th>
							<th>Detail</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($gtk as $key => $value): $key++ ?>
							<tr>
								<td><?= $key ?></td>
								<td><a href="<?= base_url('data_ref_dapodik/detail_gtk/'.$value->ptk_id) ?>"><?= $value->nama ?></a></td>
								<td><?= $value->nip ?></td>
								<td><?= $value->jenis_ptk_id_str ?></td>
								<td class="text-center">
									<button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" hx-post="<?= base_url('form/get/rinci/rwy_pend_formal/'.$value->ptk_id) ?>" hx-target=".modal-body"><i class="fas fa-book"></i></button>
									<button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" hx-post="<?= base_url('form/get/rinci/rwy_kepangkatan/'.$value->ptk_id) ?>" hx-target=".modal-body"><i class="fab fa-black-tie"></i></button>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		<?php }else{ ?>
			<div class="alert-danger p-5"> 0 Results </div>
		<?php } ?>
	</div>
</div>
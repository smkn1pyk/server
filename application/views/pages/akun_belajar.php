<div class="card">
	<div class="card-header">
		<div class="form-inline">
			<?php
			if($rombel){
				?>
				<div class="form-floating mr-2">
					<select class="form-select" name="rombel" hx-get="<?= base_url('akun_belajar/data_akun_belajar') ?>" hx-target="#data">
						<?php foreach ($rombel as $key => $value): ?>
							<?php
							if($this->input->get('rombel')){
								if($value->rombongan_belajar_id==$this->input->get('rombel')){
									?> <option value="<?= $value->rombongan_belajar_id ?>" selected><?= $value->nama ?></option> <?php
								}else{
									?> <option value="<?= $value->rombongan_belajar_id ?>"><?= $value->nama ?></option> <?php
								}
							}else{
								?> <option value="<?= $value->rombongan_belajar_id ?>"><?= $value->nama ?></option> <?php
							}
							?>
						<?php endforeach ?>
					</select>
					<label>Rombel</label>
				</div>
				<?php
			}
			?>
			<button class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/akun_belajar/import') ?>" hx-target=".modal-body"><i class="fas fa-file-excel"></i></button>
		</div>
	</div>
	<div class="card-body">
		<?php
		if($akun_belajar){
			header('Content-Type: application/vnd.ms.excel');
			header('Content-Disposition: attachment;filename="'.$id.'.xlsx"');
			?>
			Jumlah <?= count($akun_belajar) ?> data
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Username</th>
							<th>Password</th>
							<th>Rombel</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($akun_belajar as $key => $value): $key++; ?>
							<tr>
								<td><?= $key ?></td>
								<td><?= $value->nama ?></td>
								<td><?= $value->email ?></td>
								<td><?= $value->password ?></td>
								<td><?= $value->nama_rombel ?></td>
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
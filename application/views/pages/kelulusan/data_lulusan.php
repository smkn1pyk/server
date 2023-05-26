<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col">
				<div class="form-inline">
					<div class="form-floating">
						<select name="rombel" class="form-select" hx-get="<?= base_url('kelulusan/lulusan_data') ?>" hx-target="#data">
							<option value="">...</option>
							<?php foreach ($rombel as $key => $value): ?>
								<?php
								if($this->input->get('rombel')){
									if($value->rombongan_belajar_id==$this->input->get('rombel')){
										?> <option value="<?= $value->rombongan_belajar_id ?>" selected><?=$value->nama ?></option> <?php
									}else{
										?> <option value="<?= $value->rombongan_belajar_id ?>"><?=$value->nama ?></option> <?php
									}
								}else{
									?> <option value="<?= $value->rombongan_belajar_id ?>"><?=$value->nama ?></option> <?php
								}
								?>
							<?php endforeach ?>
						</select>
						<label>Rombel</label>
					</div>
				</div>
			</div>
			<div class="col text-end">
				<button class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/kelulusan/pengaturan') ?>" hx-target=".modal-body"><i class="fas fa-cogs"></i></button>
				<button class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/kelulusan/tambah_lulusan') ?>" hx-target=".modal-body"><i class="fas fa-plus"></i></button>
			</div>
		</div>
	</div>
	<div class="card-body">
		<?php
		if($pengaturan){
			if($data_lulusan){
				?>
				<div>Jumlah: <?= count($data_lulusan) ?> Data</div>
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>NISN</th>
								<th>Nama Rombel</th>
								<th>Status Lulu</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data_lulusan as $key => $value): $key++; ?>
								<tr>
									<td><?= $key ?></td>
									<td><?= $value->nama ?></td>
									<td><?= $value->nisn ?></td>
									<td><?= $value->nama_rombel ?></td>
									<td>
										<?php
										if($value->status==1){
											echo "Lulus";
										}else{
											echo "Tidak Lulus";
										}
										?>
									</td>
									<td>
										<a class="btn btn-sm btn-dark" target="_blank" href="<?= base_url('kelulusan/print/'.$value->peserta_didik_id) ?>" hx-confirm="Yakin ?"><i class="fas fa-print"></i></a>
										<button class="btn btn-sm btn-success" data-bs-target="#exampleModal" data-bs-toggle="modal" hx-post="<?= base_url('form/get/kelulusan/edit_lulusan_data/'.$value->uniq) ?>" hx-target=".modal-body"><i class="fas fa-edit"></i></button>
										<button class="btn btn-sm btn-danger" hx-post="<?= base_url('kelulusan/lulusan_data/hapus/'.$value->uniq) ?>" hx-target="#data" hx-confirm="Yakin ?"><i class="fas fa-trash"></i></button>
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
		}else{
			?> <div class="alert-danger p-3"> Belum ada data pengaturan </div> <?php
		}
		?>
	</div>
</div>
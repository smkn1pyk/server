<div class="card">
	<div class="card-header">
		<div class="form-inline">
			<div class="form-floating">
				<select class="form-select" name="rombel" hx-get="<?= base_url('data_ref_dapodik/data_pd') ?>" hx-target="#data">
					<option value="">...</option>
					<?php foreach ($rombel as $key => $value): ?>
						<?php
						if($this->input->get('rombel')){
							if($value->rombongan_belajar_id==$this->input->get('rombel')){
								?> <option value="<?= $value->rombongan_belajar_id ?>" selected><?= $value->nama ?></option> <?php
							}else{
								?><option value="<?= $value->rombongan_belajar_id ?>"><?= $value->nama ?></option><?php
							}
						}else{
							?> <option value="<?= $value->rombongan_belajar_id ?>"><?= $value->nama ?></option> <?php
						}
						?>
					<?php endforeach ?>
				</select>
				<label>Rombel</label>
			</div>
		</div>
	</div>
	<div class="card-body">
		<?php if($pd){ ?>
			Jumlah: <?= count($pd) ?> Data
			<table class="table table-striped table-bordered table-sm">
				<thead>
					<tr>
						<th>No</th>
						<th>NISN</th>
						<th>Nama</th>
						<th>NIK</th>
						<th>Tanggal Lahir</th>
						<th>Rombel</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($pd as $key => $value): $key++ ?>
						<tr>
							<td><?= $key ?></td>
							<td><a href="<?= base_url('data_ref_dapodik/detail_pd/'.$value->peserta_didik_id) ?>"><?= $value->nisn ?></a></td>
							<td><a href="<?= base_url('data_ref_dapodik/detail_pd/'.$value->peserta_didik_id) ?>"><?= $value->nama ?></a></td>
							<td><?= $value->nik ?></td>
							<td><?= $value->tanggal_lahir ?></td>
							<td><?= $value->nama_rombel ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		<?php }else{ ?>
			<div class="alert-danger p-5"> 0 Results </div>
		<?php } ?>
	</div>
</div>
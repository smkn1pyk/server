<div class="card">
	<div class="card-header">
		<div class="form-inline">
			<?php
			if($jenis_rombel){
				?> <div class="form-floating"> <?php
				?> <select class="form-select" name="jenis_rombel" id="jenis_rombel" hx-get="<?= base_url('data_ref_dapodik/data_rombel') ?>" hx-target="#data"> <?php
				foreach ($jenis_rombel as $key => $value) {
					if($this->input->get('jenis_rombel')){
						if($value->jenis_rombel==$this->input->get('jenis_rombel')){
							?> <option value="<?= $value->jenis_rombel ?>" selected><?= $value->jenis_rombel_str ?></option> <?php
						}else{
							?> <option value="<?= $value->jenis_rombel ?>"><?= $value->jenis_rombel_str ?></option> <?php
						}
					}else{
						?> <option value="<?= $value->jenis_rombel ?>"><?= $value->jenis_rombel_str ?></option> <?php
					}
				}
				?> </select> <?php
				?> <label>Jenis Rombel</label> <?php
				?> </div> <?php
			}
			?>
		</div>
	</div>
	<div class="card-body">
		<?php if($rombel){ ?>
			<table class="table table-striped table-bordered table-sm">
				<thead>
					<tr>
						<th>No</th>
						<th>Tingkat Pendidikan</th>
						<th>Kurikulum</th>
						<th>Jenis Rombel</th>
						<th>Nama Rombel</th>
						<th>Ruang</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($rombel as $key => $value): $key++ ?>
						<tr>
							<td><?= $key ?></td>
							<td><?= $value->tingkat_pendidikan_id ?></td>
							<td><?= $value->kurikulum_id_str ?></td>
							<td><?= $value->jenis_rombel_str ?></td>
							<td><?= $value->nama ?></td>
							<td><?= $value->id_ruang_str ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		<?php }else{ ?>
			<div class="alert-danger p-5"> 0 Results </div>
		<?php } ?>
	</div>
</div>
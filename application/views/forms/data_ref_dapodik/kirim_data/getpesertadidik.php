<?php
if($id){
	if($results){
		?>
		<div class="card">
			<div class="card-header">Jumlah Data: <?= count($results) ?></div>
			<div class="card-body">
				<div class="text-center">
					<img  id="spinner" class="htmx-indicator" src="<?= base_url('assets/img/spinner.gif') ?>" width="150px"/>
				</div>
				<form hx-post="<?= base_url('form/kirim_data/'.$id) ?>" hx-target="#results" class="mb-3" hx-indicator="#spinner">
					<div class="table-responsive" style="max-height: 200px;overflow: auto;">
						<table class="table table-sm">
							<thead class="sticky-top bg-light">
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>NISN</th>
									<th>Rombel</th>
								</tr>
							</thead>
							<?php foreach ($results as $key => $value): $key++; ?>
								<?php
								$encrypt = base64_encode(json_encode($value));
								?>
								<tr>
									<td><?= $key ?></td>
									<td>
										<div class="form-check">
											<input type="checkbox" class="form-check-input" name="kirim_data[]" value="<?= $encrypt ?>" id="<?= $value->peserta_didik_id ?>">
											<label class="form-check-label" for="<?= $value->peserta_didik_id ?>"><?= $value->nama ?></label>
										</div>
									</td>
									<td><?= $value->nisn ?></td>
									<td><?= $value->nama_rombel ?></td>
								</tr>
							<?php endforeach ?>
						</table>
					</div>
					<div class="d-block mt-3">
						<button class="btn btn-primary"><i class="fas fa-cloud-upload"></i> Kirim</button>
					</div>
				</form>
				<div id="results"></div>
			</div>
		</div>
		<?php
	}else{
		?> <div class="alert-danger p-3"> 0 Results </div> <?php
	}
}else{
	?> <div class="alert-danger p-3"> Terjadi kesalahan sistem </div> <?php
}
?>
<script type="text/javascript">
	$("#checkAll").click(function(){
		$('input:checkbox').not(this).prop('checked', this.checked);
	});
</script>
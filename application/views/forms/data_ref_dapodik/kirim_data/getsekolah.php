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
					<div class="mb-3">
						<?php foreach ($results as $key => $value): ?>
							<?php
							$encrypt = base64_encode(json_encode($value));
							// $encrypt = $this->kripto->enkripsi(json_encode($value), 'admin123');
							?>
							<div class="form-check">
								<input type="checkbox" class="form-check-input" name="kirim_data[]" value="<?= $encrypt ?>" id="<?= $value->sekolah_id ?>">
								<label class="form-check-label" for="<?= $value->sekolah_id ?>"><?= $value->nama ?></label>
							</div>
						<?php endforeach ?>
					</div>
					<div class="d-block">
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
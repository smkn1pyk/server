<?php
$CI =& get_instance();
$CI->load->model('m_lib_data');
$tingkat = $CI->m_lib_data->data_tingkat();
if($tingkat){
	$data_tes = $CI->m_lib_data->data_tes();
	if($data_tes){
		?>
		<form hx-post="<?= base_url('exam/paket_soal/tambah') ?>" hx-target="#data">
			<div class="form-floating mb-3">
				<select name="tingkat_pendidikan_id" class="form-select" hx-post="<?= base_url('lib_data/pembelajaran') ?>" hx-target="#pembelajaran" id="tingkat">
					<option value="">.....</option>
					<?php foreach ($tingkat as $key => $value): ?>
						<option><?= $value->tingkat_pendidikan_id ?></option>
					<?php endforeach ?>
				</select>
				<label>Tingkat Pendidikan</label>
			</div>

			<!-- <div class="form-floating mb-3">
				<select name="rombel" id="rombel" class="form-select" hx-post="<?= base_url('lib_data/pembelajaran') ?>" hx-target="#pembelajaran">
					<option value="">...</option>
				</select>
				<label>rombel</label>
			</div> -->
			
			<div class="form-floating mb-3">
				<select class="form-select" name="pembelajaran" id="pembelajaran">
					<option value="">...</option>
				</select>
				<label>Mata Pelajaran</label>
			</div>

			<div class="form-floating mb-3">
				<select name="data_tes" class="form-select" id="data_tes">
					<?php foreach ($data_tes as $key => $value): ?>
						<option value="<?= $value->uniq ?>"><?= $value->nama ?></option>
					<?php endforeach ?>
				</select>
				<label>Data Tes</label>
			</div>

			<div class="d-block">
				<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</form>
		<?php
	}else{
		?> <div class="alert-danger p-p5">Belum ada data tes tersimpan</div> <?php
	}
}else{
	?> <div class="alert-danger p-5">Belum ada data rombel tersimpan</div> <?php
}

?>
<script type="text/javascript">
	$('#tingkat').on('change', function(){
		$('#pembelajaran').html('<option value="">...</option>');
	})
</script>
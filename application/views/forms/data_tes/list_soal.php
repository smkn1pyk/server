
<form  hx-post="<?= base_url('exam/list_soal/'.$id.'/tambah') ?>" hx-target="#data">
	<div class="form-floating mb-3">
		<select class="form-select" name="jenis_soal">
			<option value="">...</option>
			<option value="1">Objektif</option>
			<option value="2">Esai</option>
		</select>
		<label>Jenis Soal</label>
	</div>

	<div class="form-floating mb-3">
		<textarea id="summernote" placeholder="Pertanyaan" name="pertanyaan"></textarea>
	</div>
	<div class="d-block">
		<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
	</div>
</form>

<script type="text/javascript">
	$('#summernote').summernote()
</script>
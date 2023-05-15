<form hx-post="<?= base_url('kelulusan/data_informasi/tambah') ?>" hx-target="#data">
	<div class="form-floating mb-3">
		<input type="text" name="judul" class="form-control" placeholder="Judul Informasi">
		<label>Judul Informasi</label>
	</div>
	<div class="mb-3">
		<textarea name="isi" id="summernote" placeholder="Isi Informasi"></textarea>
	</div>
	<div class="d-bock">
		<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
	</div>
</form>
<script type="text/javascript">
	$('#summernote').summernote();
</script>
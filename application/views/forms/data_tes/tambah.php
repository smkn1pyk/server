<form hx-post="<?= base_url('exam/data_tes/tambah') ?>" hx-target="#data">
	<div class="form-floating mb-3">
		<input type="text" name="nama" class="form-control" name='nama'>
		<label>Nama Tes</label>
	</div>
	<div class="d-block">
		<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
	</div>
</form>
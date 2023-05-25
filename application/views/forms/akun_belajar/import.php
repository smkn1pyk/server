<form hx-post="<?= base_url('akun_belajar/data_akun_belajar/import') ?>" hx-target="#data" enctype="multipart/form-data" class="form-inline text-center">
	<div class="mr-2">
		<input type="file" name="file_upload" class="form-control" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
	</div>
	<div class="d-block">
		<button class="btn btn-primary"><i class="fas fa-upload"></i> Upload</button>
	</div>
</form>
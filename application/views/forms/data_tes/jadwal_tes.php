<form hx-post="<?= base_url('exam/jadwal_tes/tambah') ?>" hx-target="#data">
	<div class="form-floating mb-3" hx-get="<?= base_url('lib_data/data_tes') ?>" hx-trigger="load" hx-target="#data_tes">
		<select class="form-select" name="data_tes" id="data_tes" hx-post="<?= base_url('lib_data/paket_soal') ?>" hx-target="#paket_soal"></select>
		<label>Data Tes</label>
	</div>

	<div class="form-floating mb-3">
		<select class="form-select" id="paket_soal" name="paket_soal"></select>
		<label>Data Tes</label>
	</div>

	<div class="form-floating mb-3">
		<input type="datetime-local" class="form-control" id="waktu_mulai" name="waktu_mulai" value="<?= date('Y-m-d H:i') ?>" min="<?= date('Y-m-d H:i') ?>">
		<label>Waktu Mulai</label>
	</div>

	<div class="form-floating mb-3">
		<input type="datetime-local" class="form-control" id="waktu_selesai" name="waktu_selesai" value="<?= date('Y-m-d H:i') ?>" min="<?= date('Y-m-d H:i') ?>">
		<label>Waktu Selesai</label>
	</div>

	<div class="d-block">
		<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
	</div>
</form>
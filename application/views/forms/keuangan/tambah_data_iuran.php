<?php
$CI =& get_instance();
$CI->load->model('m_keuangan');
$jenis_iuran = $CI->m_keuangan->jenis_iuran();
if($jenis_iuran){
	?>
	<form hx-post="<?= base_url('keuangan/data_data_iuran/tambah') ?>" hx-target="#data">
		<div class="form-floating mb-3">
			<select class="form-select" name="jenis_iuran" required>
				<option value="">...</option>
				<?php foreach ($jenis_iuran as $key => $value): ?>
					<option value="<?= $value->uniq ?>"><?= $value->nama ?></option>
				<?php endforeach ?>
			</select>
			<label>Jenis Iuran</label>
		</div>
		<div class="form-floating mb-3">
			<input type="text" name="nama" class="form-control" required>
			<label>Nama Iuran</label>
		</div>
		<div class="form-floating mb-3">
			<input type="number" name="nominal" class="form-control" required>
			<label>Nominal Pembayaran</label>
		</div>
		<div class="d-block">
			<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
		</div>
	</form>
	<?php
}else{
	?> <div class="alert-danger p-3"> Belum ada data jenis iuran tersimpan </div> <?php
}
?>
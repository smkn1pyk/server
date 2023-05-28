<?php
if($id){
	$CI =& get_instance();
	$CI->load->model('m_keuangan');
	$jenis_iuran = $CI->m_keuangan->jenis_iuran();
	if($jenis_iuran){
		$data_iuran = $CI->m_keuangan->data_iuran_id($id);
		if($data_iuran){
			$nama  = $data_iuran['nama'];
			$nominal = $data_iuran['nominal'];
			$uniq_jenis = $data_iuran['uniq_jenis'];
			?>
			<form hx-post="<?= base_url('keuangan/data_data_iuran/edit/'.$id) ?>" hx-target="#data">
				<div class="form-floating mb-3">
					<select class="form-select" name="jenis_iuran" required>
						<option value="">...</option>
						<?php foreach ($jenis_iuran as $key => $value): ?>
							<?php
							if($value->uniq==$uniq_jenis){
								?> <option value="<?= $value->uniq ?>" selected><?= $value->nama ?></option> <?php
							}else{
								?> <option value="<?= $value->uniq ?>"><?= $value->nama ?></option> <?php
							}
							?>
						<?php endforeach ?>
					</select>
					<label>Jenis Iuran</label>
				</div>
				<div class="form-floating mb-3">
					<input type="text" name="nama" class="form-control" value="<?= $nama ?>" required>
					<label>Nama Iuran</label>
				</div>
				<div class="form-floating mb-3">
					<input type="number" name="nominal" class="form-control" value="<?= $nominal ?>" required>
					<label>Nominal Pembayaran</label>
				</div>
				<div class="d-block">
					<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
				</div>
			</form>
			<?php
		}else{
			?> <div class="alert-danger p-3"> Terjadi kesalahan sistem, data iuran tidak ditemukan</div> <?php
		}
	}else{
		?> <div class="alert-danger p-3"> Belum ada data jenis iuran tersimpan </div> <?php
	}
}else{
	?> <div class="alert-danger p-3"> Terjadi kesalahan sisterm </div> <?php
}
?>
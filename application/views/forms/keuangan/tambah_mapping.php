<?php
$CI =& get_instance();
$CI->load->model('m_keuangan');
$CI->load->model('m_data_utama');
$data_iuran = $CI->m_keuangan->data_iuran();
$rombel = $CI->m_data_utama->getrombonganbelajar_kelas();
if($data_iuran){
	if($rombel){
		?>
		<form hx-post="<?= base_url('keuangan/data_mapping/tambah') ?>" hx-target="#data">
			<div class="form-floating mb-3">
				<select name="data_iuran" class="form-select" required>
					<option value="">...</option>
					<?php foreach ($data_iuran as $key => $value): ?>
						<option value="<?= $value->uniq ?>"><?= $value->nama ?> - <?= $value->nominal ?></option>
					<?php endforeach ?>
				</select>
				<label>Data Iuran</label>
			</div>

			<div style="max-height: 300px; overflow: auto;">
				<div class="table">
					<table class="table table-striped table-sm">
						<tbody>
							<?php foreach ($rombel as $key => $value): $key++; ?>
								<tr>
									<td><?= $key ?></td>
									<td>
										<div class="form-check">
											<input type="checkbox" name="rombel[]" class="form-check-input" value="<?= $value->rombongan_belajar_id ?>" id="<?= $value->rombongan_belajar_id ?>">
										</div>
									</td>
									<td>
										<label for="<?= $value->rombongan_belajar_id ?>">
											<?= $value->tingkat_pendidikan_id ?>
										</label>
									</td>
									<td>
										<label for="<?= $value->rombongan_belajar_id ?>">
											<?= $value->nama ?>
										</label>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="d-block">
				<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</form>
		<?php
	}else{
		?> <div class="alert-danger p-3"> Belum ada data rombel tersimpan </div> <?php
	}
}else{
	?> <div class="alert-danger p-3"> Belum ada data iuran tersimpan</div> <?php
}
?>